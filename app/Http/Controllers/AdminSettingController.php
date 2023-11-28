<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Auth;

class AdminSettingController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'settings']);
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
            $settings = Setting::onlyTrashed()->where('config_key', 'LIKE', "%{$keyword}%")->orderByDesc("created_at")->join('users', 'user_id', '=', 'users.id')->select('settings.*', 'users.name')->paginate(10);
        } else {
            $settings = Setting::where([
                ['config_key', 'LIKE', "%{$keyword}%"]
            ])->orderByDesc("created_at")->join('users', 'user_id', '=', 'users.id')->select('settings.*', 'users.name')->paginate(10);
        }
        $trash  = Setting::onlyTrashed()->count();
        $active = Setting::all()->count();
        $data = [$trash, $active];
        return view('admin.settings.list', compact('settings', 'status', 'data', 'act', 'append'));
    }
    function add()
    {
        return view('admin.settings.add');
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'config_key' => ['required', 'unique:settings', 'max:255'],
                'config_value' => ['required'],


            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'unique' => "Trường :attribute đã tồn tại trên hệ thống",
                'max' => 'Trường :attribute không được quá :max ký tự',

            ]
        );
        $input = $request->all();
        $input['type'] = $request->type;
        $input['user_id'] = Auth::id();
        Setting::create($input);
        return redirect()->route("list.settings")->with(['status' => 'Bạn đã thêm mới Setting thành công']);
    }
    //edit
    function edit(Request $request, $id)
    {
        $setting = Setting::withTrashed()->find($id);
        return view('admin.settings.edit', compact('setting'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'config_key' => ['required', 'max:255'],
                'config_value' => ['required'],
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'unique' => "Trường :attribute đã tồn tại trên hệ thống",
                'max' => 'Trường :attribute không được quá :max ký tự',

            ]
        );

        Setting::withTrashed()->where('id', $id)->update([
            'config_key' => $request->input('config_key'),
            'config_value' => $request->input('config_value'),
        ]);

        return redirect()->route("list.settings")->with(['status' => 'Bạn đã cập nhật setting thành công']);
    }
    //delete
    function delete(Request $request, $id)
    {
        Setting::find($id)->delete();
        return redirect()->back()->with('status', 'Đã xóa tạm thời Setting thành công');
    }
    //action 
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');

        if ($checkItems) {
            foreach ($checkItems as $k => $v) {
                $media = Setting::withTrashed()->find($v);
                if ($media->user_id != Auth::id()) {
                    unset($checkItems[$k]);
                }
            }

            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        Setting::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                    }
                    if ($act == 'restore') {
                        Setting::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Setting::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn setting thành công');
                    }
                }
            }
            return redirect()->back()->with('status', 'Bạn không được phép xóa bản ghi của người khác trên hệ thống');
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
}
