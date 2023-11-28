<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_cat;
use App\Product;
use App\Account;
use App\Rating;
use App\Parameter_pro;
use App\Parapro_product;
use Illuminate\Support\Str;
use Mockery\Undefined;

class ProductController extends Controller
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
    public function index(Request $request, $slug, $id)
    {
        $sort = "";
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        $op = [];
        if (!empty($_GET['op1'])) {
            $op1 = $_GET['op1'];
            $op1 = explode(",", $op1);
            $op[] = $op1;
        }
        if (!empty($_GET['op2'])) {
            $op2 = $_GET['op2'];
            $op2 = explode(",", $op2);
            $op[] = $op2;
        }
        if (!empty($_GET['op3'])) {
            $op3 = $_GET['op3'];
            $op3 = explode(",", $op3);
            $op[] = $op3;
        }
        if (!empty($_GET['op4'])) {
            $op4 = $_GET['op4'];
            $op4 = explode(",", $op4);
            $op[] = $op4;
        }
        if (!empty($_GET['op5'])) {
            $op5 = $_GET['op5'];
            $op5 = explode(",", $op5);
            $op[] = $op5;
        }
        if (!empty($_GET['op6'])) {
            $op6 = $_GET['op6'];
            $op6 = explode(",", $op6);
            $op[] = $op6;
        }
        if (!empty($_GET['op7'])) {
            $op7 = $_GET['op7'];
            $op7 = explode(",", $op7);
            $op[] = $op7;
        }
        if (!empty($_GET['op8'])) {
            $op8 = $_GET['op8'];
            $op8 = explode(",", $op8);
            $op[] = $op8;
        }
        if (!empty($_GET['op9'])) {
            $op9 = $_GET['op9'];
            $op9 = explode(",", $op9);
            $op[] = $op9;
        }
        if (!empty($_GET['op10'])) {
            $op10 = $_GET['op10'];
            $op10 = explode(",", $op10);
            $op[] = $op10;
        }
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        $start_price = $min_price - 200000;
        $end_price = $max_price + 10000000;
        $price = [$start_price, $end_price];
        if (!empty($_GET['price'])) {
            $price_after = $_GET['price'];
            $price_after = explode(",", $price_after);
            $price[0] = $price_after[0];
            $price[1] = $price_after[1];
        }
        $productLastCat = Product_cat::where([
            ['status', 'active'],
            ['id', $id]
        ])->first();
        $slug = $productLastCat->slug;
        //seo
        $meta_desc = $productLastCat->meta_desc;
        $meta_keywords = $productLastCat->meta_keywords;
        $meta_title = $productLastCat->cat_title;
        $url_canonical = $request->url();
        //endseo
        $productCatTitle = $productLastCat->cat_title;
        $slugLastCat = $productLastCat->slug;
        $productChildrenId = find_childrenCat($id);
        $productChildren = Product::whereIn('id', $productChildrenId)->orderBy('price', 'ASC')->paginate(5);
        $groupRecord = Product_cat::find($id)->paras;
        //XU LY CHO PHAN LOC
        $groupParaId = [];
        if (count($op) > 0) {
            foreach ($op as $item) {
                $para = Parameter_pro::where([
                    ['para_title', $item],
                    ['status', 'active']
                ])->first();
                $groupParaId[] = $para->id;
            }
            $listProductIdForShow = [];
            $list_product = Parapro_product::whereIn('para_id', $groupParaId)->get();
            foreach ($list_product as $item) {
                $product_id = $item->product_id;
                if (in_array($product_id, $productChildrenId)) {
                    $listProductIdForShow[] = $product_id;
                }
            }
            $listProductIdForShow = array_unique($listProductIdForShow);
        }
        //khoi tao gia tri mac dinh cho $num_page
        $num_page = 0;
        //end khoi tao
        $num_per_page = 5;
        // //Tinh duoc diem xuat phat
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $num_per_page;
        $list_products = [];
        if (count($op) > 0 && $sort == 'price-asc'  && $price[0] == $start_price && $price[1] == $end_price) {
            $listProductForShowCount = Product::whereIn('id', $listProductIdForShow)->where(['status' => 'active'])->orderBy('price', 'ASC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $listProductIdForShow, "ASC", "");
        } elseif (count($op) > 0 && $sort == 'price-desc'  && $price[0] == $start_price && $price[1] == $end_price) {
            $listProductForShowCount = Product::whereIn('id', $listProductIdForShow)->where(['status' => 'active'])->orderBy('price', 'DESC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $listProductIdForShow, "DESC", "");
        } elseif (count($op) > 0 && $sort == 'price-asc'  && ($price[0] != $start_price or $price[1] != $end_price)) {
            $listProductForShowCount = Product::whereIn('id', $listProductIdForShow)->where(['status' => 'active'])->whereBetween('price', $price)->orderBy('price', 'ASC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $listProductIdForShow, "ASC", $price);
        } elseif (count($op) > 0 && $sort == 'price-desc'  && ($price[0] != $start_price or $price[1] != $end_price)) {
            $listProductForShowCount = Product::whereIn('id', $listProductIdForShow)->where(['status' => 'active'])->whereBetween('price', $price)->orderBy('price', 'DESC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $listProductIdForShow, "ASC", $price);
        } elseif (count($op) == 0 && $sort == 'price-desc'  && $price[0] == $start_price && $price[1] == $end_price) {
            $listProductForShowCount = Product::whereIn('id', $productChildrenId)->where(['status' => 'active'])->orderBy('price', 'DESC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $productChildrenId, "DESC", "");
        } elseif (count($op) == 0 && $sort == 'price-asc'  && $price[0] == $start_price && $price[1] == $end_price) {
            $listProductForShowCount = Product::whereIn('id', $productChildrenId)->where(['status' => 'active'])->orderBy('price', 'ASC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $productChildrenId, "ASC", "");
        } elseif (count($op) == 0 && $sort == 'price-desc'  && ($price[0] != $start_price or $price[1] != $end_price)) {
            $listProductForShowCount = Product::whereIn('id', $productChildrenId)->where(['status' => 'active'])->whereBetween('price', $price)->orderBy('price', 'DESC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $productChildrenId, "DESC", $price);
        } elseif (count($op) == 0 && $sort == 'price-asc'  && ($price[0] != $start_price or $price[1] != $end_price)) {
            $listProductForShowCount = Product::whereIn('id', $productChildrenId)->where(['status' => 'active'])->whereBetween('price', $price)->orderBy('price', 'ASC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $productChildrenId, "ASC", $price);
        }
        //END XU LY CHO PHAN LOC
        //LAST CAT
        if ($groupRecord->count() > 0) {
            //Tìm tất cả danh mục cha của thông số thuộc về danh mục sản phẩm hiện tại
            $groupIdParent3 =   find_groupIdParent($groupRecord);
            return view('client.product-cat.index', compact('meta_desc', 'meta_keywords', 'url_canonical', 'meta_title', 'productCatTitle', 'productChildren', 'groupIdParent3', 'id', 'slugLastCat', 'op', 'sort', 'price', 'list_products', 'slug', 'num_page', 'page'));
        } else {
            $catRecord = Product_cat::find($id);
            $cat1 = Product_cat::where([
                ['status', 'active'],
                ['parent_id', $id]
            ])->get();
            foreach ($cat1 as $item) {
                $cat2 = Product_cat::where([
                    ['status', 'active'],
                    ['parent_id', $item->id]
                ])->get();
            }
            if ($cat2->count() == 0) {
                $groupCatId = [];
                foreach ($cat1 as $itemCat1) {
                    $groupCatId[] = $itemCat1->id;
                    $groupRecord = $itemCat1->paras;
                    $groupIdParent2 =   find_groupIdParent($groupRecord);
                }
                $groupIdParent2 = !empty($groupIdParent2) ? $groupIdParent2 : "noChild";
                return view('client.product-cat.index', compact('meta_desc', 'meta_keywords', 'url_canonical', 'meta_title', 'productCatTitle', 'productChildren', 'groupIdParent2', 'groupCatId', 'id', 'slugLastCat', 'op', 'sort', 'price', 'list_products', 'slug', 'num_page', 'page'));
            } else {
                $groupCatId1 = [];
                $result = [];
                foreach ($cat1 as $itemCat) {
                    $cat2 =  Product_cat::where([
                        ['status', 'active'],
                        ['parent_id', $itemCat->id]
                    ])->get();
                    foreach ($cat2 as $itemCat2) {
                        $groupCatId1[] = $itemCat2->id;
                        $groupRecord = $itemCat2->paras;
                        $groupIdParent1 =   find_groupIdParent($groupRecord);
                    }
                    $result = array_merge($groupIdParent1, $result);
                }
                $result = array_unique($result);
                return view('client.product-cat.index', compact('meta_desc', 'meta_keywords', 'url_canonical', 'meta_title', 'productCatTitle', 'productChildren', 'result', 'groupCatId1', 'id', 'slugLastCat', 'op', 'sort', 'price', 'list_products', 'slug', 'num_page', 'page'));
            }
        }
    }
    public function detail(Request $request, $slug, $id)
    {
        $productDetail = Product::where([
            ['status', 'active'],
            ['id', $id]
        ])->first();
        //seo
        $meta_desc = $productDetail->meta_desc;
        $meta_keywords = $productDetail->meta_keywords;
        $meta_title = $productDetail->product_title;
        $url_canonical = $request->url();
        $image_og = url($productDetail->thumbnail);
        //endseo
        $rating = Rating::where('product_id', $id)->avg('rating');
        $url_canonical = $request->url();
        $near_round_rating = round($rating, 1);
        $rating = round($rating);
        $allRating = Rating::where('product_id', $id)->get();
        $ParentCat = $productDetail->cats->first();
        $productCatTitle = $ParentCat->cat_title;
        $id = $ParentCat->id;
        $slugLastCat = $ParentCat->slug;
        $subImages = $productDetail->files;
        //same-category
        $cat = $productDetail->cats->first();
        $sameCategory = $cat->products;
        return view('client.product.index', compact('meta_desc', 'image_og', 'meta_keywords', 'url_canonical', 'meta_title', 'productDetail', 'sameCategory', 'near_round_rating', 'allRating', 'rating', 'subImages', 'productCatTitle', 'slugLastCat', 'id'));
    }
    public function pagging_products()
    {
        $cat_id = $_POST['cat_id'];
        $productCat = Product_cat::where([
            ['status', 'active'],
            ['id', $cat_id]
        ])->first();
        $productCatTitle = $productCat->cat_title;
        $groupCatChildId = find_childrenCat($cat_id);
        $num_products = Product::whereIn('id', $groupCatChildId)->get()->count();
        // so luong ban ghi tren trang
        $num_per_page = 5;
        $num_page = ceil($num_products / $num_per_page);
        // //Tinh duoc diem xuat phat
        $page = $_POST['page_id'];
        $start = ($page - 1) * $num_per_page;
        // $list_products = Product::whereIn('id', $groupCatChildId)->paginate($num_per_page);
        $list_products = get_products($start, $num_per_page, $groupCatChildId);
        $data = "<div id ='head-list'>
        <div class = 'cat-name'>" . $productCatTitle . "</div>
        </div>
        <ul class ='wp-product row'>";
        foreach ($list_products as $product) {
            $data .= "<li class = 'col-6 col-sm-4 col-lg-4 prHA'>
            <div class ='card-prd'>
            <a href = '" . route('productDetail', [$product->slug, $product->id]) . "' class='pro-thumb d-block'>
            <img src ='" . url($product->thumbnail) . "' class ='d-block'>
            </a>
            <div class ='cprd-body'>
            <a href = '" . route('productDetail', [$product->slug, $product->id]) . "' class='pro-name d-block'>" . Str::of($product->product_title)->limit(48) . "</a>
            <span class ='pro-price text-center'>" . number_format($product->price, 0, ',', '.') . "đ</span>
            <div class ='btn_of_prd'>
            <a href='' data_id ='" . $product->id . "' data_uri='" . route('cart.add') . "' uri_cart_show = '" . route('cart.show') . "' class='add-cart mt-2 mb-3 btn btn-outline-dark'>Thêm giỏ hàng</a>
            </div>
            </div>
            </div>
            </li>";
        }
        $data .= "</ul>
        <div id ='pagination_product' class ='text-center' style='margin-bottom: 25px;' data_uri='" . route('pagging_products') . "' cat_id ='" . $cat_id . "'>";
        $str_pagging = pagging_products($num_page, $page, route('productCat', [$productCat->slug, $productCat->id]));
        $data .= $str_pagging;
        $data .= "</div>";
        echo json_encode($data);
    }
    function show_prd(Request $request)
    {
        $id = $request->id;
        $start_price = $request->start_price;
        $end_price = $request->end_price;
        $save_min = $request->save_min;
        $save_max = $request->save_max;
        $price_range = $request->price_range;
        $page = $request->page;
        $sort = $request->sort;
        $groupOp = $request->groupOp;
        $productChildren = find_childrenCat($id);
        $groupParaId = [];
        if ($groupOp != null) {
            foreach ($groupOp as $item) {
                $para = Parameter_pro::where([
                    ['para_title', $item],
                    ['status', 'active']
                ])->first();
                $groupParaId[] = $para->id;
            }
            $listProductIdForShow = [];
            $list_product = Parapro_product::whereIn('para_id', $groupParaId)->get();
            foreach ($list_product as $item) {
                $product_id = $item->product_id;
                if (in_array($product_id, $productChildren)) {
                    $listProductIdForShow[] = $product_id;
                }
            }
            $listProductIdForShow = array_unique($listProductIdForShow);
        }
        $productCat = Product_cat::where([
            ['status', 'active'],
            ['id', $id]
        ])->first();
        $productCatTitle = $productCat->cat_title;
        $num_per_page = 5;
        // //Tinh duoc diem xuat phat
        $page = $page;
        $start = ($page - 1) * $num_per_page;
        if (!empty($groupOp) && $sort == 'price-asc'  && $save_min == $start_price && $save_max == $end_price) {
            $listProductForShowCount = Product::whereIn('id', $listProductIdForShow)->where(['status' => 'active'])->orderBy('price', 'ASC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $listProductIdForShow, "ASC", "");
        } elseif (!empty($groupOp) && $sort == 'price-desc'  && $save_min == $start_price && $save_max == $end_price) {
            $listProductForShowCount = Product::whereIn('id', $listProductIdForShow)->where(['status' => 'active'])->orderBy('price', 'DESC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $listProductIdForShow, "DESC", "");
        } elseif (!empty($groupOp) && $sort == 'price-asc'  && ($save_min != $start_price or $save_max != $end_price)) {
            $listProductForShowCount = Product::whereIn('id', $listProductIdForShow)->where(['status' => 'active'])->whereBetween('price', $price_range)->orderBy('price', 'ASC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $listProductIdForShow, "ASC", $price_range);
        } elseif (!empty($groupOp) && $sort == 'price-desc'  && ($save_min != $start_price or $save_max != $end_price)) {
            $listProductForShowCount = Product::whereIn('id', $listProductIdForShow)->where(['status' => 'active'])->whereBetween('price', $price_range)->orderBy('price', 'DESC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $listProductIdForShow, "ASC", $price_range);
        } elseif ($groupOp == null && $sort == 'price-desc'  && $save_min == $start_price && $save_max == $end_price) {
            $listProductForShowCount = Product::whereIn('id', $productChildren)->where(['status' => 'active'])->orderBy('price', 'DESC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $productChildren, "DESC", "");
        } elseif ($groupOp == null && $sort == 'price-asc'  && $save_min == $start_price && $save_max == $end_price) {
            $listProductForShowCount = Product::whereIn('id', $productChildren)->where(['status' => 'active'])->orderBy('price', 'ASC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $productChildren, "ASC", "");
        } elseif ($groupOp == null && $sort == 'price-desc'  && ($save_min != $start_price or $save_max != $end_price)) {
            $listProductForShowCount = Product::whereIn('id', $productChildren)->where(['status' => 'active'])->whereBetween('price', $price_range)->orderBy('price', 'DESC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $productChildren, "DESC", $price_range);
        } elseif ($groupOp == null && $sort == 'price-asc'  && ($save_min != $start_price or $save_max != $end_price)) {
            $listProductForShowCount = Product::whereIn('id', $productChildren)->where(['status' => 'active'])->whereBetween('price', $price_range)->orderBy('price', 'ASC')->get()->count();
            $num_page = ceil($listProductForShowCount / $num_per_page);
            $list_products = getListProductForShow($start, $num_per_page, $productChildren, "ASC", $price_range);
        }
        $data = "<div id ='head-list'>
        <div class = 'cat-name'>" . $productCatTitle . "</div>
        </div>";
        if ($listProductForShowCount > 0) {
            $data .= "<ul class ='wp-product row'>";
            foreach ($list_products as $product) {
                $data .= "<li class = 'col-6 col-sm-4 col-lg-4 prHA'>
            <div class ='card-prd'>
            <a href = '" . route('productDetail', [$product->slug, $product->id]) . "' class='pro-thumb d-block'>
            <img src ='" . url($product->thumbnail) . "' class ='d-block'>
            </a>
            <div class ='cprd-body'>
            <a href = '" . route('productDetail', [$product->slug, $product->id]) . "' class='pro-name d-block'>" . Str::of($product->product_title)->limit(48) . "</a>
            <span class ='pro-price text-center'>" . number_format($product->price, 0, ',', '.') . "đ</span>
            <div class ='btn_of_prd'>
            <a href='' data_id ='" . $product->id . "' data_uri='" . route('cart.add') . "' uri_cart_show = '" . route('cart.show') . "' class='add-cart mt-2 mb-3 btn btn-outline-dark'>Thêm giỏ hàng</a>
            </div>
            </div>
            </div>
            </li>";
            }
            $data .= "</ul>
        <div id ='paginationForFilterProduct' class ='text-center' data_uri='" . route('pagging_products') . "' cat_id ='" . $id . "'>";
            $str_pagging = pagging_products($num_page, $page, route('productCat', [$productCat->slug, $productCat->id]));
            $data .= $str_pagging;
            $data .= "</div>";
        } else {
            $data .= "<strong class='no-product-for-filter' style='font-size: 26px;margin-top: 30px;display: block;text-align:center'>
           Không có sản phẩm nào phù hợp với lựa chọn lọc của bạn</strong>";
        }
        echo json_encode($data);
    }
    public function rating(Request $request)
    {
        $data = $request->all();
        $productDetail = Product::find($data['product_id']);
        $rating = Rating::where('product_id', $data['product_id'])->avg('rating');
        $rating = round($rating);
        $data_return = "<input type='hidden' name='num_star_chosen' id='num_star_chosen' value='" . $data['index']  . "'>";
        for ($count = 1; $count <= 5; $count++) {
            if ($count <= $data['index']) {
                $color = 'color:#ffcc00';
            } else {
                $color = 'color:#ccc';
            }
            $data_return .= "<li class='rating' id='" . $productDetail->id . "-" . $count . "'data_index='" . $count . "' data_product_id='" . $productDetail->id . "' data_rating = '" . $rating . "' style='cursor: pointer; font-size:30px; margin-right:5px;" . $color . "' title='star_rating'>&#9733;</li>";
        }
        echo json_encode($data_return); 
    }
    public function add_rate(Request $request)
    {
        $data = $request->all();
        $error = [];
        if (empty($data['num_star_chosen'])) {
            $error['num_star_chosen'] = 'Bạn chưa đánh giá theo sao';
        }
        if (empty($data['name'])) {
            $error['name'] = 'Bạn cần nhập họ và tên';
        }
        if (empty($data['content_rate'])) {
            $error['content_rate'] = 'Bạn cần nhập nội dung đánh giá';
        }
        if (!empty($error)) {
            $error['status'] = "false";
            echo json_encode($error);
        } else {
            Rating::create(
                [
                    'product_id' => $data['product_id'],
                    'rating' => $data['num_star_chosen'],
                    'name' =>  $data['name'],
                    'content' => htmlentities($data['content_rate'])
                ]
            );
            $allRates = Rating::where('product_id', $data['product_id'])->orderBy('created_at', 'DESC')->get();
            $avg_rating = Rating::where('product_id', $data['product_id'])->avg('rating');
            $near_round_rating = round($avg_rating, 1);
            $avg_rating = round($avg_rating);
            $dataReturn1 = "";
            for ($count = 1; $count <= 5; $count++) {
                if ($count <= $avg_rating) {
                    $color = 'color:#F59E0B';
                } else {
                    $color = 'color:#707070';
                }
                $dataReturn1 .= "<li class='real_rating' style='cursor: pointer; font-size:30px; margin-right:5px;" . $color . "' title='real_rating'>&#9733;</li>";
            }
            $dataReturn = "";
            foreach ($allRates as $rate) {
                $dataReturn .= "<div class='ha-product-rating d-flex'>
            <img src='" . asset('client/images/noavatar.png') . "' class='ha-product-rating-ava'>
            <div class= 'ha-product-rating-main'>
            <strong class= 'ha-product-rating-name' style='margin-bottom: 3px; display:inline-block'>" . $rate->name .  "</strong>
            <div class='time'>
            <small class='date' style='color: black; margin-bottom: 5px; display: inline-block'>
            <i class= 'far fa-clock' style='padding-right: 3px; display:inline-block'></i>" . $rate->created_at . "
            </small>
            </div>
            <div class='d-flex'>
            <strong style='font-size: 16px; font-family: Sans-serif; margin-right: 3px'>Đánh giá: 
            </strong>
            <ul class='repeat-purchase-con d-flex'>";
                for ($count = 1; $count <= 5; $count++) {
                    if ($count <= $rate->rating) {
                        $color = 'color:#ffcc00';
                    } else {
                        $color = 'color:#ccc';
                    }
                    $dataReturn .= "<li class='ratingOfCust' style='cursor: pointer; font-size:18px; margin-right:5px;" . $color . "' title='ratingOfCust'>&#9733;</li>";
                }
                $dataReturn .=  "</ul>
                </div>
                <div class ='d-flex'>
                <strong style='font-size: 16px; font-family: Sans-serif; margin-right: 3px'>Nhận xét: 
                </strong>
                <div class='ha-product-rating-content'>" . $rate->content . "</div>
                </div>
                </div>
                </div>";
            }
            $bigData  = [
                'dataReturn1' => $dataReturn1,
                'dataReturn' => $dataReturn,
                'status' => 'true',
                'near_round_rating' => $near_round_rating
            ];
            echo json_encode($bigData);
        }
    }
}
