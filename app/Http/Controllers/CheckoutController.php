<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_cat;
use App\Menu;
use App\Province;
use App\District;
use App\Ward;
use App\Customer;
use App\Order;
use App\Account;
use App\Customer_order;
use App\Product_order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSuccess;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    //
    public $extra_info;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session()->has('page_current')) {
                session()->forget('page_current');
            }
            return $next($request);
        });
    }
    function checkout(Request $request)
    {
        $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
        $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
        $meta_title = "Thiết bị điện tử chất lượng cao";
        $url_canonical = $request->url();
        $provinces = Province::all();
        return view('client.checkout.index', compact('provinces', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }
    function chooseProvince()
    {
        $province_id = $_POST['province_id'];
        if ($province_id > 0) {
            $districts = District::where('province_id', $province_id)->get();
        }
        //    $data = "<select name ='district' id='district' class='custom-select'>
        //   ";
        $data = " <option value='' data_id='0'>Chọn Quận/Huyện</option>";
        foreach ($districts as $district) {
            $data .= "<option value='" . $district->name . "' data_id='" . $district->id . "'>" . $district->name . "</option>";
        }
        echo json_encode($data);
    }
    function chooseDistrict()
    {
        $district_id = $_POST['district_id'];
        if ($district_id > 0) {
            $wards = Ward::where('district_id', $district_id)->get();
        }
        //    $data = "<select name ='district' id='district' class='custom-select'>
        //   ";
        $data = " <option value='' data_id='0'>Chọn Phường</option>";
        foreach ($wards as $ward) {
            $data .= "<option value='" . $ward->name . "' data_id='" . $ward->id . "'>" . $ward->name . "</option>";
        }
        echo json_encode($data);
    }
    function checkInfo(Request $request)
    {
        //validate
        $request->validate(
            [
                'fullname' => ['required', 'string', 'max:200'],
                'phone' => ['required', 'numeric'],
                'provinces' => 'required',
                'district' => 'required',
                'wards' => 'required',
                'detail-address' => ['required', 'string'],
                'email' => 'required'
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'string' => 'Trường :attribute phải có định dạng kiểu chuỗi',
                'integer' => 'Trường :attribute phải là số',
                'fullname.max' => 'Trường :attribute không được vượt quá max kí tự',
            ],
            [
                'fullname' => 'Họ và tên',
                'phone' => 'Số điện thoại',
                'provinces' => 'Tỉnh',
                'district' => 'Quận/Huyện',
                'wards' => 'Phường',
                'detail-address' => 'Địa chỉ chi tiết'
            ]
        );
        if (session()->has('extra_info')) {
            session()->forget('extra_info');
        }
        $province = $request->input('provinces');
        $district = $request->input('district');
        $ward = $request->input('wards');
        $address_detail = $request->input('detail-address');
        $address_customer = $address_detail . ', ' . $ward . ', ' . $district . ', ' . $province;
        $maxIdOrder = Order::max('id');
        $code = $maxIdOrder + 1;
        if (session()->has('user_email')) {
            $email = session('user_email');
            $account_id = Account::where('email', $email)->first()->id;
            $order_info = Order::create(
                [
                    'code' => 'NAXG' . $code,
                    'customer' => $request->input('fullname'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'address' => $address_customer,
                    'qty' => Cart::count(),
                    'total' => str_replace('.', '', Cart::total()),
                    'status' => 'processing',
                    'payment' => $request->input('payment-method'),
                    'note' => $request->input('note'),
                    'account_id' => $account_id
                ]
            );
        } else {
            $order_info = Order::create(
                [
                    'code' => 'NAXG' . $code,
                    'customer' => $request->input('fullname'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'address' => $address_customer,
                    'qty' => Cart::count(),
                    'total' => str_replace('.', '', Cart::total()),
                    'status' => 'processing',
                    'payment' => $request->input('payment-method'),
                    'note' => $request->input('note'),
                    'account_id' => NULL
                ]
            );
        }
        $order_inserted = $order_info->id;
        //Tru so luong san pham da dat mua
        foreach (Cart::content() as $cartItem) {
            $idPro = $cartItem->id;
            $product = Product::find($idPro);
            $products_sold = $product->products_sold;
            $product->products_sold = $products_sold + $cartItem->qty;
            $product->products_rest = $product->qty - $product->products_sold;
            $product->save();
        }
        foreach (Cart::content() as $item) {
            Product_order::create(
                [
                    'product_id' => $item->id,
                    'qty' => $item->qty,
                    'order_id' => $order_inserted
                ]
            );
        }
        $data = [
            'code' => 'NAXG' . $code,
            'customer_name' => $request->input('fullname'),
            'address' => $address_customer,
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            'payment_method' => $request->input('payment-method'),
            'order_detail' => Cart::content(),
            'total_price' => str_replace('.', '', Cart::total()),
            'time' => date("d-m-Y H:i:s")
        ];
        Mail::to($request->input('email'))->send(new OrderSuccess($data));
        session()->put('orderSuccess', 'orderSuccess');
        $extra_info = [
            'address_detail' =>  $address_detail,
            'code' => 'NAXG' . $code,
            'ward' =>  $ward,
            'district' => $district,
            'province' => $province,
            'payment_method' => $request->input('payment-method'),
            'fullname' => $request->input('fullname'),
            'phone_number' => $request->input('phone'),
            'email' => $request->input('email'),
            'note' => $request->input('note')
        ];
        $this->extra_info = $extra_info;
        session()->put('extra_info', $extra_info);


        return redirect()->route('orderSuccess');
    }
    function orderSuccess(Request $request)
    {
        $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
        $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
        $meta_title = "Thiết bị điện tử chất lượng cao";
        $url_canonical = $request->url();
        //Blog
        $menu_blog = Menu::where([
            ['status', 'active'],
            ['postcat_id', '<>', 0]
        ])->first();
        // Menu
        $menus = Menu::where([
            ['status', 'active'],
            ['page_id', '<>', 0]
        ])->get();
        //Product-cat
        $cat1 = Product_cat::where([
            ['status', 'active'],
            ['parent_id', 0]
        ])->get();
        // $extra = $this->extra_info;
        $extra_info = session('extra_info');
        return view('client.checkout.orderSuccess', compact('menu_blog', 'menus', 'cat1', 'extra_info', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }
}
