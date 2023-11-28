<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Customer;
use App\Product_order;

class AdminOrderController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'order']);
            return $next($request);
        });
    }
    function orderList(Request $request)
    {
        $status = $request->input('status');
        $act = [
            'cancel' => 'Hủy đơn hàng',
            'processing' => 'Đang xử lý',
            'transporting' => 'Đang vận chuyển',
            'success' => 'Thành công',
        ];
        $append = [];
        $keyword = "";
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }
        if ($status == 'cancel') {
            $append = [
                'status' => 'cancel'
            ];
            $act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $orders = Order::onlyTrashed()->where([
                ['code', 'LIKE', "%{$keyword}%"],
                ['status', 'cancel']
            ])->orderBy('deleted_at', 'DESC')->paginate(10);
        } else if ($status == 'processing') {
            $append = [
                'status' => 'processing'
            ];
            $act = [
                'cancel' => 'Hủy đơn hàng',
                'transporting' => 'Đang vận chuyển',
                'success' => 'Thành công',
            ];
            $orders = Order::where([
                ['code', 'LIKE', "%{$keyword}%"],
                ['status', 'processing']
            ])->orWhere([
                ['phone', 'LIKE', "%{$keyword}%"],
                ['status', 'processing']
            ])->orWhere([
                ['customer', 'LIKE', "%{$keyword}%"],
                ['status', 'processing']
            ])->orWhere([
                ['email', 'LIKE', "%{$keyword}%"],
                ['status', 'processing']
            ])->paginate(10);
        } else if ($status == 'transporting') {
            $append = [
                'status' => 'transporting'
            ];
            $act = [
                'cancel' => 'Hủy đơn hàng',
                'processing' => 'Đang xử lý',
                'success' => 'Thành công',
            ];
            $orders = Order::where([
                ['code', 'LIKE', "%{$keyword}%"],
                ['status', 'transporting']
            ])->orWhere([
                ['phone', 'LIKE', "%{$keyword}%"],
                ['status', 'transporting']
            ])->orWhere([
                ['customer', 'LIKE', "%{$keyword}%"],
                ['status', 'transporting']
            ])->orWhere([
                ['email', 'LIKE', "%{$keyword}%"],
                ['status', 'transporting']
            ])->paginate(10);
        } else if ($status == 'success') {
            $append = [
                'status' => 'success'
            ];
            $act = [
                'cancel' => 'Hủy đơn hàng',
                'processing' => 'Đang xử lý',
                'transporting' => 'Đang vận chuyển',
            ];
            $orders = Order::where([
                ['code', 'LIKE', "%{$keyword}%"],
                ['status', 'success']
            ])->orWhere([
                ['phone', 'LIKE', "%{$keyword}%"],
                ['status', 'success']
            ])->orWhere([
                ['customer', 'LIKE', "%{$keyword}%"],
                ['status', 'success']
            ])->orWhere([
                ['email', 'LIKE', "%{$keyword}%"],
                ['status', 'success']
            ])->paginate(10);
        } else if (($status == 'all')) {
            $append = [
                'status' => 'all'
            ];
            $orders = Order::withTrashed()->where([
                ['code', 'LIKE', "%{$keyword}%"]
            ])->orWhere([
                ['phone', 'LIKE', "%{$keyword}%"]
            ])->orWhere([
                ['customer', 'LIKE', "%{$keyword}%"]
            ])->orWhere([
                ['email', 'LIKE', "%{$keyword}%"]
            ])->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $orders = Order::withTrashed()->where([
                ['code', 'LIKE', "%{$keyword}%"]
            ])->orWhere([
                ['phone', 'LIKE', "%{$keyword}%"]
            ])->orWhere([
                ['customer', 'LIKE', "%{$keyword}%"]
            ])->orWhere([
                ['email', 'LIKE', "%{$keyword}%"]
            ])->orderBy('created_at', 'DESC')->paginate(10);
        }
        $all = Order::withTrashed()->count();
        $cancel  = Order::onlyTrashed()->count();
        $processing = Order::where('status', 'processing')->count();
        $transporting = Order::where('status', 'transporting')->count();
        $success = Order::where('status', 'success')->count();
        $data = [$all, $cancel, $processing, $transporting, $success];
        return view('admin.order.index', compact('orders', 'status', 'data', 'act', 'append'));
    }
    //delete
    function delete(Request $request, $id)
    {
        Order::where('id', $id)->update(
            ['status' => 'cancel']
        );
        Order::find($id)->delete();
        return redirect()->back()->with('status', 'Đã xóa tạm thời đơn hàng thành công');
    }
    //action 
    function action(Request $request)
    {
        $checkItems = $request->input('checkItem');
        if ($checkItems) {
            if (!empty($checkItems)) {
                if ($request->input('act')) {
                    $act = $request->input('act');
                    if ($act == 'cancel') {
                        Order::whereIn('id', $checkItems)->update(
                            ['status' => 'cancel']
                        );
                        Order::destroy($checkItems);
                        return redirect()->back()->with('status', 'Bạn đã xóa tạm thời thành công');
                    }
                    if ($act == 'transporting') {
                        Order::whereIn('id', $checkItems)->update(['status' => 'transporting']);
                        return redirect()->back()->with('status', 'Đơn hàng đã được cập nhật sang trạng thái đang vận chuyển');
                    }
                    if ($act == 'success') {
                        Order::whereIn('id', $checkItems)->update(['status' => 'success']);
                        return redirect()->back()->with('status', 'Đơn hàng đã được cập nhật sang trạng thái thành công');
                    }
                    if ($act == 'processing') {
                        Order::whereIn('id', $checkItems)->update(['status' => 'processing']);
                        return redirect()->back()->with('status', 'Đơn hàng đã được cập nhật sang trạng thái đang xử lý');
                    }
                    if ($act == 'restore') {
                        Order::onlyTrashed()->whereIn('id', $checkItems)->update(['status' => 'processing']);
                        Order::onlyTrashed()->whereIn('id', $checkItems)->restore();
                        return redirect()->back()->with('status', 'Bạn đã khôi phục thành công');
                    }
                    if ($act == 'forceDelete') {
                        Order::onlyTrashed()->whereIn('id', $checkItems)->forceDelete();
                        return redirect()->back()->with('status', 'Bạn đã xóa vĩnh viễn đơn hàng thành công');
                    }
                }
            }
        } else {
            return redirect()->back()->with('status', 'Bạn cần chọn bản ghi trước khi thực hiện thao tác');
        }
    }
    function edit(Request $request, $id)
    {
        if (session()->has('orderStatus')) {
            session()->forget('orderStatus');
        }
        $order_info = Order::withTrashed()->find($id);
        $product_info = Order::withTrashed()->find($id)->products;
        session()->put('orderStatus', $order_info->status);
        return view('admin.order.detail', compact('order_info', 'product_info'));
    }
    function update(Request $request, $id)
    {
        if ($request->has('sm_status')) {
            $data = $request->all();
            $status = $request->input('status');
            $orderTrashInfo = Order::onlyTrashed()->find($id);
            $order_product_id = $data['order_product_id'];
            $order_product_qty = $data['qty'];
            $order_qty_storage = $data['order_qty_storage'];
            if ($status == 'processing') {
                if (session('orderStatus')  == 'cancel') {
                    $j  = 0;
                    foreach ($order_qty_storage as $k2 => $qty_storage) {
                        foreach ($order_product_qty as $k3 => $order_qty) {
                            if ($k2 == $k3) {
                                if ($order_qty > $qty_storage) {
                                    $j++;
                                }
                            }
                        }
                    }
                    if ($j == 0) {
                        Order::withTrashed()->find($id)->update(['status' => 'processing']);
                        foreach ($order_product_id as $k => $product_id) {
                            $product = Product::find($product_id);
                            $products_sold = $product->products_sold;
                            foreach ($order_product_qty as $k1 => $qty) {
                                if ($k == $k1) {
                                    $product->products_sold = $products_sold + $qty;
                                    $product->save();
                                }
                            }
                        }
                        if (!empty($orderTrashInfo)) {
                            $orderTrashInfo->restore();
                        }
                        return back()->with('status', 'Bạn đã cập nhật trạng thái đơn hàng thành công');
                    } else {
                        return back()->with('status', 'Số lượng đặt hàng đang lớn hơn số lượng tồn kho');
                    }
                } else {
                    Order::find($id)->update(['status' => 'processing']);
                    return back()->with('status', 'Bạn đã cập nhật trạng thái đơn hàng thành công');
                }
            } else if ($status == 'transporting') {
                if (session('orderStatus')  == 'cancel') {
                    $j  = 0;
                    foreach ($order_qty_storage as $k2 => $qty_storage) {
                        foreach ($order_product_qty as $k3 => $order_qty) {
                            if ($k2 == $k3) {
                                if ($order_qty > $qty_storage) {
                                    $j++;
                                }
                            }
                        }
                    }
                    if ($j == 0) {
                        Order::withTrashed()->find($id)->update(['status' => 'transporting']);
                        foreach ($order_product_id as $k => $product_id) {
                            $product = Product::find($product_id);
                            $products_sold = $product->products_sold;
                            foreach ($order_product_qty as $k1 => $qty) {
                                if ($k == $k1) {
                                    $product->products_sold = $products_sold + $qty;
                                    $product->save();
                                }
                            }
                        }
                        if (!empty($orderTrashInfo)) {
                            $orderTrashInfo->restore();
                        }
                        return back()->with('status', 'Bạn đã cập nhật trạng thái đơn hàng thành công');
                    } else {
                        return back()->with('status', 'Số lượng đặt hàng đang lớn hơn số lượng tồn kho');
                    }
                } else {
                    Order::find($id)->update(['status' => 'transporting']);
                    return back()->with('status', 'Bạn đã cập nhật trạng thái đơn hàng thành công');
                }
            } else if ($status == 'success') {
                if (session('orderStatus')  == 'cancel') {
                    $j  = 0;
                    foreach ($order_qty_storage as $k2 => $qty_storage) {
                        foreach ($order_product_qty as $k3 => $order_qty) {
                            if ($k2 == $k3) {
                                if ($order_qty > $qty_storage) {
                                    $j++;
                                }
                            }
                        }
                    }
                    if ($j == 0) {
                        Order::withTrashed()->find($id)->update(['status' => 'success']);
                        foreach ($order_product_id as $k => $product_id) {
                            $product = Product::find($product_id);
                            $products_sold = $product->products_sold;
                            foreach ($order_product_qty as $k1 => $qty) {
                                if ($k == $k1) {
                                    $product->products_sold = $products_sold + $qty;
                                    $product->save();
                                }
                            }
                        }
                        if (!empty($orderTrashInfo)) {
                            $orderTrashInfo->restore();
                        }
                        return back()->with('status', 'Bạn đã cập nhật trạng thái đơn hàng thành công');
                    } else {
                        return back()->with('status', 'Số lượng đặt hàng đang lớn hơn số lượng tồn kho');
                    }
                } else {
                    Order::find($id)->update(['status' => 'success']);
                    return back()->with('status', 'Bạn đã cập nhật trạng thái đơn hàng thành công');
                }
            } else if ($status == 'cancel') {
                if (session('orderStatus') == $status) {
                    return back()->with('status', 'Bạn cần chọn trạng thái khác trước khi thực hiện thao tác');
                } else {
                    Order::find($id)->update(['status' => 'cancel']);
                    foreach ($order_product_id as $k => $product_id) {
                        $product = Product::find($product_id);
                        $products_sold = $product->products_sold;
                        foreach ($order_product_qty as $k1 => $qty) {
                            if ($k == $k1) {
                                // $pro_remain = $product_quantity - $qty;
                                $product->products_sold = $products_sold - $qty;
                                $product->save();
                            }
                        }
                    }
                    Order::find($id)->delete();
                    return back()->with('status', 'Bạn đã cập nhật trạng thái đơn hàng thành công');
                }
            }
        }
    }
    function update_order_qty(Request $request)
    {
        $data = $request->all();
        $product_price = Product::find($data['order_product_id'])->price;
        $order_details = Product_order::where([
            ['product_id', $data['order_product_id']],
            ['order_id', $data['order_id']]
        ])->first();
        $order_details->qty = $data['order_qty'];
        $order_details->save();
        $product_of_order = Product_order::where('order_id', $data['order_id'])->get();
        $total_qty = 0;
        $total_price = 0;
        foreach ($product_of_order as $item) {
            $product = Product::find($item->product_id);
            $total_price += $product->price * $item->qty;
            $total_qty += $item->qty;
        }
        // tim don hang theo order_id de cap nhat tong so luong
        $order = Order::find($data['order_id']);
        $order->qty = $total_qty;
        $order->total = $total_price;
        $order->save();
        // tinh tong tien don hang
        $order_total_price =  number_format($order->total, 0, ',', '.');
        //tinh tong tien moi san pham thuoc don hang
        $order_product_subtotal =  number_format($product_price * $order_details->qty, 0, ',', '.');
        $data1 = array(
            'qty' => $order_details->qty,
            'order_product_subtotal' => $order_product_subtotal,
            'total_qty' => $total_qty,
            'order_total_price' => $order_total_price
        );
        echo json_encode($data1);
    }
    function printBill(Request $request, $id)
    {
       
        $order_info = Order::find($id);
        $product_info = Order::find($id)->products;
        return view('admin.order.bill', compact('order_info', 'product_info'));
    }
}
