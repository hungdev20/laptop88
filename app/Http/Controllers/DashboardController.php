<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class DashboardController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'dashboard']);
            return $next($request);
        });
    }
    function show()
    {
        $order_success = Order::where('status', 'success')->get();
        $number_success = $order_success->count();
        $number_processing = Order::where('status', 'processing')->get()->count();
        $number_transporting = Order::where('status', 'transporting')->get()->count();
        $number_canceled = Order::onlyTrashed()->where('status', 'cancel')->get()->count();
        $all_order = Order::withTrashed()->orderBy('created_at', 'DESC')->paginate(10);
        $total = 0;
        foreach ($order_success as $item) {
            $total += $item->total;
        }
        $stockout = 0;
        $inventory = 0;
        $all_products = Product::where('status', 'active')->get();
        foreach ($all_products as $product) {
            if ($product->qty - $product->products_sold > 0) {
                $inventory++;
            }
            if ($product->qty - $product->products_sold ==  0) {
                $stockout++;
            }
        }
        return view('admin.dashboard', compact('number_success', 'number_processing', 'number_transporting', 'total', 'number_canceled', 'all_order', 'inventory', 'stockout'));
    }
}
