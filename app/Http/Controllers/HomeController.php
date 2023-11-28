<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Media;
use App\Menu;
use App\Post;
use App\Product_cat;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['page_current' => 'home']);
            return $next($request);
        });
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function index(Request $request)
    {
        //seo
        $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
        $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
        $meta_title = "Thiết bị điện tử chất lượng cao";
        $url_canonical = $request->url();
        //endseo
        //products
        $catChildrenIdOflaptop =  find_childrenCat(50);
        $laptop = Product::whereIn('id', $catChildrenIdOflaptop)->get();
        return view('client.home.index', compact('meta_desc', 'meta_keywords', 'url_canonical', 'meta_title', 'laptop'));
    }
    public function searchAjax()
    {
        $keyword = $_POST['q'];
        $list_products = Product::where([
            ['product_title', 'LIKE', "%{$keyword}%"],
            ['status', 'active']
        ])->get();
        $data = "";
        if ($list_products->count() > 0) {
            foreach ($list_products as $item) {
                $data .= "<li class = 'd-flex rs-item'>
                <a href='" . route('productDetail', [$item->slug, $item->id]) . "'>
                <img src = '" . url($item->thumbnail) . "' alt='" . $item->product_title . "'>
                </a>
                <div class = 'rs-text'>
                <a href= '" . route('productDetail', [$item->slug, $item->id]) . "' class ='rs-name'>" . $item->product_title . "</a>
                <span class = 'rs-price d-block'>" . number_format($item->price, 0, ',', '.') . "đ</span>
                </div>
                </li>";
            }
        } else {
            $data .= "<span class = 'no-result'>Không có sản phẩm phù hợp với tìm kiếm của bạn</span>";
        }
        echo json_encode($data);
    }
    function search(Request $request)
    {
        $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
        $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
        $meta_title = "Thiết bị điện tử chất lượng cao";
        $url_canonical = $request->url();
        if (session()->has('page_current')) {
            session()->forget('page_current');
        }
        $keyword = $request->input('s');
        $list_products = Product::where([
            ['product_title', 'LIKE', "%{$keyword}%"],
            ['status', 'active']
        ])->paginate(5);
        $append = [
            's' => $keyword
        ];
        return view('client.search.index', compact('list_products', 'append', 'keyword', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }
}
