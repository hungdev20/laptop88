<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post_cat;
use App\Post;
class PostController extends Controller
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
       $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    $post_vertical = Post::skip(0)->take(4)->get();
    $num_posts = Post::all()->count();
    $post_horizon = Post::offset(4)->limit($num_posts)->get();
    $num_rows = $post_horizon->count();
    // so luong ban ghi tren trang
    $num_per_page = 4;
    $num_page = ceil($num_rows / $num_per_page);
    //Tinh duoc diem xuat phat
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page + 4;
    $list_posts = get_posts($start, $num_per_page);
    $post_newest1 = Post::orderBy('created_at', 'DESC')->limit(1)->first();
    $post_newest2 = Post::orderBy('created_at', 'DESC')->skip(1)->limit(2)->get();
    return view('client.posts.index', compact('post_horizon','meta_desc', 'meta_keywords', 'url_canonical','meta_title' ,'post_newest2', 'post_newest1', 'post_vertical', 'num_page', 'page', 'list_posts', 'slug', 'id'));
  }
  public function detail(Request $request,$slug, $id)
  {
       $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    // cai de lay danh muc cha cua bai viet cho breadcrumb
    $post_vertical = Post::skip(0)->take(4)->get();
    $post_info = Post::find($id);
    return view('client.posts.detail', compact('post_info', 'post_vertical', 'meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
  }
  public function pagging_posts(Request $request)
  {
    //lay thong tin danh muc
    
    $postCatInfo = Post_cat::find($request->id);
    $num_posts = Post::all()->count();
    $post_horizon = Post::offset(4)->limit($num_posts)->get();
    $num_rows = $post_horizon->count();
    // so luong ban ghi tren trang
    $num_per_page = 4;
    $num_page = ceil($num_rows / $num_per_page);
    //Tinh duoc diem xuat phat
    $page = $_POST['page_id'];
    $start = ($page - 1) * $num_per_page + 4;
    $list_posts = get_posts($start, $num_per_page);
    $data = "";
    foreach ($list_posts as $item) {
      $data .= "<div class='item row mb-4'>
      <div class = 'post_thumb col-md-4'>
      <a href = '" . route('post_detail', [$item->slug, $item->id]) . "' class = 'd-block'>
      <img src='" . url('uploads/posts/' . $item->thumbnail) . "' alt = '' class ='d-block'>
      </a>
      </div>
      <div class = 'post-content col-md-8'>
      <a href = '" . route('post_detail', [$item->slug, $item->id]) . "' class = 'post-title'>" . $item->post_title . "</a>
      <div class='other-info'>
      <small class ='date text-muted'><i class = 'fa fa-clock-o'></i>" . $item->created_at . "</small>
      <div class = 'author'>
      By <span>John Cenas</span>
      </div>
      <div class ='post-excerpt'>Đúng vậy, với mong muốn định nghĩa rõ ràng về khái niệm “mini and elegant” computer dựa theo những đặc điểm...</div>
      </div>
      </div>
      </div>";
    }
    $data .= "<div id='pagination' class='text-center' data_id =" . $request->id  . ">";
    $str_pagging = get_pagging($num_page, $page, route('posts', [$postCatInfo->slug, $postCatInfo->id]));
    $data .= $str_pagging;
    $data .= "</div>";
    echo json_encode($data);
  }
}
