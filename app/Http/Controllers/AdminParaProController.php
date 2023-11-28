<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Parameter_pro;

use Illuminate\Support\Facades\Auth;
class AdminParaProController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'paraPro']);
            return $next($request);
        });
    }
    function add()
    {
        $parent_cats = Parameter_pro::where([
            ['parent_id', 0],
            ['status', 'active']
        ])->get();
        return view('admin.parapro.add', compact('parent_cats'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'para_title' => ['required', 'string', 'max:200'],
                'status' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => ':attribute phải ở dạng chuỗi kí tự',
                'unique' => 'Tên danh mục đã tồn tại trên hệ thống',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'para_title' => 'tên thông số',
                'status' => 'trạng thái'
            ]
        );
        $parent_id = 0;
        if ($request->input('parent_cat') != 0) {
            $parent_id = $request->input('parent_cat');
        }
        Parameter_pro::create([
            'para_title' => $request->input('para_title'),
            'paraEng' => empty($request->input('paraEng')) ? NULL : $request->input('paraEng'),
            'parent_id' => $parent_id,
            'status' => $request->input('status'),
            'user_id' => Auth::id()
        ]);
        return redirect()->back()->with(['status' => 'Bạn đã thêm mới thông số sản phẩm thành công']);
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
            $para_cat = Parameter_pro::onlyTrashed()->where('para_title', 'LIKE', "%{$keyword}%")->orderBy('created_at','DESC')->join('users', 'user_id', '=', 'users.id')->select('parameter_pro.*', 'users.name')->paginate(40);
        } else if ($status == 'passive') {
            $append = [
                'status' => 'passive'
            ];
            $para_cat = Parameter_pro::where([
                ['para_title', 'LIKE', "%{$keyword}%"],
                ['status', 'passive']
            ])->orderBy('created_at','DESC')->join('users', 'user_id', '=', 'users.id')->select('parameter_pro.*', 'users.name')->paginate(40);
        } else {
            $para_cat = Parameter_pro::where([
                ['para_title', 'LIKE', "%{$keyword}%"],
                ['status', 'active']
            ])->orderBy('created_at','DESC')->join('users', 'user_id', '=', 'users.id')->select('parameter_pro.*', 'users.name')->paginate(40);
        }
        $trash  = Parameter_pro::onlyTrashed()->count();
        $active = Parameter_pro::where('status', 'active')->count();
        $passive = Parameter_pro::where('status', 'passive')->count();
        $data = [$trash, $active, $passive];
        return view('admin.parapro.list', compact('para_cat', 'status', 'data', 'act', 'append'));
    }
    //delete
    function delete(Request $request, $id)
    {
        $sub_cat = Parameter_pro::where('parent_id', $id)->get();
        if (count($sub_cat) > 0) {
            return redirect()->back()->with('status', 'Bạn cần phải xóa danh mục con của nó trước');
        } else {
            Parameter_pro::find($id)->delete();
            return redirect()->back()->with('status', 'Đã xóa tạm thời thông số thành công');
        }
    }
    //action 
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            foreach ($checkItems as $k => $v) {
                $para_cat = Parameter_pro::withTrashed()->find($v);
                if ($para_cat->user_id != Auth::id()) {
                    unset($checkItems[$k]);
                }
            }
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        Parameter_pro::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                    }
                    if ($act == 'restore') {
                        Parameter_pro::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Parameter_pro::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn danh mục thành công');
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
        $para_cats = Parameter_pro::where([
            ['parent_id', 0],
            ['status', 'active']
        ])->get();
        $cat_info = Parameter_pro::withTrashed()->find($id);
        return view('admin.parapro.edit', compact('cat_info', 'para_cats'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'para_title' => ['required', 'string', 'max:200'],
                'status' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => ':attribute phải ở dạng chuỗi kí tự',
                'unique' => 'Tên danh mục đã tồn tại trên hệ thống',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'para_title' => 'tên danh thông số',
                'status' => 'trạng thái'
            ]
        );
        $parent_id = 0;
        if ($request->input('parent_cat') != 0) {
            $parent_id = $request->input('parent_cat');
        }
        Parameter_pro::where('id', $id)->update([
            'para_title' => $request->input('para_title'),
            'paraEng' => empty($request->input('paraEng')) ? NULL : $request->input('paraEng'),
            'parent_id' => $parent_id,
            'status' => $request->input('status'),
            'user_id' => Auth::id()
        ]);
        return redirect()->back()->with(['status' => 'Bạn đã cập nhật thông số sản phẩm thành công']);
    }
}
