<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Illuminate\Support\Str;
use App\Menu;
class CartController extends Controller
{
    //
    public function __construct()
    {
       
        $this->middleware(function ($request, $next) {
            if (session()->has('page_current')) {
                session()->forget('page_current');
            }
            return $next($request);
        });
    }
    public function addCartNormal(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->has('num_order')) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_title,
                'qty' => $request->input('num_order'),
                'price' => $product->price,
                'options' => ['thumbnail' => $product->thumbnail, 'code' => $product->code, 'slug' => $product->slug]
            ]);
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_title,
                'qty' => 1,
                'price' => $product->price,
                'options' => ['thumbnail' => $product->thumbnail, 'code' => $product->code, 'slug' => $product->slug]
            ]);
        }
        return redirect()->route('checkout');
    }
    public function add(Request $request)
    {
        $product = Product::find($request->id);
        if ($request->has('num_order') && $request->input('num_order') > 1) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_title,
                'qty' => $request->input('num_order'),
                'price' => $product->price,
                'options' => ['thumbnail' => $product->thumbnail, 'code' => $product->code, 'slug' => $product->slug]
            ]);
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_title,
                'qty' => 1,
                'price' => $product->price,
                'options' => ['thumbnail' => $product->thumbnail, 'code' => $product->code, 'slug' => $product->slug]
            ]);
        }
        $num_order = Cart::count();
        $cart = "<p class = 'desc'>Có <span id='extra_num'>" . Cart::count() . " sản phẩm</span> trong giỏ hàng</p>
        <ul class = 'list-cart overflow-auto' style='max-height:175px'>";
        foreach (Cart::content() as $cartItem) {
            $cart .= "<li class = 'clearfix'>
            <a href = '" . route('productDetail', [$cartItem->options->slug, $cartItem->id])  . "' title= '' class = 'thumb fl-left'>
            <img src = '" .  url($cartItem->options->thumbnail) . "' alt = ''>
            </a>
            <div class = 'info fl-right'>
            <a href = '"  . route('productDetail', [$cartItem->options->slug, $cartItem->id])  . "'title='' class = 'product-name'>" . Str::of($cartItem->name)->limit(30) . "</a>
            <p class = 'price'>" . number_format($cartItem->price, 0, ',', '.') . "đ</p>
            <p class = 'qty'>Số lượng: <span>" . $cartItem->qty . "</span>
            </p>
            </div>
            </li>";
        }
        $cart .= "</ul>
<div class = 'total-price clearfix'>
<p class = 'title fl-left'>Tổng:</p>
<p class = 'price fl-right'>" .  Cart::total()  . "đ</p>
</div>
<div class = 'action-cart clearfix'>
<a href = '"  .  route('cart.show') . "' title ='Giỏ hàng' class='view-cart fl-left'>Giỏ hàng</a>
<a href = '" .  route('checkout') . "' title='Thanh toán' class = 'checkout fl-right'>Thanh toán</a>
</div>";
        $data = [
            'status' => 'success',
            'num_order' => Cart::count(),
            'cart' => $cart
        ];
        echo json_encode($data);
    }
    function show(Request $request)
    {
         $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
        $url_canonical = $request->url();
        return view('client.cart.show',compact('meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
    }
    function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.show');
    }
    function deleteAll()
    {
        Cart::destroy();
        return redirect()->route('cart.show');
    }
    function updateAjax(Request $request)
    {
        $qty = $request->qty;
        $rowId = $request->rowId;
        Cart::update($rowId, $qty);
        $product = Cart::get($rowId);
        $subtotal = $product->subtotal;
        $total = Cart::total();
        $data = array(
            'sub_total' => number_format($subtotal, 0, ',', '.'),
            'total' => $total
        );
        echo json_encode($data);
    }
}
