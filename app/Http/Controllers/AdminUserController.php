<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AdminUserController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'user']);
            return $next($request);
        });
    }
    //
    function edit(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $listRoleOfUser = DB::table('role_user')->where('user_id', $id)->pluck('role_id');
        return view('admin.user.edit', compact('user', 'roles', 'listRoleOfUser'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'], 
                'roles' => ['required']
            ],
            [
                'required' => ":attribute không được để trống",
                'min' => ":attribute có độ dài ít nhất :min ký tự",
                'string' => 'Trường :attribute phải có định dạng chuỗi',
                'max' => ":attribute có độ dài tối đa :max ký tự",
                'confirmed' => "Xác nhận mật khẩu không thành công"
            ],
            [
                'name' => 'Tên người dùng',
                'roles' => 'Quyền',
                'password' => "Mật khẩu"
            ]
        );
        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);
        //update to role_user table
        DB::table('role_user')->where('user_id', $id)->delete();
        foreach ($request->roles as $roleId) {
            DB::table('role_user')->insert([
                'user_id' => $id,
                'role_id' => $roleId
            ]);
        }
        return redirect('admin/user/list')->with('status', 'Bạn đã cập nhật user thành công');
    }
    function list(Request $request)
    {
        $status = $request->input('status');
        $act = [
            'delete' => 'Xóa tạm thời'
        ];
        if ($status == 'trash') {
            $act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            $users = User::onlyTrashed()->where('name', 'LIKE', "%{$keyword}%")->paginate(10);
        } else {
            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            $users = User::where('name', 'LIKE', "%{$keyword}%")->paginate(10);
        }
        $users_active = User::count();
        $users_trashed = User::onlyTrashed()->count();
        $data = [$users_active, $users_trashed];
        return view('admin.user.list', compact('users', 'data', 'act', 'status'));
    }
    function add()
    {
        $roles = Role::all();
        return view('admin.user.add', compact('roles'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => ":attribute không được để trống",
                'min' => ":attribute có độ dài ít nhất :min ký tự",
                'string' => 'Trường :attribute phải có định dạng chuỗi',
                'max' => ":attribute có độ dài tối đa :max ký tự",
                'confirmed' => "Xác nhận mật khẩu không thành công"
            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
                'password' => "Mật khẩu"
            ]
        );
        $user =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $roles = $request->input('roles');
        foreach ($roles as $roleId) {
            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => $roleId
            ]);
        }
        return redirect('admin/user/list')->with('status', 'Đã thêm thành viên thành công');
    }
    function delete($id)
    {
        if (Auth::id() != $id) {
            $user = User::find($id); 
            $user->delete();
            return redirect('admin/user/list')->with('status', 'Đã xóa thành viên thành công');
        } else {
            return redirect('admin/user/list')->with('status', 'Bạn không thể tự xóa mình ra khỏi hệ thống');
        }
    }
    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            foreach ($list_check as $k => $id) {
                if (Auth::id() == $id) {
                    unset($list_check[$k]);
                }
            }
            if (!empty($list_check)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        User::destroy($list_check);
                        return redirect('admin/user/list')->with('status', 'Bạn đã xóa thành công');
                    }
                    if ($act == 'restore') {
                        User::onlyTrashed()->whereIn('id', $list_check)->restore();
                        return redirect('admin/user/list')->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        User::onlyTrashed()->whereIn('id', $list_check)->forceDelete();
                        return redirect('admin/user/list')->with('status', 'Bạn đã xóa vĩnh viễn user thành công');
                    }
                }
            }
            return redirect('admin/user/list')->with('status', 'Bạn không được phép xóa chính bản ghi của mình trên hệ thống');
        } else {
            return redirect('admin/user/list')->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
}
