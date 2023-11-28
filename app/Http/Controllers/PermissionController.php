<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Facades\Auth;
class PermissionController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'permissions']);
            return $next($request);
        });
    }
    function listPermission(Request $request)
    {
        $permissionParent = Permission::where('parent_id', 0)->get();
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
            $listpermission = Permission::onlyTrashed()->where([
                ['name', 'LIKE', "%{$keyword}%"],
                ['parent_id', '<>', 0]
            ])->paginate(20);
        } else {
            $listpermission = Permission::where([
                ['name', 'LIKE', "%{$keyword}%"],
                ['parent_id', '<>', 0]
            ])->paginate(20);
        }
        $trash  = Permission::onlyTrashed()->where('parent_id', '<>', 0)->count();
        $active = Permission::where('parent_id', '<>', 0)->count();
        $data = [$trash, $active];
        return view('admin.permission.index', compact('listpermission', 'status', 'data', 'act', 'append', 'permissionParent'));
    }
    function storePermission(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:200'],
                'display_name' => ['required', 'string', 'max:200'],
                'module_parent' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => 'Trường :attribute phải là chuỗi',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'name' => 'tên',
                'display_name' => 'tên hiển thị',
                'module_parent' => 'danh mục quyền'
            ]
        );
        $nameParentPermission = Permission::find($request->module_parent)->name;
        Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'user_id' => Auth::id(),
            'parent_id' => $request->module_parent,
            'key_code' =>   $request->name . '_' . $nameParentPermission
        ]);
        return redirect()->back()->with(['status' => 'Bạn đã thêm mới permission thành công']);
    }
    //Edit
    function editPermission(Request $request, $id)
    {
        $permissionParent = Permission::where('parent_id', 0)->get();
        $permission_info = Permission::withTrashed()->find($id);
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
            $listpermission = Permission::onlyTrashed()->where([
                ['name', 'LIKE', "%{$keyword}%"],
                ['parent_id', '<>', 0]
            ])->paginate(20);
        } else {
            $listpermission = Permission::where([
                ['name', 'LIKE', "%{$keyword}%"],
                ['parent_id', '<>', 0]
            ])->paginate(20);
        }
        $trash  = Permission::onlyTrashed()->where('parent_id', '<>', 0)->count();
        $active = Permission::where('parent_id', '<>', 0)->count();
        $data = [$trash, $active];
        return view('admin.permission.edit', compact('permissionParent','listpermission', 'status', 'data', 'act', 'append', 'permission_info'));
    }
     //delete
     function deletePermission(Request $request, $id)
     {
             Permission::find($id)->delete();
             return redirect()->back()->with('status', 'Đã xóa tạm thời quyền thành công');
         
     }
     //action 
    function actionpermission(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            foreach ($checkItems as $k => $v) {
                $permission = Permission::withTrashed()->find($v);
                if ($permission->user_id != Auth::id()) {
                    unset($checkItems[$k]);
                }
            }
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        Permission::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                    }
                    if ($act == 'restore') {
                        Permission::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Permission::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn quyền thành công');
                    }
                }
            }
            return redirect()->back()->with('status', 'Bạn không được phép xóa bản ghi của người khác trên hệ thống');
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
    function updatePermission(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:200'],
                'display_name' => ['required', 'string', 'max:200'],
                'module_parent' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => 'Trường :attribute phải là chuỗi',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'name' => 'tên',
                'display_name' => 'tên hiển thị',
                'module_parent' => 'danh mục quyền'
            ]
        );
        $nameParentPermission = Permission::find($request->module_parent)->name;
        Permission::where('id', $id)->update([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'parent_id' => $request->module_parent,
            'key_code' =>   $request->name . '_' . $nameParentPermission
        ]);
        return redirect()->back()->with(['status' => 'Bạn đã cập nhật quyền thành công']);
    }
    //PERMISSION CAT
    function permissioncat(Request $request)
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
            $listcat = Permission::onlyTrashed()->where([
                ['name', 'LIKE', "%{$keyword}%"],
                ['parent_id', 0]
            ])->paginate(20);
        } else {
            $listcat = Permission::where([
                ['name', 'LIKE', "%{$keyword}%"],
                ['parent_id', 0]
            ])->paginate(20);
        }
        $trash  = Permission::onlyTrashed()->where('parent_id', 0)->count();
        $active = Permission::where('parent_id', 0)->count();
        $data = [$trash, $active];
        return view('admin.permissioncat.index', compact('listcat', 'status', 'data', 'act', 'append'));
    }
    function storepermissioncat(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:200'],
                'display_name' => ['required', 'string', 'max:200'],
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => 'Trường :attribute phải là chuỗi',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'name' => 'tên',
                'display_name' => 'tên hiển thị',
            ]
        );
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['parent_id'] = 0;
        $input['key_code'] = NULL;
        Permission::create($input);
        return redirect()->back()->with(['status' => 'Bạn đã thêm mới danh mục quyền thành công']);
    }
    //Edit
    function editpermissioncat(Request $request, $id)
    {
        $permission_info = Permission::withTrashed()->find($id);
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
            $listcat = Permission::onlyTrashed()->where([
                ['name', 'LIKE', "%{$keyword}%"],
                ['parent_id', 0]
            ])->paginate(10);
        } else {
            $listcat = Permission::where([
                ['name', 'LIKE', "%{$keyword}%"],
                ['parent_id', 0]
            ])->paginate(10);
        }
        $trash  = Permission::onlyTrashed()->where('parent_id', 0)->count();
        $active = Permission::where('parent_id', 0)->count();
        $data = [$trash, $active];
        return view('admin.permissioncat.edit', compact('listcat', 'status', 'data', 'act', 'append', 'permission_info'));
    }
    //delete
    function deletepermissioncat(Request $request, $id)
    {
        // Tìm danh sách quyền của danh mục quyền
        $permissionChilren = Permission::where('parent_id', $id)->get();
        if (count($permissionChilren) > 0) {
            return redirect()->back()->with('status', 'Bạn cần phải xóa quyền thuộc danh mục quyền này trước');
        } else {
            Permission::find($id)->delete();
            return redirect()->back()->with('status', 'Đã xóa tạm thời danh mục quyền thành công');
        }
    }
    //action 
    function actionpermissioncat(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            foreach ($checkItems as $k => $v) {
                $listcat = Permission::withTrashed()->find($v);
                if ($listcat->user_id != Auth::id()) {
                    unset($checkItems[$k]);
                }
            }
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        foreach ($checkItems as $item) {
                            // Tìm danh sách quyền của danh mục quyền
                            $permissionChilren = Permission::where('parent_id', $item)->get();
                            if (count($permissionChilren) > 0) {
                                return redirect()->back()->with('status', 'Bạn cần phải xóa quyền thuộc danh mục quyền này trước');
                                break;
                            }
                        }
                        Permission::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                    }
                    if ($act == 'restore') {
                        Permission::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Permission::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn danh mục quyền thành công');
                    }
                }
            }
            return redirect()->back()->with('status', 'Bạn không được phép xóa bản ghi của người khác trên hệ thống');
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
    function updatepermissioncat(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:200'],
                'display_name' => ['required', 'string', 'max:200'],
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => 'Trường :attribute phải là chuỗi',
                'max' => 'Trường :attribute không được quá :max ký tự',
            ],
            [
                'name' => 'tên',
                'display_name' => 'tên hiển thị',
            ]
        );
        Permission::where('id', $id)->update([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
        ]);
        return redirect()->back()->with(['status' => 'Bạn đã cập nhật danh mục quyền thành công']);
    }
}
