@extends('layouts.account')
@section('title', 'Đơn hàng')
@section('inner_info')

    <div class="purchase">
        <div class="tabLinks">
            <div class="row">
                <a href="{{ url('user/purchase') }}"
                    class="col-2 d-block text-center link @if ($type == 0)
                    border_active
                @endif">Tất
                    cả</a>
                <a href="{{ url('user/purchase') . '?type=1' }}"
                    class="col-2 d-block text-center link @if ($type == 1)
                border_active
            @endif">Chờ
                    xử lý</a>
                <a href="{{ url('user/purchase') . '?type=2' }}"
                    class="col-2 d-block text-center link @if ($type == 2)
                border_active
            @endif">Đang
                    giao</a>
                <a href="{{ url('user/purchase') . '?type=3' }}"
                    class="col-2 d-block text-center link @if ($type == 3)
                border_active
            @endif">Hoàn
                    thành</a>
                <a href="{{ url('user/purchase') . '?type=4' }}"
                    class="col-2 d-block text-center link @if ($type == 4)
                border_active
            @endif">Đã
                    hủy</a>
            </div>
        </div>

        <div class="inner_order">
            @if ($orders->count() > 0)
                <div class="hasID" style="position: relative; margin-bottom: 40px">
                    <input type="text" class="form-control" name="searchBill" id="searchBill"
                        data_type="{{ $type }}" data_uri="{{ route('ajaxSearchBill') }}"
                        placeholder="Tìm Kiếm Theo ID Đơn Hàng">
                    <span class="icon-search"><i class="fas fa-search"></i></span>
                </div>
                <div class="sOrder">
                    <div id="zsBB">
                        @foreach ($orders as $order)
                            <div class="minizsBB mb-4 pb-4" style="border-bottom: 1px solid rgb(145 143 143 / 96%);">
                                <div class="row bill-item pb-3 mb-3">
                                    @if ($order->status == 'processing')
                                        <div class="col-4 col-md-6">
                                            <div class="row">
                                                <div class="col-4 codeHA_parent">
                                                    <span class="codeHA">Mã Bill:
                                                        <strong>{{ $order->code }}</strong></span>

                                                </div>
                                                <div class="col-8 cancel_order">
                                                    <button class="btn btn-danger" id="cancel_order"
                                                        data_uri="{{ route('cancel.order') }}"
                                                        data_id="{{ $order->id }}"
                                                        onclick="confirm('Bạn chắc chắn muốn hủy đơn hàng này chứ?')">Hủy
                                                        đơn hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class=" col-4 col-md-6">
                                            <span class="codeHA">Mã Bill:
                                                <strong>{{ $order->code }}</strong></span>
                                        </div>
                                    @endif

                                    <div class="col-8 col-md-6 row status">
                                        <div class="col-6 d-flex">
                                            @if ($order->status == 'processing')
                                                <i class=" fas fa-truck-loading"
                                                    style="color: #ffc107; font-size:18px; font-weight:700"><span
                                                        class="pl-2">Đang xử lý</span></i>
                                            @elseif ($order->status == 'transporting')
                                                <i class=" fas fa-shuttle-van"
                                                    style="color: #17a2b8; font-size:18px; font-weight:700"><span
                                                        class="pl-2">Đang giao</span></i>
                                            @elseif ($order->status == 'success')
                                                <i class="fas fa-check-circle"
                                                    style="color: #197d00; font-size:18px; font-weight:700"><span
                                                        class="pl-2">Hoàn thành</span></i>
                                            @elseif ($order->status == 'cancel')
                                                <i class="far fa-window-close"
                                                    style="color: red; font-size:18px; font-weight:700"><span
                                                        class="pl-2">Đã hủy</span></i>
                                            @endif

                                        </div>
                                        <div class="col-6">
                                            <span class="notPay"><i class="fas fa-money-bill-wave pr-2"></i>Chưa
                                                Thanh Toán</span>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($order->products as $item)
                                    <div class="row pb-2 mb-2 prd_item">
                                        <div class="col-2 thumb_order">
                                            <img src="{{ url($item->thumbnail) }}" alt="" class="d-block">
                                        </div>
                                        <div class="col-7 col-md-8 middle_order" style="margin-top: 14px">
                                            <div class="product-title">
                                                {{ $item->product_title }}
                                            </div>
                                            <div class="code">
                                                Mã sản phẩm: <strong>{{ $item->code }}</strong>

                                            </div>
                                            <div class="qty" style="margin-top:5px">
                                                <span>Số lượng: <strong>{{ $item->pivot->qty }}</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-2 subtotal_order">
                                            <div class="sub-total" style="padding-top: 50px">Thành tiền: <span
                                                    style="color: red">
                                                    {{ number_format($item->price * $item->pivot->qty, 0, ',', '.') }}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="total_order d-flex justify-content-end">
                                    <div class="totHA">
                                        Tổng tiền:
                                    </div>
                                    <div class="tot">
                                        {{ number_format($order->total, 0, ',', '.') }}đ
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="no_pro text-center">
                    <span class="d-block" style="font-size: 30px;
                                margin-bottom: 20px;">Không có đơn hàng nào</span>
                    <i style="font-size: 75px; color:#c8d6e5" class="fas fa-receipt mt-3"></i>
                </div>
            @endif
        </div>


    </div>

@endsection
