<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product_cat;
use App\Post_cat;
use App\Page;
use App\Menu;

class AdminMenuController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'menu']);
            return $next($request);
        });
    }
    function menu(Request $request)
    {
        $product_cats = Product_cat::where('status', 'active')->get();
        $list_procats = data_tree($product_cats);
        $list_pages = Page::where('status', 'active')->get();
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
            $menu = Menu::onlyTrashed()->where('menu_title', 'LIKE', "%{$keyword}%")->join('users', 'user_id', '=', 'users.id')->select('menu.*', 'users.name')->paginate(10);
        } else if ($status == 'passive') {
            $append = [
                'status' => 'passive'
            ];
            $menu = Menu::where([
                ['menu_title', 'LIKE', "%{$keyword}%"],
                ['status', 'passive']
            ])->join('users', 'user_id', '=', 'users.id')->select('menu.*', 'users.name')->paginate(10);
        } else {
            $menu = Menu::where([
                ['menu_title', 'LIKE', "%{$keyword}%"],
                ['status', 'active']
            ])->join('users', 'user_id', '=', 'users.id')->select('menu.*', 'users.name')->paginate(10);
        }
        $trash  = Menu::onlyTrashed()->count();
        $active = Menu::where('status', 'active')->count();
        $passive = Menu::where('status', 'passive')->count();
        $data = [$trash, $active, $passive];
        return view('admin.menu.menu', compact('menu', 'status', 'data', 'act', 'append', 'list_procats', 'list_pages'));
    }
    function edit(Request $request, $id)
    {
        $product_cats = Product_cat::where('status', 'active')->get();
        $list_procats = data_tree($product_cats);
        $list_pages = Page::where('status', 'active')->get();
        $menu_info = Menu::withTrashed()->find($id);
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
            $menu = Menu::onlyTrashed()->where('menu_title', 'LIKE', "%{$keyword}%")->join('users', 'user_id', '=', 'users.id')->select('menu.*', 'users.name')->paginate(10);
        } else if ($status == 'passive') {
            $append = [
                'status' => 'passive'
            ];
            $menu = Menu::where([
                ['menu_title', 'LIKE', "%{$keyword}%"],
                ['status', 'passive']
            ])->join('users', 'user_id', '=', 'users.id')->select('menu.*', 'users.name')->paginate(10);
        } else {
            $menu = Menu::where([
                ['menu_title', 'LIKE', "%{$keyword}%"],
                ['status', 'active']
            ])->join('users', 'user_id', '=', 'users.id')->select('menu.*', 'users.name')->paginate(10);
        }
        $trash  = Menu::onlyTrashed()->count();
        $active = Menu::where('status', 'active')->count();
        $passive = Menu::where('status', 'passive')->count();
        $data = [$trash, $active, $passive];
        return view('admin.menu.edit', compact('menu', 'menu_info', 'status', 'data', 'act', 'append', 'list_procats', 'list_pages'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'menu_title' => ['required', 'string', 'unique:menu', 'max:200'],
                'icon' => ['required', 'string'],
                'slug' => ['required', 'string'],
                'order' => ['required', 'integer', 'string'],
                'status' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => 'Trường :attribute phải là chuỗi',
                'integer' => 'Trường :attribute phải là số',
                'unique' => 'Tên danh mục đã tồn tại trên hệ thống',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'menu_title' => 'tên menu',
                'order' => 'Thứ tự',
                'status' => 'trạng thái'
            ]
        );
        $input = $request->all();
        $input['slug'] = Str::slug($request->input('slug'));
        $input['user_id'] = Auth::id();
        if ($request->input('pages') != 0) {
            $input['page_id'] = $request->input('pages');
        } else if ($request->input('product_cats') != 0) {
            $input['productcat_id'] = $request->input('product_cats');
        }
        Menu::create($input);
        return redirect()->back()->with(['status' => 'Bạn đã thêm mới menu thành công']);
    }
    //delete
    function delete(Request $request, $id)
    {
        Menu::find($id)->delete();
        return redirect()->back()->with('status', 'Đã xóa tạm thời menu thành công');
    }
    //action 
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            foreach ($checkItems as $k => $v) {
                $menu = Menu::withTrashed()->find($v);
                if ($menu->user_id != Auth::id()) {
                    unset($checkItems[$k]);
                }
            }
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        Menu::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                    }
                    if ($act == 'restore') {
                        Menu::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Menu::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn bài viết thành công');
                    }
                }
            }
            return redirect()->back()->with('status', 'Bạn không được phép xóa bản ghi của người khác trên hệ thống');
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'menu_title' => ['required', 'string', 'max:200'],
                'icon' => ['required', 'string'],
                'slug' => ['required', 'string'],
                'order' => ['required', 'integer', 'string'],
                'status' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => 'Trường :attribute phải là chuỗi',
                'integer' => 'Trường :attribute phải là số',
                'unique' => 'Tên danh mục đã tồn tại trên hệ thống',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'menu_title' => 'tên menu',
                'order' => 'Thứ tự',
                'status' => 'trạng thái'
            ]
        );
        if ($request->input('pages') != 0) {
            $page_id = $request->input('pages');
        } else if ($request->input('product_cats') != 0) {
            $productcat_id = $request->input('product_cats');
        }
        Menu::where('id', $id)->update([
            'menu_title' => $request->input('menu_title'),
            'slug' => Str::slug($request->input('slug')),
            'icon' => $request->input('icon'),
            'order' => $request->input('order'),
            'status' => $request->input('status'),
            'productcat_id' => !empty($productcat_id) ? $productcat_id : NULL,
            'page_id' => !empty($page_id) ? $page_id : NULL
        ]);
        return redirect()->back()->with(['status' => 'Bạn đã cập nhật menu thành công']);
    }
}
