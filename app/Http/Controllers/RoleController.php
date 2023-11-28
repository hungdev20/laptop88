<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class RoleController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'roles']);
            return $next($request);
        });
    }
    function list(Request $request)
    {
        $role = Role::paginate(10);
        $user_info = User::find(Auth::id());
        $roleOfUser = $user_info->roles->pluck('id');
        return view('admin.role.index', compact('role', 'roleOfUser'));
    }
    function add(Request $request)
    {
        $permissionParent = Permission::where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionParent'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:100', 'unique:roles'],
                'display_name' => ['required', 'string', 'max:100'],
            ],
            [
                'required' => ":attribute không được để trống",
                'min' => ":attribute có độ dài ít nhất :min ký tự",
                'string' => 'Trường :attribute phải có định dạng chuỗi',
                'max' => ":attribute có độ dài tối đa :max ký tự",
                'confirmed' => "Xác nhận mật khẩu không thành công",
                'unique' => ":attribute đã tồn tại trên hệ thống"
            ],
            [
                'name' => 'Tên quyền',
                'display_name' => 'Tên hiển thị',
            ]
        );
        $roleCreate =  Role::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name')
        ]);
        $roleCreate->permissions()->attach($request->input('permission_id'));
        return redirect('roles/list')->with('status', 'Đã thêm quyền thành công');
    }
    function edit(Request $request, $id)
    {
        $role = Role::find($id);
        //Lấy danh sách chức năng cha
        $permissionParent = Permission::where('parent_id', 0)->get();
        $permissionChecked = $role->permissions;
        return view('admin.role.edit', compact('role', 'permissionChecked', 'permissionParent'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:100'],
                'display_name' => ['required', 'string', 'max:100'],
            ],
            [
                'required' => ":attribute không được để trống",
                'min' => ":attribute có độ dài ít nhất :min ký tự",
                'string' => 'Trường :attribute phải có định dạng chuỗi',
                'max' => ":attribute có độ dài tối đa :max ký tự",
                'confirmed' => "Xác nhận mật khẩu không thành công",
                'unique' => ":attribute đã tồn tại trên hệ thống"
            ],
            [
                'name' => 'Tên quyền',
                'display_name' => 'Tên hiển thị',
            ]
        );
        Role::where('id', $id)->update([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
        ]);
        //update to role_user table
        $role = Role::find($id);
        $role->permissions()->sync($request->input('permission_id'));
        return redirect('roles/list')->with('status', 'Bạn đã cập nhật quyền thành công');
    }
    function delete($id)
    {
      
        $role = Role::find($id);
        $role->delete();
        return redirect('roles/list')->with('status', 'Đã xóa quyền thành công');
        
    }
}
