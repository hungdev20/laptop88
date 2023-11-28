<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
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
    $page_info = Page::find($id);
    return view('client.pages.index', compact('page_info', 'id', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
  }
  public function contact(Request $request)
  {
    $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
    $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
    $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    return view('client.pages.contact', compact('meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
  }
}
