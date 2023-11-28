<?php
namespace App\Http\Controllers;
use App\GlobalSetting;
use Illuminate\Http\Request;
class AdminAdvancedOptionController extends Controller
{
    // 
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'AdvancedOption']);
            return $next($request); 
        });
    }
    function add()
    {
        $scriptHead = GlobalSetting::where('id', 1)->first()->header;
       
        $scriptFooter = GlobalSetting::where('id', 1)->first()->footer;
        $scriptBodyTop = GlobalSetting::where('id', 1)->first()->bodyTop;
        $scriptBodyBottom = GlobalSetting::where('id', 1)->first()->bodyBottom;
        return view('admin.advancedOption.globalSetting.add', compact('scriptHead','scriptFooter','scriptBodyTop', 'scriptBodyBottom'));
    }
    function store(Request $request)
    {
        GlobalSetting::where('id', 1)->update([
            'header' => !empty($request->input('header'))?$request->input('header'):NULL, 
            'footer' => !empty($request->input('footer'))?$request->input('footer'):NULL, 
            'bodyTop' => !empty($request->input('bodyTop'))?$request->input('bodyTop'):NULL, 
            'bodyBottom' => !empty($request->input('bodyBottom'))?$request->input('bodyBottom'):NULL, 
        ]);
        return redirect()->back()->with(['status' => 'Bạn đã thay đổi global setting thành công']);
    }
}
