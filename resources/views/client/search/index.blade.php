@php

use App\Parameter_pro;

use App\Parameterpro_cat;

@endphp

@extends('layouts.client')

@section('title', 'Kết quả tìm kiếm')

@section('content')

    <div id="main-content-wp" class="wp-homepage">

        <div id="wp-inner" class="container">

            <div id="main-content">

                @if ($list_products->count() == 0)

                    <div id="no-productResult" style="background: #fff">

                        <div style="height: 300px; width:340px" class="d-inline-block">

                            <img class="lazyload css-jdz5ak" alt=""

                                src="{{ asset('images/glass-cute-not-found-symbol-unsuccessful.jpg') }}">

                        </div>

                        <div id="noResultTitle">

                            Không tìm thấy sản phẩm nào

                        </div>

                    </div>

                @else

                    <div id="wp-list" class="row">

                        <div id="wp-search-list" class="col-md-12">

                            <div id="head-list">

                                <div class="title">Kết quả tìm kiếm cho từ khóa '<span

                                        class="text-danger">{{ $keyword }}</span>'</div>

                            </div>

                            <ul class="wp-product d-flex flex-wrap">

                                @foreach ($list_products as $product)

                                    <li class="search-item">

                                        <div class="card-prd">

                                            <a href="{{ route('productDetail', [$product->slug, $product->id]) }}"

                                                class="pro-thumb d-block">

                                                <img src="{{ url($product->thumbnail) }}" alt="" class="d-block">

                                            </a>

                                            <div class="cprd-body">

                                                <a href="{{ route('productDetail', [$product->slug, $product->id]) }}"

                                                    class="pro-name d-block">

                                                    {{ Str::of($product->product_title)->limit(50) }}

                                                </a>

                                                <span

                                                    class="pro-price text-center">{{ number_format($product->price, 0, ',', '.') }}đ</span>



                                                <div class="text-center">

                                                    <a href="" data_id="{{ $product->id }}"

                                                        data_uri="{{ route('cart.add') }}"

                                                        uri_cart_show="{{ route('cart.show') }}"

                                                        class="add-cart mt-2 mb-3 btn btn-outline-dark">Thêm giỏ

                                                        hàng</a>

                                                </div>

                                            </div>

                                        </div>

                                    </li>

                                @endforeach

                            </ul>



                            <div id="productForSearch" class="text-center">

                                {{ $list_products->appends($append)->links() }} 

                            </div>

                        </div>



                    </div>



                @endif

            </div>

        </div>

    </div>

@endsection

