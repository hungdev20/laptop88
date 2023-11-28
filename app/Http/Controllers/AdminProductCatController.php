<?php
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product_cat;
use App\Parameter_pro;
use App\Parameterpro_cat;
class AdminProductCatController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }
    function add()
    {
        if (session()->has('nameInputForProCat')) {
            session()->forget('nameInputForProCat');
        }
        if (session()->has('nameInputReturned')) { 
            session()->forget('nameInputReturned');
        }
        $parent_cats = Parameter_pro::where([
            ['parent_id', 0],
            ['status', 'active']
        ])->get();
        $product_cats = Product_cat::where('status', 'active')->get();
        $list_cats = data_tree($product_cats);
        return view('admin.product_cat.add', compact('list_cats', 'parent_cats'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'cat_title' => ['required', 'string', 'max:200'],
                'slug' => ['required', 'string'],
                'catProDesc' => ['required', 'string'],
                'catProKeywords' => ['required', 'string'],
                'file' => ['image', 'max:1024'],
                'status' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'file.image' => 'File upload lên phải có định dạng của hình ảnh',
                'string' => ':attribute phải ở dạng chuỗi kí tự',
                'max' => 'Trường :attribute không được quá :max ký tự',
                'file.max' => 'Bạn không được upload file ảnh quá 1MB'
            ],
            [
                'cat_title' => 'tên danh mục',
                'catProDesc' => 'Mô tả danh mục',
                'catProKeywords' => 'Từ khóa danh mục',
                'status' => 'trạng thái'
            ]
        );
        $parent_id = 0;
        if ($request->input('list_cat') != 0) {
            $parent_id = $request->input('list_cat');
        }
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_original = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $file_array = Str::of($file_original)->explode('.');
            $file_name = $file_array[0];
            $target_dir = 'uploads/product-cat/';
            $file_upload = $file_original;
            $file_path = $target_dir . $file_upload;
            if (file_exists($file_path)) {
                //Tao ra ten file moi
                $new_file_name = $file_name . ' - Copy.';
                $file_upload = $new_file_name . $extension;
                $new_upload_path = $target_dir . $file_upload;
                $k = 1;
                while (file_exists($new_upload_path)) {
                    //=====================================================
                    //Tiep tuc tao ra ten file moi
                    //=====================================================
                    $new_file_name = $file_name . " - Copy({$k}).";
                    $k++;
                    $file_upload = $new_file_name . $extension;
                    $new_upload_path = $target_dir . $file_upload;
                }
                $file_path = $new_upload_path;
            }
            $file->move($target_dir,  $file_upload);
            // if ($file->move($target_dir,  $file_upload)) {
            //     $input['thumbnail'] = $file_upload;
            // }
        }
        $product_cat = Product_cat::create([
            'cat_title' => $request->input('cat_title'),
            'slug' => Str::slug($request->input('slug')),
            'meta_desc' => $request->catProDesc,
            'meta_keywords' => $request->catProKeywords,
            'file' => !empty($file_upload)?$file_upload:"",
            'parent_id' => $parent_id,
            'status' => $request->input('status'),
            'user_id' => Auth::id()
        ]);
        $insertedId = $product_cat->id;
        if (session()->has('nameInputForProCat')) {
            $nameInputForProCat = session('nameInputForProCat');
            foreach ($nameInputForProCat as $item) {
                $valInput =  $request->input($item);
                foreach ($valInput as $val) {
                    $paraInfo = Parameter_pro::where([
                        ['para_title', $val],
                        ['status', 'active']
                    ])->first();
                    $para_id = $paraInfo->id;
                    $parent_id = $paraInfo->parent_id;
                    Parameterpro_cat::create(
                        [
                            'cat_id' => $insertedId,
                            'para_id' => $para_id,
                            'parent_id' => $parent_id
                        ]
                    );
                }
            }
        }
        return redirect('admin/product/cat/list')->with(['status' => 'Bạn đã thêm mới danh mục sản phẩm thành công']);
    }
    function list(Request $request)
    {
        $status = $request->input('status');
        $act = [
            'delete' => 'Xóa tạm thời'
        ];
        $append = [
            'status' => 'active'
        ];
        $keyword = "";
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }
        if ($status == 'trash') {
            $append = [
                'status' => 'trash'
            ];
            $act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $product_cat = Product_cat::onlyTrashed()->where('cat_title', 'LIKE', "%{$keyword}%")->orderBy('created_at','DESC')->join('users', 'user_id', '=', 'users.id')->select('product_cats.*', 'users.name')->paginate(20);
        } else if ($status == 'passive') {
            $append = [
                'status' => 'passive'
            ];
            $product_cat = Product_cat::where([
                ['cat_title', 'LIKE', "%{$keyword}%"],
                ['status', 'passive']
            ])->orderBy('created_at','DESC')->join('users', 'user_id', '=', 'users.id')->select('product_cats.*', 'users.name')->paginate(20);
        } else {
            $product_cat = Product_cat::where([
                ['cat_title', 'LIKE', "%{$keyword}%"],
                ['status', 'active']
            ])->orderBy('created_at','DESC')->join('users', 'user_id', '=', 'users.id')->select('product_cats.*', 'users.name')->paginate(20);
        }
        $trash  = Product_cat::onlyTrashed()->count();
        $active = Product_cat::where('status', 'active')->count();
        $passive = Product_cat::where('status', 'passive')->count();
        $data = [$trash, $active, $passive];
        return view('admin.product_cat.list', compact('product_cat', 'status', 'data', 'act', 'append'));
    }
    //delete
    function delete(Request $request, $id)
    {
        $sub_cat = Product_cat::where('parent_id', $id)->get();
        if (count($sub_cat) > 0) {
            return redirect()->back()->with('status', 'Bạn cần phải xóa danh mục con của nó trước');
        } else {
            Product_cat::find($id)->delete();
            return redirect()->back()->with('status', 'Đã xóa tạm thời danh mục thành công');
        }
    }
    //action 
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            foreach ($checkItems as $k => $v) {
                $product_cat = Product_cat::withTrashed()->find($v);
                if ($product_cat->user_id != Auth::id()) {
                    unset($checkItems[$k]);
                } 
            }
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        Product_cat::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                    }
                    if ($act == 'restore') {
                        Product_cat::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Product_cat::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn danh mục thành công');
                    }
                }
            }
            return redirect()->back()->with('status', 'Bạn không được phép xóa bản ghi của người khác trên hệ thống');
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
    //edit
    function edit(Request $request, $id)
    {
        if (session()->has('nameInputForProCat')) {
            session()->forget('nameInputForProCat');
        }
        if (session()->has('nameInputReturned')) {
            session()->forget('nameInputReturned');
        }
        $product_cats = Product_cat::where('status', 'active')->get();
        $list_cats = data_tree($product_cats);
        $cat_info = Product_cat::withTrashed()->find($id);
        $paraOfCat = $cat_info->paras;
        $GroupParentId = [];
        foreach ($paraOfCat as $para) {
            $parent_id = $para->pivot->parent_id;
            if (!in_array($parent_id, $GroupParentId)) {
                $GroupParentId[] = $parent_id;
            }
        }
        $groupParaParent = [];
        foreach ($GroupParentId as $parent_id) {
            $paraInfo = Parameter_pro::find($parent_id);
            $groupParaParent[] = $paraInfo;
        }
        $parent_cats = Parameter_pro::where([
            ['parent_id', 0],
            ['status', 'active']
        ])->get();
        return view('admin.product_cat.edit', compact('cat_info', 'list_cats', 'groupParaParent', 'parent_cats', 'paraOfCat', 'id'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'cat_title' => ['required', 'string', 'max:50'],
                'slug' => ['required', 'string'],
                'file' => ['image', 'max:1024'],
                'catProDesc' => ['required', 'string'],
                'catProKeywords' => ['required', 'string'],
                'status' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'file.image' => 'File upload lên phải có định dạng của hình ảnh',
                'string' => ':attribute phải ở dạng chuỗi kí tự',
                'unique' => 'Tên danh mục đã tồn tại trên hệ thống',
                'file.max' => 'Bạn không được upload file ảnh quá 1MB',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'cat_title' => 'tên danh mục',
                'catProDesc' => 'Mô tả danh mục',
                'catProKeywords' => 'Từ khóa danh mục',
                'status' => 'trạng thái'
            ]
        );
        $parent_id = 0;
        if ($request->input('list_cat') != 0) {
            $parent_id = $request->input('list_cat');
        }
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_original = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $file_array = Str::of($file_original)->explode('.');
            $file_name = $file_array[0];
            $target_dir = 'uploads/product-cat/';
            $file_upload = $file_original;
            $file_path = $target_dir . $file_upload;
            if (file_exists($file_path)) {
                //Tao ra ten file moi
                $new_file_name = $file_name . ' - Copy.';
                $file_upload = $new_file_name . $extension;
                $new_upload_path = $target_dir . $file_upload;
                $k = 1;
                while (file_exists($new_upload_path)) {
                    //=====================================================
                    //Tiep tuc tao ra ten file moi
                    //=====================================================
                    $new_file_name = $file_name . " - Copy({$k}).";
                    $k++;
                    $file_upload = $new_file_name . $extension;
                    $new_upload_path = $target_dir . $file_upload;
                }
                $file_path = $new_upload_path;
            }
            if ($file->move($target_dir,  $file_upload)) {
                $file = $file_upload;
            }
        }
        if (!empty($file)) {
            Product_cat::where('id', $id)->update([
                'cat_title' => $request->input('cat_title'),
                'slug' => Str::slug($request->input('slug')),
                'file' => $file,
                'meta_desc' => $request->catProDesc,
                'meta_keywords' => $request->catProKeywords,
                'parent_id' => $parent_id,
                'status' => $request->input('status'),
                'user_id' => Auth::id()
            ]);
        }else{
            Product_cat::where('id', $id)->update([
                'cat_title' => $request->input('cat_title'),
                'slug' => Str::slug($request->input('slug')),
                'meta_desc' => $request->catProDesc,
                'meta_keywords' => $request->catProKeywords,
                'parent_id' => $parent_id,
                'status' => $request->input('status'),
                'user_id' => Auth::id()
            ]); 
        }
        if (session()->has('nameInputReturned')) {
            $nameInputReturned = session('nameInputReturned');
            $idPara = [];
            foreach ($nameInputReturned as $item) {
                $valInput =  $request->input($item);
                foreach ($valInput as $item) {
                    $paraInfo = Parameter_pro::where('para_title', $item)->first();
                    $para_id = $paraInfo->id;
                    $idParent1 = $paraInfo->parent_id;
                    $idPara[$para_id] = ['parent_id' => $idParent1, 'updated_at' => date("Y-m-d H:i:s"), 'created_at' => date("Y-m-d H:i:s")];
                }
            }
        } else if (session()->has('nameInputForProCat')) {
            $nameInputForProCat = session('nameInputForProCat');
            $idPara = [];
            foreach ($nameInputForProCat as $item) {
                $valInput =  $request->input($item);
                foreach ($valInput as $item) {
                    $paraInfo = Parameter_pro::where('para_title', $item)->first();
                    $para_id = $paraInfo->id;
                    $idParent1 = $paraInfo->parent_id;
                    $idPara[$para_id] = ['parent_id' => $idParent1, 'updated_at' => date("Y-m-d H:i:s"), 'created_at' => date("Y-m-d H:i:s")];
                }
            }
        }
        //Lấy thông tin kiểm tra nếu đây là danh mục cuối cùng thì dùng sync
        $catProductInfo = Product_cat::find($id);
        $parentId = $catProductInfo->parent_id;
        $idCat = $catProductInfo->id;
        $catChildren = Product_cat::where('parent_id', $idCat)->get();
        if (count($catChildren) == 0 && $parentId != 0) {
            $catProductInfo->paras()->sync($idPara);
        }
        return redirect('admin/product/cat/list')->with('status', 'Bạn đã cập nhật danh mục sản phẩm thành công');
    }
    function fetchParaForProCat()
    {
        $id = $_POST['id'];
        $paraInfo = Parameter_pro::find($id);
        if (!empty(session('nameInputReturned'))) {
            $idParaCat = $_POST['idParaCat'];
            $cat_info = Product_cat::withTrashed()->find($idParaCat);
            $paraOfCat = $cat_info->paras;
            session()->push('nameInputReturned', $paraInfo->paraEng);
            $nameInputReturned = session('nameInputReturned');
            $data = "<div class ='text-danger font-weight-bold mb-1'>*Lựa chọn thông số danh mục</div>";
            foreach ($nameInputReturned as $item) {
                 $para_title = Parameter_pro::where([
                        ['status' ,'active'],
                        ['paraEng', $item]
                    ])->first()->para_title;
                $data .= "<span class = 'paraParentTitle font-weight-bold'>" .  $para_title . "</span>";
                $data .= "<div class = 'form-group'>";
                $idPara = Parameter_pro::where([
                    ['paraEng', $item],
                    ['status', 'active']
                ])->first()->id;
                $paraChildren = Parameter_pro::where([
                    ['parent_id', $idPara],
                    ['status', 'active']
                ])->get();
                foreach ($paraChildren as $itemChild) {
                    $data .= "<div class = 'form-check'>";
                    $data1 = "<input type = 'checkbox' name = '" . $item . "[]' value= '" . $itemChild->para_title . "' id ='" . $itemChild->id . "' class ='form-check-input'>";
                    foreach ($paraOfCat as $itemPara) {
                        if ($itemPara->id == $itemChild->id) {
                            $data1 = "<input type = 'checkbox' name = '" . $item . "[]' value= '" . $itemChild->para_title . "' id ='" . $itemChild->id . "' checked class ='form-check-input'>";
                        }
                    }
                    $data .= $data1;
                    $data .= " <label class ='form-check-label' for = '" . $itemChild->id  . "'>" . $itemChild->para_title . "</label>
                    </div>";
                }
                $data .= "</div>";
            }
        } else {
            session()->push('nameInputForProCat', $paraInfo->paraEng);
            $nameInputForProCat = session('nameInputForProCat');
            $data = "<div class ='text-danger font-weight-bold mb-1'>*Lựa chọn thông số danh mục</div>";
            foreach ($nameInputForProCat as $item) {
                 $para_title = Parameter_pro::where([
                        ['status' ,'active'],
                        ['paraEng', $item]
                    ])->first()->para_title;
                $data .= "<span class = 'paraParentTitle font-weight-bold'>" .  $para_title . "</span>";
                $data .= "<div class = 'form-group'>";
                $idPara = Parameter_pro::where([
                    ['paraEng', $item],
                    ['status', 'active']
                ])->first()->id;
                $paraChildren = Parameter_pro::where([
                    ['parent_id', $idPara],
                    ['status', 'active']
                ])->get();
                foreach ($paraChildren as $itemChild) {
                    $data .= "<div class = 'form-check'>
                <input type = 'checkbox' name = '" . $item . "[]' value= '" . $itemChild->para_title . "' id ='" . $itemChild->id . "' class ='form-check-input'>
                <label class ='form-check-label' for = '" . $itemChild->id  . "'>" . $itemChild->para_title . "</label>
                </div>";
                }
                $data .= "</div>";
            }
        }
        echo json_encode($data);
    }
    function deleteParaForProCat()
    {
        $id = $_POST['id'];
        $paraInfo = Parameter_pro::find($id);
        if (!empty(session('nameInputReturned'))) {
            $idParaCat = $_POST['idParaCat'];
            $cat_info = Product_cat::withTrashed()->find($idParaCat);
            $paraOfCat = $cat_info->paras;
            $nameInputReturned = session('nameInputReturned');
            foreach ($nameInputReturned as $k => $v) {
                if ($v == $paraInfo->paraEng) {
                    unset($nameInputReturned[$k]);
                }
            }
            Session()->put('nameInputReturned', $nameInputReturned);
            $nameInputReturned = session('nameInputReturned');
            if (!empty($nameInputReturned)) {
                $data = "<div class ='text-danger font-weight-bold mb-1'>*Lựa chọn thông số danh mục</div>";
                foreach ($nameInputReturned as $item) {
                     $para_title = Parameter_pro::where([
                        ['status' ,'active'],
                        ['paraEng', $item]
                    ])->first()->para_title;
                    $data .= "<span class = 'paraParentTitle font-weight-bold'>" .  $para_title . "</span>";
                    $data .= "<div class = 'form-group'>";
                    $idPara = Parameter_pro::where([
                        ['paraEng', $item],
                        ['status', 'active']
                    ])->first()->id;
                    $paraChildren = Parameter_pro::where([
                        ['parent_id', $idPara],
                        ['status', 'active']
                    ])->get();
                    foreach ($paraChildren as $itemChild) {
                        $data .= "<div class = 'form-check'>";
                        $data1 = "<input type = 'checkbox' name = '" . $item . "[]' value= '" . $itemChild->para_title . "' id ='" . $itemChild->id . "' class ='form-check-input'>";
                        foreach ($paraOfCat as $itemPara) {
                            if ($itemPara->id == $itemChild->id) {
                                $data1 = "<input type = 'checkbox' name = '" . $item . "[]' value= '" . $itemChild->para_title . "' id ='" . $itemChild->id . "' checked class ='form-check-input'>";
                            }
                        }
                        $data .= $data1;
                        $data .= " <label class ='form-check-label' for = '" . $itemChild->id  . "'>" . $itemChild->para_title . "</label>
                    </div>";
                        //     "<input type = 'checkbox' name = '" . $item . "[]' value= '" . $itemChild->para_title . "' id ='" . $itemChild->id . "' class ='form-check-input'>
                        // <label class ='form-check-label'>" . $itemChild->para_title . "</label>
                        // </div>";
                    }
                    $data .= "</div>";
                }
            } else {
                $data = '';
            }
        } else {
            $nameInputForProCat = session('nameInputForProCat');
            foreach ($nameInputForProCat as $k => $v) {
                if ($v == $paraInfo->paraEng) {
                    unset($nameInputForProCat[$k]);
                }
            }
            Session()->put('nameInputForProCat', $nameInputForProCat);
            $nameInputForProCat = session('nameInputForProCat');
            if (!empty($nameInputForProCat)) {
                $data = "<div class ='text-danger font-weight-bold mb-1'>*Lựa chọn thông số danh mục</div>";
                foreach ($nameInputForProCat as $item) {
                     $para_title = Parameter_pro::where([
                        ['status' ,'active'],
                        ['paraEng', $item]
                    ])->first()->para_title;
                    $data .= "<span class = 'paraParentTitle font-weight-bold'>" .  $para_title . "</span>";
                    $data .= "<div class = 'form-group'>";
                    $idPara = Parameter_pro::where([
                        ['paraEng', $item],
                        ['status', 'active']
                    ])->first()->id;
                    $paraChildren = Parameter_pro::where([
                        ['parent_id', $idPara],
                        ['status', 'active']
                    ])->get();
                    foreach ($paraChildren as $itemChild) {
                        $data .= "<div class = 'form-check'>
                    <input type = 'checkbox' name = '" . $item . "[]' value= '" . $itemChild->para_title . "' id ='" . $itemChild->id . "' class ='form-check-input'>
                    <label class ='form-check-label' for = '" . $itemChild->id  . "'>" . $itemChild->para_title . "</label>
                    </div>";
                    }
                    $data .= "</div>";
                }
            } else {
                $data = '';
            }
        }
        echo json_encode($data);
    }
}
