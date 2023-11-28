<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Product_cat;
use Illuminate\Http\Request;
use App\Product;
use App\Parameter_pro;
use Illuminate\Support\Facades\DB;
use App\File;
use App\Category_product;
use App\Parameterpro_cat;
use App\Parapro_product;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
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
        if (session()->has('imageIdReturned')) {
            $imageIdReturned = session('imageIdReturned');
            foreach ($imageIdReturned as $k => $v) {
                $image = File::where('id', $v)->get();
                if (count($image) > 0) {
                    foreach ($image as $item) {
                        $path_img = $item->path_img;
                        // unlink("uploads/products/subImages/{$path_img}");
                        File::where([['id', $v], ['product_id', null]])->delete();
                    }
                }
            }
            session()->forget('imageIdReturned');
        }
        $product_cats = Product_cat::where('status', 'active')->get();
        $list_cats = data_tree($product_cats);
        return view('admin.product.add', compact('list_cats'));
    }
    function ajaxSubCat()
    {
        $sub_cat = $_POST['sub_cat'];
        $sub_cat_list =  Product_cat::where('parent_id', $sub_cat)->get();
        $list_sub = "";
        $list_sub .= "<option value=''>-Sub Category-</option>";
        foreach ($sub_cat_list as $sub_cat) {
            $list_sub .= "<option value='" . $sub_cat->id . "'>" . $sub_cat->cat_title . "</option>";
        }
        echo $list_sub;
        // echo json_encode($list_sub) ;
    }
    function fetchData()
    {
        if (session()->has('imageIdReturned')) {
            $idGroup = session('imageIdReturned');
        } else if (session()->has('insertedFileId')) {
            $idGroup = session('insertedFileId');
        }
        $images = File::whereIn('id', $idGroup)->get();
        $output = '';
        $output .= '<table class="table table-bordered table-triped">
        <tr>
        <th>Thứ tự</th>
        <th>Hình ảnh</th> 
        <th>Đường dẫn ảnh</th>
        <th>Delete</th>
        </tr>';
        if (count($images) > 0) {
            $count = 0;
            foreach ($images as $item) {
                $count++;
                $output .= '<tr>
            <td>' . $count . '</td>
            <td><img src="' . url("uploads/products/subImages/{$item->path_img}") . '" class="img img-thumbnail" width="100" height="100"</td>
            <td>' . $item->path_img . '</td>
            <td><button class="btn btn-danger delete" data-image_name=' . $item->path_img . ' id=' . $item->id . ' data-uri="' . route('delete.images') . '">Delete</button></td>
            </tr>';
            }
        } else {
            $output .= '<tr>
        <td colspan="5" align="center">Chưa có dữ liệu</td>
        </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
    function ajaxUpload(Request $request)
    {
        if ($request->TotalImages > 0) {
            // $request->session()->put('insertedFileId');
            // Loop for getting files with index like image0, image1
            for ($x = 0; $x < $request->TotalImages; $x++) {
                if ($request->hasFile('images' . $x)) {
                    $file      = $request->file('images' . $x);
                    $originalName = $file->getClientOriginalName();
                    $file_array = Str::of($originalName)->explode('.');
                    $file_name = $file_array[0];
                    $extension = $file->getClientOriginalExtension();
                    $target_dir = 'uploads/products/subImages/';
                    $file_upload = $originalName;
                    $file_path = $target_dir . $file_upload;
                    if (file_exists($file_path)) {
                        //Tao ra ten file moi
                        $new_file_name = $file_name . '-Copy.';
                        $file_upload = $new_file_name . $extension;
                        $new_upload_path = $target_dir . $file_upload;
                        $k = 1;
                        while (file_exists($new_upload_path)) {
                            //=====================================================
                            //Tiep tuc tao ra ten file moi
                            //=====================================================
                            $new_file_name = $file_name . "-Copy({$k}).";
                            $k++;
                            $file_upload = $new_file_name . $extension;
                            $new_upload_path = $target_dir . $file_upload;
                        }
                        $file_path = $new_upload_path;
                    }
                    $file->move($target_dir, $file_upload);
                    $file = File::create(
                        [
                            'path_img' => $file_upload
                        ]
                    );
                    $insertedId = $file->id;
                    if (session()->has('imageIdReturned')) {
                        $request->session()->push('imageIdReturned', $insertedId);
                    } else {
                        $request->session()->push('insertedFileId', $insertedId);
                    }
                }
            }
            if (session()->has('imageIdReturned')) {
                $id_group = session('imageIdReturned');
            } else {
                $id_group = session('insertedFileId');
            }
            $images = File::whereIn('id', $id_group)->get();
            $output = '';
            $output .= '<table class="table table-bordered table-triped">
            <tr>
            <th>Thứ tự</th>
            <th>Hình ảnh</th> 
            <th>Đường dẫn ảnh</th>
            <th>Delete</th>
            </tr>';
            if (count($images) > 0) {
                $count = 0;
                foreach ($images as $item) {
                    $count++;
                    $output .= '<tr>
                <td>' . $count . '</td>
                <td><img src="' . url("uploads/products/subImages/{$item->path_img}") . '" class="img img-thumbnail" width="100" height="100"</td>
                <td>' . $item->path_img . '</td>
                <td><button class="btn btn-danger delete" data-image_name=' . $item->path_img . ' id=' . $item->id . ' data-uri="' . route('delete.images') . '">Delete</button></td>
                </tr>';
                }
            }
            $output .= '</table>';
            echo $output;
        }
    }
    function delete_images(Request $request)
    {
        $image_id = $request->image_id;
        $image_path = 'uploads/products/subImages/' . $request->image_path;
        if (unlink($image_path)) {
            File::where('id', $image_id)->delete();
            if (session()->has('imageIdReturned')) {
                $imageIdReturned = session('imageIdReturned');
                foreach ($imageIdReturned as $k => $v) {
                    if ($v == $image_id) {
                        unset($imageIdReturned[$k]);
                        Session()->put('imageIdReturned', $imageIdReturned);
                    }
                }
            } else if (session()->has('insertedFileId')) {
                $insertedFileId = session('insertedFileId');
                foreach ($insertedFileId as $k => $v) {
                    if ($v == $image_id) {
                        unset($insertedFileId[$k]);
                        Session()->put('insertedFileId', $insertedFileId);
                    }
                }
            }
        }
    }

    //Store
    function store(Request $request)
    {
        $request->validate(
            [
                'product_title' => ['required', 'string', 'unique:products', 'max:500'],
                'slug' => ['required', 'string'],
                'code' => ['required', 'string'],
                'ProDesc' => ['required', 'string'],
                'ProKeywords' => ['required', 'string'],
                'price' => ['required', 'integer', 'string'],
                'qty' => ['required', 'integer'],
                'intro' => ['required', 'string', 'max:20000'],
                'special_offer' => ['max:20000'],
                'description' => ['required', 'string'],
                'images.*' => 'mimes:jpeg,jpg,png,gif|max:2048',
                'list_cat' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'images.*.mimes' => 'File upload lên phải có định dạng của hình ảnh',
                'max' => 'Trường :attribute không được quá :max ký tự',
                'images.*.max' => 'Bạn không được upload file ảnh quá 2MB',
                'unique' => 'Tên sản phẩm đã tồn tại trên hệ thống',
                'integer' => 'Trường :attribute phải là số',
                'string' => 'Trường :attribute phải có định dạng chuỗi'
            ],
            [
                'product_title' => 'Tiêu đề sản phẩm',
                'code' => 'Mã sản phẩm',
                'price' => 'Giá',
                'qty' => 'Số lượng',
                'intro' => 'Mô tả ngắn',
                'ProDesc' => 'Mô tả sản phẩm',
                'ProKeywords' => 'Từ khóa sản phẩm',
                'special_offer' => 'khuyến mại',
                'description' => 'Chi tiết sản phẩm',
                'images' => 'Hình ảnh',
                'list_cat' => 'Danh sách danh mục',
            ]
        );
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['slug'] = Str::slug($request->input('slug'));
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $originalName = $file->getClientOriginalName();
                $file_array = Str::of($originalName)->explode('.');
                $file_name = $file_array[0];
                $extension = $file->getClientOriginalExtension();
                $target_dir = 'uploads/products/thumbnail/';
                $file_upload = $originalName;
                $file_path = $target_dir . $file_upload;
                if (file_exists($file_path)) {
                    //Tao ra ten file moi
                    $new_file_name = $file_name . '-Copy.';
                    $file_upload = $new_file_name . $extension;
                    $new_upload_path = $target_dir . $file_upload;
                    $k = 1;
                    while (file_exists($new_upload_path)) {
                        //=====================================================
                        //Tiep tuc tao ra ten file moi
                        //=====================================================
                        $new_file_name = $file_name . "-Copy({$k}).";
                        $k++;
                        $file_upload = $new_file_name . $extension;
                        $new_upload_path = $target_dir . $file_upload;
                    }
                    $file_path = $new_upload_path;
                }
                $file->move($target_dir, $file_upload);
                $input['thumbnail'] = $file_path;
            }
        }
        $input['meta_desc'] = $request->ProDesc;
        $input['meta_keywords'] = $request->ProKeywords;
        $product =  Product::create($input);
        $insertedId = $product->id;
        Category_product::create(
            [
                'product_id' => $insertedId,
                'cat_id' => $request->input('list_cat')
            ]
        );
        if (session()->has('nameInput')) {
            $nameInput = session('nameInput');
            foreach ($nameInput as $item) {
                $valInput =  $request->input($item);
                foreach ($valInput as $val) {
                    $paraInfo = Parameter_pro::where([
                        ['para_title', $val],
                        ['status', 'active']
                    ])->first();
                    $para_id = $paraInfo->id;
                    $parent_id = $paraInfo->parent_id;
                    Parapro_product::create(
                        [
                            'product_id' => $insertedId,
                            'para_id' => $para_id,
                            'parent_id' => $parent_id
                        ]
                    );
                }
            }
        }
        if (session()->has('insertedFileId')) {
            $idGroup = session('insertedFileId');
            File::whereIn('id', $idGroup)->update(
                [
                    'product_id' => $insertedId
                ]
            );
            session()->forget('insertedFileId');
        }
        return redirect()->back()->with(['status' => 'Bạn đã thêm mới sản phẩm thành công']);
        // $request->session()->put('product_id', )
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
            $products = Product::onlyTrashed()->where('product_title', 'LIKE', "%{$keyword}%")->orderBy('created_at', 'DESC')->join('users', 'user_id', '=', 'users.id')->select('products.*', 'users.name')->paginate(20);
        } else if ($status == 'passive') {
            $append = [
                'status' => 'passive'
            ];
            $products = Product::where([
                ['product_title', 'LIKE', "%{$keyword}%"],
                ['status', 'passive']
            ])->orderBy('created_at', 'DESC')->join('users', 'user_id', '=', 'users.id')->select('products.*', 'users.name')->paginate(20);
        } else {
            $products = Product::where([
                ['product_title', 'LIKE', "%{$keyword}%"],
                ['status', 'active']
            ])->orderBy('created_at', 'DESC')->join('users', 'user_id', '=', 'users.id')->select('products.*', 'users.name')->paginate(20);
        }
        $trash  = Product::onlyTrashed()->count();
        $active = Product::where('status', 'active')->count();
        $passive = Product::where('status', 'passive')->count();
        $data = [$trash, $active, $passive];
        return view('admin.product.list', compact('products', 'status', 'data', 'act', 'append'));
    }
    function inventory(Request $request)
    {
        $keyword = "";
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }

        $products = Product::where([
            ['product_title', 'LIKE', "%{$keyword}%"],
            ['products_rest', ">" ,  0]
            ])->orderBy('created_at', 'DESC')->join('users', 'user_id', '=', 'users.id')->select('products.*', 'users.name')->paginate(20);

        return view('admin.product.inventory', compact('products'));
    }
    function stockout(Request $request)
    {
        $keyword = "";
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }

        $products = Product::where([
            ['product_title', 'LIKE', "%{$keyword}%"],
            ['products_rest', "=" ,  0]
            ])->orderBy('created_at', 'DESC')->join('users', 'user_id', '=', 'users.id')->select('products.*', 'users.name')->paginate(20);

        return view('admin.product.inventory', compact('products'));
    }
    //delete
    function delete(Request $request, $id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('status', 'Đã xóa tạm thời sản phẩm thành công');
    }
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            foreach ($checkItems as $k => $v) {
                $product = Product::withTrashed()->find($v);
                if ($product->user_id != Auth::id()) {
                    unset($checkItems[$k]);
                }
            }
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        Product::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                    }
                    if ($act == 'restore') {
                        Product::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Product::onlyTrashed()->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn sản phẩm thành công');
                    }
                }
            }
            return redirect()->back()->with('status', 'Bạn không được phép xóa bản ghi của người khác trên hệ thống');
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
    function edit(Request $request, $id)
    {
        //Bỏ session của những file ảnh đã insert vào db
        if (session()->has('insertedFileId')) {
            $insertedFileId = session('insertedFileId');
            foreach ($insertedFileId as $k => $v) {
                $image = File::where('id', $v)->get();
                if (count($image) > 0) {
                    foreach ($image as $item) {
                        $path_img = $item->path_img;
                        // unlink("uploads/products/subImages/{$path_img}");
                        File::where([['id', $v], ['product_id', null]])->delete();
                    }
                }
            }
            session()->forget('insertedFileId');
        } else if (session()->has('imageIdReturned')) {
            //XOÁ SESSION LƯU NHỮNG FILE ẢNH ĐƯỢC TRẢ VỀ 
            session()->forget('imageIdReturned');
        }
        if (session()->has('idPara')) {
            session()->forget('idPara');
        }
        $product_info = Product::withTrashed()->find($id);
        $image_data = File::where('product_id', $id)->get();
        $paraPro = $product_info->paras;
        $paraParents = [];
        foreach ($paraPro as $item) {
            session()->push('idPara', $item->id);
            $paraParent = Parameter_pro::find($item->parent_id);
            $paraParents[] = $paraParent;
        }
        $product_cats = Product_cat::where('status', 'active')->get();
        $list_cats = data_tree($product_cats);
        return view('admin.product.edit', compact('product_info', 'list_cats', 'image_data', 'paraPro', 'paraParents', 'id'));
    }
    //Update
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'product_title' => ['required', 'string', 'max:500'],
                'slug' => ['required', 'string'],
                'code' => ['required', 'string'],
                'price' => ['required', 'integer', 'string'],
                'ProDesc' => ['required', 'string'],
                'ProKeywords' => ['required', 'string'],
                'qty' => ['required', 'integer'],
                'intro' => ['required', 'string', 'max:20000'],
                'special_offer' => ['max:20000'],
                'description' => ['required', 'string'],
                'images.*' => 'mimes:jpeg,jpg,png,gif|max:2048',
                'list_cat' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'images.*.mimes' => 'File upload lên phải có định dạng của hình ảnh',
                'max' => 'Trường :attribute không được quá :max ký tự',
                'images.*.max' => 'Bạn không được upload file ảnh quá 2MB',
                'unique' => 'Tên sản phẩm đã tồn tại trên hệ thống',
                'integer' => 'Trường :attribute phải là số',
                'string' => 'Trường :attribute phải có định dạng chuỗi'
            ],
            [
                'product_title' => 'Tiêu đề sản phẩm',
                'code' => 'Mã sản phẩm',
                'price' => 'Giá',
                'qty' => 'Số lượng',
                'intro' => 'Mô tả ngắn',
                'special_offer' => 'khuyến mại',
                'ProDesc' => 'Mô tả sản phẩm',
                'ProKeywords' => 'Từ khóa sản phẩm',
                'description' => 'Chi tiết sản phẩm',
                'images' => 'Hình ảnh',
                'list_cat' => 'Danh sách danh mục',
            ]
        );
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['slug'] = Str::slug($request->slug);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $originalName = $file->getClientOriginalName();
                $file_array = Str::of($originalName)->explode('.');
                $file_name = $file_array[0];
                $extension = $file->getClientOriginalExtension();
                $target_dir = 'uploads/products/thumbnail/';
                $file_upload = $originalName;
                $file_path = $target_dir . $file_upload;
                if (file_exists($file_path)) {
                    //Tao ra ten file moi
                    $new_file_name = $file_name . '-Copy.';
                    $file_upload = $new_file_name . $extension;
                    $new_upload_path = $target_dir . $file_upload;
                    $k = 1;
                    while (file_exists($new_upload_path)) {
                        //=====================================================
                        //Tiep tuc tao ra ten file moi
                        //=====================================================
                        $new_file_name = $file_name . "-Copy({$k}).";
                        $k++;
                        $file_upload = $new_file_name . $extension;
                        $new_upload_path = $target_dir . $file_upload;
                    }
                    $file_path = $new_upload_path;
                }
                $file->move($target_dir, $file_upload);
                $input['thumbnail'] = $file_path;
            }
        }
        if (!empty($file_path)) {
            Product::where('id', $id)->update(
                [
                    'product_title' => $request->input('product_title'),
                    'slug' => Str::slug($request->input('slug')),
                    'code' => $request->input('code'),
                    'thumbnail' => $file_path,
                    'intro' => $request->input('intro'),
                    'meta_desc' => $request->ProDesc,
                    'meta_keywords' => $request->ProKeywords,
                    'special_offer' => $request->input('special_offer'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'qty' => $request->input('qty'),
                    'user_id' => Auth::id(),
                    'status' => $request->input('status'),
                ]
            );
        } else {
            Product::where('id', $id)->update(
                [
                    'product_title' => $request->input('product_title'),
                    'slug' => Str::slug($request->input('slug')),
                    'code' => $request->input('code'),
                    'intro' => $request->input('intro'),
                    'meta_desc' => $request->ProDesc,
                    'meta_keywords' => $request->ProKeywords,
                    'special_offer' => $request->input('special_offer'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'qty' => $request->input('qty'),
                    'user_id' => Auth::id(),
                    'status' => $request->input('status'),
                ]
            );
        }
        //Cập nhật thông số sản phẩm
        if (session()->has('nameInput')) {
            $nameInput = session('nameInput');
            $idPara = [];
            foreach ($nameInput as $item) {
                $valInput =  $request->input($item);
                foreach ($valInput as $item) {
                    $paraInfo = Parameter_pro::where('para_title', $item)->first();
                    $para_id = $paraInfo->id;
                    $idParent1 = $paraInfo->parent_id;
                    $idPara[$para_id] = ['parent_id' => $idParent1, 'updated_at' => date("Y-m-d H:i:s"), 'created_at' => date("Y-m-d H:i:s")];
                }
            }
        }
        $ProductInfo = Product::find($id);
        $ProductInfo->paras()->sync($idPara);
        Category_product::where('product_id', $id)->update(
            [
                'cat_id' => $request->input('list_cat')
            ]
        );
        //Cập nhật ảnh
        if (session()->has('imageIdReturned')) {
            $idGroup = session('imageIdReturned');
            File::whereIn('id', $idGroup)->update(
                [
                    'product_id' => $id
                ]
            );
            session()->forget('imageIdReturned');
        } else if (session()->has('insertedFileId')) {
            $idGroup = session('insertedFileId');
            File::whereIn('id', $idGroup)->update(
                [
                    'product_id' => $id
                ]
            );
            session()->forget('imageIdReturned');
        }
        return redirect()->back()->with(['status' => 'Bạn đã cập nhật sản phẩm thành công']);
    }
    function detail($id)
    {
        $product_info = Product::find($id);
        return view('admin.product.detail', compact('product_info'));
    }
    function fetchPara()
    {
        if (session()->has('nameInput')) {
            session()->forget('nameInput');
        }
        $id = $_POST['id'];
        $product_cat = Product_cat::find($id);
        $GroupParentId = [];
        foreach ($product_cat->paras as $para) {
            $parent_id = $para->pivot->parent_id;
            if (!in_array($parent_id, $GroupParentId)) {
                $GroupParentId[] = $parent_id;
            }
        }
        $paraParentInfo = Parameter_pro::whereIn('id', $GroupParentId)->get();
        // $parent_id = $product_cat->parent_id;
        // if ($parent_id == 0) { 
        //     $cat_id = $product_cat->id;
        // } else {
        //     $data = Product_cat::all();
        //     $cat_id = find_parentId($data, $parent_id);
        // }
        // $paraParents = Product_cat::find($cat_id)->paras;
        $data = "<div class ='text-danger font-weight-bold mb-1'>*Lựa chọn thông số sản phẩm</div>";
        foreach ($paraParentInfo as $item) {
            session()->push('nameInput', $item->paraEng);
            $idParent = $item->id;
            $groupChildrenRecord = Parameterpro_cat::where([
                ['cat_id', $id],
                ['parent_id', $idParent]
            ])->get();
            $groupChildrenId = [];
            foreach ($groupChildrenRecord as $childId) {
                $groupChildrenId[] = $childId->para_id;
            }
            $groupParaChild = Parameter_pro::whereIn('id', $groupChildrenId)->get();
            $data .= "<span class = 'paraParentTitle font-weight-bold'>" . $item->para_title . "</span>";
            $data .= "<div class = 'form-group'>";
            foreach ($groupParaChild as $itemChild) {
                $data .= "<div class = 'form-check'>
            <input type = 'checkbox' name = '" . $item->paraEng . "[]' value= '" . $itemChild->para_title . "' id ='" . $itemChild->id . "' class ='form-check-input'>
            <label class ='form-check-label' for ='" . $itemChild->id  .  "'>" . $itemChild->para_title . "</label>
            </div>";
            }
            $data .= "</div>";
        }
        echo json_encode($data);
    }
}
