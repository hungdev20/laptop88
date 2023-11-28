@extends('layouts.client')

@section('title', 'Thanh toán')

@section('content')

    <div id="main-content-wp" class="wp-homepage">

        <div class="container">

            @include('layouts.breadcrumb')

            <div id="main-content-wp" class="checkout-page">

                <form method="POST" action="{{ route('checkInfo') }}" name="form-checkout">

                    @csrf

                    <div class="wp-inner clearfix" style = "padding-bottom: 30px">

                        <div class="section" id="customer-info-wp">

                            <div class="section-head">

                                <h1 class="section-title">Thông tin khách hàng</h1>

                            </div>

                            <div class="section-detail">


                                <div class="form-row clearfix">

                                    <div class="form-col fl-left">

                                        <label for="fullname">Họ tên</label>

                                        <input type="text" name="fullname" id="fullname">

                                        @error('fullname')

                                            <small class="form-text text-danger">

                                                {{ $message }}

                                            </small>

                                        @enderror

                                    </div>

                                    <div class="form-col fl-right">

                                        <label for="phone">Số điện thoại</label>

                                        <input type="tel" name="phone" id="phone">

                                        @error('phone')

                                            <small class="form-text text-danger">

                                                {{ $message }}

                                            </small>

                                        @enderror

                                    </div>


                                </div>

                                <div class="form-group">

                                    <label for="email">Email</label>

                                    <input type="email" name="email" class="form-control" id="email">

                                    @error('email')

                                        <small class="form-text text-danger">

                                            {{ $message }}

                                        </small>

                                    @enderror

                                   

                                </div>

                                <div class="clearfix"></div>

                                <div class="form-row">

                                    <label for="" id="address">Địa chỉ giao hàng:</label>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-12 col-lg-3">

                                        <label for="provinces">Tỉnh</label>

                                        <select name="provinces" id="provinces" data-uri="{{ route('chooseProvince') }}"

                                            class="custom-select">

                                            <option value="" data_id="0">Chọn tỉnh</option>

                                            @foreach ($provinces as $province)

                                                <option value="{{ $province->name }}" data_id="{{ $province->id }}">

                                                    {{ $province->name }}</option>

                                            @endforeach


                                        </select>

                                        @error('provinces')

                                            <small class="form-text text-danger">

                                                {{ $message }}

                                            </small>

                                        @enderror

                                    </div>

                                    <div class="form-group col-12 col-lg-4">

                                        <label for="district">Quận/Huyện</label>

                                        <select name="district" id="district" class="custom-select"

                                            data-uri="{{ route('chooseDistrict') }}">

                                            <option value="" data_id="0">Chưa chọn tỉnh</option>

                                        </select>

                                        @error('district')

                                            <small class="form-text text-danger">

                                                {{ $message }}

                                            </small>

                                        @enderror

                                    </div>

                                    <div class="form-group col-12 col-lg-5">

                                        <label for="wards">Phường</label>

                                        <select name="wards" id="wards" class="custom-select">

                                            <option value="" data_id="0">Chưa chọn Quận/Huyện</option>


                                        </select>

                                        @error('wards')

                                            <small class="form-text text-danger">

                                                {{ $message }}

                                            </small>

                                        @enderror

                                    </div>

                                    {{-- <div class="form-col fl-right">

                                        <label for="phone">Số điện thoại</label>

                                        <input type="tel" name="phone" id="phone">

                                    </div> --}}

                                </div>

                                {{-- <div class="form-row clearfix">

                                    <div class="form-col fl-left">

                                        <label for="address">Địa chỉ</label>

                                        <input type="text" name="address" id="address">

                                    </div>

                                    <div class="form-col fl-right">

                                        <label for="phone">Số điện thoại</label>

                                        <input type="tel" name="phone" id="phone">

                                    </div>

                                </div> --}}

                                <div class="form-row">

                                    <div class="form-group col-12">

                                        <label for="detail-address">Địa chỉ cụ thể</label>

                                        <textarea name="detail-address" id="detail-address" cols="70" rows="4"

                                            class="form-control"></textarea>

                                        @error('detail-address')

                                            <small class="form-text text-danger">

                                                {{ $message }}

                                            </small>

                                        @enderror

                                    </div>


                                </div>

                               

                                <div class="form-row">

                                    <div class="form-group col-12 col-lg-7">

                                        <label for="notes">Ghi chú</label>

                                        <textarea name="note" id="" cols="42" rows="4"></textarea>

                                    </div>


                                </div>


                            </div>

                        </div>

                        <div class="section" id="order-review-wp">

                            <div class="section-head">

                                <h1 class="section-title">Thông tin đơn hàng</h1>

                            </div>

                            <div class="section-detail">

                                <table class="shop-table">

                                    <thead>

                                        <tr>

                                            <td>Sản phẩm</td>

                                            <td>Tổng</td>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach (Cart::content() as $item)

                                            <tr class="cart-item">

                                                <td class="product-name">{{ $item->name }}<strong

                                                        class="product-quantity">x

                                                        {{ $item->qty }}</strong></td>

                                                <td class="product-total">

                                                    {{ number_format($item->total, 0, ',', '.') }}đ</td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                    <tfoot>

                                        <tr class="order-total">

                                            <td>Tổng đơn hàng:</td>

                                            <td><strong class="total-price">{{ Cart::total() }}đ</strong></td>

                                        </tr>

                                    </tfoot>

                                </table>

                                <div id="payment-checkout-wp">

                                    <ul id="payment_methods">

                                        <li>

                                            <input type="radio" id="payment-home" checked name="payment-method"

                                                value="payment-home">

                                            <label for="payment-home">Thanh toán tại nhà</label>


                                        </li>

                                        <li>

                                            <input type="radio" id="direct-payment" name="payment-method"

                                                value="direct-payment">

                                            <label for="direct-payment">Chuyển khoản</label>

                                            <div class="txt_555 d-none" id="pay_1" style="white-space: pre-line;">
                                                Quý khách chuyển khoản trước theo thông tin dưới đây :
                                                
                                                Công ty Cổ Phần Thương Mại Máy Tính Laptop88
                                                Tầng 5, Số 49 Nguyễn Trãi , Quận Thanh Xuân, Thành phố Hà Nội, Việt Nam
                                                MST: 0108940873
                                                •Vietcombank chi nhánh Hoàn Kiếm - 9399809781
                                                •Techcombank chi nhánh Đống Đa - 19037288089010
                                                •BIDV chi nhánh Đông Đô (Phòng giao dịch Kim Liên) - 21510003139555
                                                •Vietinbank chi nhánh Nam Thăng Long - 102873546144
                                        </li>


                                    </ul>

                                </div>

                                <div class="place-order-wp clearfix">

                                    <input type="submit" id="order-now" value="Đặt hàng">

                                </div>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection

