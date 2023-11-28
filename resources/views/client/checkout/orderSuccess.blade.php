@extends('layouts.client')
@section('title', 'Đặt hàng thành công')
@section('content')
    <div id="main-content-wp" class="wp-homepage">
        <div class="container">
            @if (session()->has('orderSuccess'))
                <div id="main-content-wp" class="orderSuccess row" style="max-width:1240px; margin: 0px auto">
                    <div class="col-12 thank-you text-center" style="margin-bottom: 30px">
                        <div class="stick">
                            <i class="far fa-check-circle"></i>
                        </div>
                        <div class="thank-content">
                            <h2>Cảm ơn quý khách đã đặt hàng</h2>
                            <p>Bạn sẽ nhận được một email xác nhận đơn đặt hàng với thông tin chi tiết về đơn hàng của bạn
                            </p>
                            <p>Mã đơn hàng: <strong>{{ $extra_info['code'] }}</strong></p>
                            <p>Mọi thắc mắc quy khách vui lòng liên hệ SĐT: <strong>0399.809.781</strong> </p>
                        </div>
                        <a href="{{ url('/') }}" class="continue-buy btn-success d-inline-block">Tiếp tục mua hàng</a>
                    </div>
                    <div class="col-12 order_info item">
                        <h1 class="">Sản phẩm đã đặt: </h1>
                    <div class=" all-product">
                            @foreach (Cart::content() as $item)
                                <div class=" product_info item form-row">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-3 product-img">
                                                <img src="{{ url($item->options->thumbnail) }}" alt=""
                                                    class="d-block">
                                            </div>
                                            <div class="col-9 extra-info">
                                                <div class="product-title">
                                                    {{ $item->name }}
                                                </div>
                                                <div class="code">
                                                    Mã sản phẩm: <strong>{{ $item->options->code }}</strong>
                                                </div>
                                                <div class="price">
                                                    Giá: <span class="text-info">
                                                        {{ number_format($item->price, 0, ',', '.') }}đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <span>Số lượng: <strong>{{ $item->qty }}</strong></span>
                                        <div class="sub-total">Thành tiền: <span style="color: red">
                                                {{ number_format($item->total, 0, ',', '.') }}đ</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="total-price clearfix">
                                <span class="fl-right">Tổng: <strong>{{ Cart::total() }}đ</strong></span>
                            </div>
                    </div>
                    <div class="address-and-payment row">
                        <div class="address col-6">
                            <h1>Địa chỉ giao hàng</h1>
                            <p>{{ $extra_info['address_detail'] }}</p>
                            <p>{{ $extra_info['ward'] }}</p>
                            <p>{{ $extra_info['district'] }}</p>
                            <p>{{ $extra_info['province'] }}</p>
                        </div>
                        <div class="payment-method col-6">
                            <h1>Hình thức thanh toán</h1>
                            <span>
                                @if ($extra_info['payment_method'] == 'payment-home')
                                    Thanh toán tại nhà
                                @else
                                    Thanh toán online
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="customer-info-and-payment-status row">
                        <div class="customer-info col-6">
                            <h1>Thông tin khách hàng</h1>
                            <p>Tên: <strong>{{ $extra_info['fullname'] }}</strong></p>
                            <p>Số điện thoại: <strong>{{ $extra_info['phone_number'] }}</strong></p>
                            <p>Email: <strong>{{ $extra_info['email'] }} </strong></p>
                            <p>Note: <strong>{{ $extra_info['note'] }}</strong></p>
                        </div>
                        <div class="payment-status col-6">
                            <h1>Trạng thái thanh toán</h1>
                            <span>Chưa thanh toán</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="no-item text-center">
                    <img src="{{ asset('client/images/no-order.png') }}" style="width:685px; height:auto" alt=""
                        class="d-inline-block">
                    <div class="no-item-title">Không có đơn hàng nào</div>
                    <a href="{{ url('/') }}" class="buy">Mua sắm ngay</a>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
