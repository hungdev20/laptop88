<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Page; 
use Illuminate\Support\Str;
class AdminPageController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'page']);
            return $next($request);
        });
    }
    function add()
    {
        return view('admin.page.add');
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
            $pages = Page::onlyTrashed()->where('page_title', 'LIKE', "%{$keyword}%")->join('users', 'user_id', '=', 'users.id')->select('pages.*', 'users.name')->paginate(10);
        } else if ($status == 'passive') {
            $append = [
                'status' => 'passive'
            ];
            $pages = Page::where([
                ['page_title', 'LIKE', "%{$keyword}%"],
                ['status', 'passive']
            ])->join('users', 'user_id', '=', 'users.id')->select('pages.*', 'users.name')->paginate(10);
        } else {
            $pages = Page::where([
                ['page_title', 'LIKE', "%{$keyword}%"],
                ['status', 'active']
            ])->join('users', 'user_id', '=', 'users.id')->select('pages.*', 'users.name')->paginate(10);
      
        }
        $trash  = Page::onlyTrashed()->count();
        $active = Page::where('status', 'active')->count();
        $passive = Page::where('status', 'passive')->count();
        $data = [$trash, $active, $passive];
        return view('admin.page.list', compact('pages', 'status', 'data', 'act', 'append'));
    }
    //delete
    function delete(Request $request, $id)
    {
        Page::find($id)->delete();
        return redirect()->back()->with('status', 'Đã xóa trang thành công');
    }
    //action 
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            foreach ($checkItems as $k => $v) {
                $page = Page::withTrashed()->find($v);
                if ($page->user_id != Auth::id()) {
                    unset($checkItems[$k]);
                }
            }
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        Page::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa thành công');
                    }
                    if ($act == 'restore') {
                        Page::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Page::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn trang thành công');
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
        $page_info = Page::withTrashed()->find($id);
        return view('admin.page.edit', compact('page_info'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'page_title' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string'],
                'content' => ['required','string'],
                'file' => ['image', 'max:1024'],
                'status' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'file.image' => 'File upload lên phải có định dạng của hình ảnh',
                'string' => ':attribute phải ở dạng chuỗi kí tự',
                'max' => 'Trường :attribute không được quá :max ký tự',
                'file.max' => 'Bạn không được upload file ảnh quá 8MB'
            ],
            [
                'page_title' => 'tiêu đề trang',
                'content' => 'nội dung',
                'status' => 'trạng thái'
            ]
        );
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file_dir = 'uploads/pages/';
            if ($file->move($file_dir,  $file_name)) {
                $thumbnail = $file_dir . $file_name;
            }
        }
        if (!empty($thumbnail)) {
            Page::withTrashed()->where('id', $id)->update([
                'page_title' => $request->input('page_title'),
                'slug' => Str::slug($request->input('slug')),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
                'thumbnail' => $thumbnail
            ]);
        } else {
            Page::withTrashed()->where('id', $id)->update([
                'page_title' => $request->input('page_title'),
                'slug' => Str::slug($request->input('slug')),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
            ]);
        }
        return redirect('admin/page/list')->with(['status' => 'Bạn đã cập nhật trang thành công']);
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'page_title' => ['required', 'string', 'unique:pages', 'max:255'],
                'slug' => ['required', 'string'],
                'content' => ['required','string'],
                'file' => ['image', 'max:1024'],
                'status' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'file.image' => 'File upload lên phải có định dạng của hình ảnh',
                'string' => ':attribute phải ở dạng chuỗi kí tự',
                'max' => 'Trường :attribute không được quá :max ký tự',
                'file.max' => 'Bạn không được upload file ảnh quá 8MB'
            ],
            [
                'page_title' => 'tiêu đề trang',
                'content' => 'nội dung',
                'status' => 'trạng thái'
            ]
        );
        $input = $request->all(); 
        $input['slug'] = Str::slug($request->input('slug'));
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file_dir = 'uploads/pages/';
            if ($file->move($file_dir,  $file_name)) {
                $input['thumbnail'] = $file_dir . $file_name;
            }
        }
        $input['user_id'] = Auth::id();
        Page::create($input);
        return redirect('admin/page/list')->with(['status' => 'Bạn đã thêm mới trang thành công']);
    }
    function detail($id)
    { 
        $page_info = Page::find($id);
        return view('admin.page.detail', compact('page_info'));
    }
}
