<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use App\Order;
class AdminCustomerController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'order']);
            return $next($request);
        });
    }
    function customerList(Request $request)
    {
        $status = $request->input('status');
        $act = [
            'delete' => 'Xóa tạm thời'
        ];
        $append = [];
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
            $customers = Customer::onlyTrashed()->where('fullname', 'LIKE', "%{$keyword}%")->paginate(10);
        } else if ($status == 'all') {
            $append = [
                'status' => 'all'
            ];
            $customers = Customer::where([
                ['fullname', 'LIKE', "%{$keyword}%"]
            ])->paginate(10);
        } else {
            $customers = Customer::where([
                ['fullname', 'LIKE', "%{$keyword}%"]
            ])->paginate(10);
        }
        $trash  = Customer::onlyTrashed()->count();
        $all = Customer::all()->count();
        $data = [$trash, $all];
        return view('admin.order.customer', compact('customers', 'status', 'data', 'act', 'append'));
    }
    //delete
    function delete(Request $request, $id)
    {
        // $idOrder = Customer::find($id)->orders->first()->id;
        // Order::find($idOrder)->delete();
        Customer::find($id)->delete();
        return redirect()->back()->with('status', 'Đã xóa khách hàng thành công');
    }
    //action 
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'delete') {
                        Customer::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa thành công');
                    }
                    if ($act == 'restore') {
                        Customer::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Customer::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn khách hàng thành công');
                    }
                }
            }
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
}
