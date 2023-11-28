<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminAccountsController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'accounts']);
            return $next($request);
        });
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
            $accounts = Account::onlyTrashed()
                ->where('email', 'LIKE', "%{$keyword}%")
                ->orderBy('created_at','DESC')
                ->paginate(10);
        } else {
            $accounts = Account::where('email', 'LIKE', "%{$keyword}%")
                ->orderBy('created_at','DESC')
                ->paginate(10);
        }
        $trash  = Account::onlyTrashed()->count();
        $active = Account::all()->count();
        $data = [$trash, $active];
        return view('admin.accounts.list', compact('accounts', 'status', 'data', 'act', 'append'));
    }
    //delete
    function delete(Request $request, $id)
    {
        Account::find($id)->delete();
        return redirect()->back()->with('status', 'Đã xóa tạm thời tài khoản thành công');
    }
    //action 
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            if ($request->input('act')) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    Account::destroy($checkItems);
                    return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                }
                if ($act == 'restore') {
                    Account::onlyTrashed()->whereIn('id', $checkItems)->restore();
                    return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                }
                if ($act == 'forceDelete') {
                    $accounts_deleted = Account::onlyTrashed()->whereIn('id', $checkItems)->get();
                    foreach ($accounts_deleted as $account) {
                        if (!empty($account->avatar)) {
                            unlink('uploads/accounts/avatar/' . $account->avatar);
                        }
                    }
                    Account::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();

                    return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn tài khoản thành công');
                }
            }
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
    //edit
    function edit(Request $request, $id)
    {
        $account_info = Account::withTrashed()->find($id);
        return view('admin.accounts.edit', compact('account_info'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'fullname' => ['required', 'string', 'max:200'],
                'username' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'max:150'],
                'password' => ['required', 'string', 'regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/', 'confirmed'],
                'phone_number' => ['required', 'numeric', 'digits:10'],
                'gender' => ['required'],
                'avatar' => ['image', 'max:1024']
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'integer' => 'Trường :attribute phải là số',
                'avatar.image' => 'File upload lên phải có định dạng của hình ảnh',
                'max' => 'Trường :attribute không được quá :max ký tự',
                'confirmed' => "Xác nhận mật khẩu không thành công",
                'string' => 'Trường :attribute phải có định dạng chuỗi',
                'regex' => ':attribute không đúng định dạng',
                'avatar.max' => 'Bạn không được upload file ảnh quá 1MB',
                'numeric' => 'Trường :attribute phải ở dạng số',
                'digits' => 'Trường :attribute phải có 10 chữ số',
            ],
            [
                'fullname' => 'họ và tên',
                'username' => 'tên đăng nhập',
                'password' => "Mật khẩu",
                'phone_number' => 'số điện thoại',
                'gender' => 'giới tính',
                'avatar' => 'ảnh đại diện'
            ]
        );
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file_original = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $file_array = Str::of($file_original)->explode('.');
            $file_name = $file_array[0];
            $target_dir = 'uploads/accounts/avatar/';
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
            $file->move($target_dir, $file_upload);
            Account::withTrashed()->where('id', $id)->update([
                'fullname' => $request->input('fullname'),
                'username' => $request->input('username'),
                'avatar' => $file_upload,
                'email' => $request->input('email'),
                'password' => md5($request->input('password')),
                'phone_number' => $request->input('phone_number'),
                'gender' => $request->input('gender'),
            ]);
        } else {
            Account::withTrashed()->where('id', $id)->update([
                'fullname' => $request->input('fullname'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => md5($request->input('password')),
                'phone_number' => $request->input('phone_number'),
                'gender' => $request->input('gender'),
            ]);
        }
        return redirect()->back()->with(['status' => 'Bạn đã cập nhật tài khoản thành công']);
    }
}
