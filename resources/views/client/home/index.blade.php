@extends('layouts.client')
@section('title', 'Thiết bị điện tử chất lượng cao')
@section('content')
    <div id="main-content-wp" class="wp-homepage">
        <div id="wp-inner" class="container">
            <div id="main-content">
                <div class="section" id="wp-main">
                    <div class="ha-col-1" id="main-menu">
                    </div>
                    <div class="ha-col-3 row no-gutters" id="main-advert">
                       
                    </div>
                </div>
                @if (!empty($laptop))
                    <div class="section laptop box-pro-container wow bounceInUp">
                        <div class="box-title-container">
                            <h2 class="box-title">
                                Máy tính xách tay - Laptop
                            </h2>
                        </div>
                        <ul class="product-container row mt-3">
                            @foreach ($laptop as $itemLap)
                                <li class="col-md-3">
                                    <div class="card-prd">
                                        <a href="{{ route('productDetail', [$itemLap->slug, $itemLap->id]) }}"
                                            class="pro-thumb d-block">
                                            <img src="{{ url($itemLap->thumbnail) }}" alt="" class="d-block">
                                        </a>
                                        <div class="cprd-body">
                                            <a href="{{ route('productDetail', [$itemLap->slug, $itemLap->id]) }}"
                                                class="pro-name d-block">
                                                {{ Str::of($itemLap->product_title)->limit(50) }} </a>
                                            <span
                                                class="pro-price text-center">{{ number_format($itemLap->price, 0, ',', '.') }}đ</span>
                                            <div class="clearfix">
                                                <a href="" data_id="{{ $itemLap->id }}"
                                                    data_uri="{{ route('cart.add') }}"
                                                    uri_cart_show="{{ route('cart.show') }}"
                                                    class="add-cart fl-left mt-2 mb-3 btn btn-outline-dark">Thêm giỏ
                                                    hàng</a>
                                                <a href="{{ route('cart.addNormal', $itemLap->id) }}"
                                                    class="buy-now fl-right mt-2 mb-3 btn btn-outline-danger">Mua
                                                    ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-center mt-3">
                            <a href="{{ route('productCat', ['laptop', 50]) }}" class="view-all d-inline-block">Xem tất
                                cả sản phẩm</a>
                        </div>
                    </div>
                @endif
                @if (!empty($blogs))
                    <div class="section news wow bounceInUp">
                        <h1 class="mb-3 news-title">Tin tức công nghệ</h1>
                        <ul class="owl-carousel owl-loaded">
                            @foreach ($blogs as $blog)
                                <li>
                                    <div class="card-post">
                                        <a href="{{ route('post_detail', [$blog->slug, $blog->id]) }}"
                                            class="news-thumb d-block">
                                            <img src="{{ url('uploads/posts/' . $blog->thumbnail) }}" alt=""
                                                class="d-block">
                                        </a>
                                        <div class="news-body">
                                            <a href="{{ route('post_detail', [$blog->slug, $blog->id]) }}"
                                                class="news-name d-block">{{ Str::of($blog->post_title)->limit(65) }}</a>
                                            <span class="d-inline-block date">{{ $blog->created_at }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
