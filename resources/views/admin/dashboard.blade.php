@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid py-5">

        <div class="row">

            <div class="col-md-4">

                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

                    <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>

                    <div class="card-body">

                        <h5 class="card-title">{{ $number_success }}</h5>

                        <p class="card-text">Đơn hàng thành công</p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">

                    <div class="card-header">ĐƠN HÀNG ĐANG GIAO</div>

                    <div class="card-body">

                        <h5 class="card-title">{{ $number_transporting }}</h5>

                        <p class="card-text">Đơn hàng đang giao</p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">

                    <div class="card-header">ĐANG XỬ LÝ</div>

                    <div class="card-body">

                        <h5 class="card-title">{{ $number_processing }}</h5>

                        <p class="card-text">Đơn hàng đang xử lý</p>

                    </div>

                </div>

            </div>
            <div class="col-md-4">

                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">

                    <div class="card-header">DOANH SỐ</div>

                    <div class="card-body">

                        <h5 class="card-title">{{ number_format($total, 0, ',', '.') }}đ</h5>

                        <p class="card-text">Doanh số hệ thống</p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">

                    <div class="card-header">ĐƠN HÀNG HỦY</div>

                    <div class="card-body">

                        <h5 class="card-title">{{ $number_canceled }}</h5>

                        <p class="card-text">Số đơn bị hủy trong hệ thống</p>

                    </div>

                </div>

            </div>
            <div class="col-md-4">

                <a href="{{ route("inventory") }}" class="card text-white bg-primary mb-3" style="max-width: 18rem; cursor: pointer;">

                    <div class="card-header">HÀNG TỒN</div>

                    <div class="card-body">

                        <h5 class="card-title">{{ $inventory }}</h5>

                        <p class="card-text">Số sản phẩm còn hàng trên hệ thống</p>

                    </div>

                </a>

            </div>
            <div class="col-md-4">

                <a href="{{ route("stockout") }}"  class="card text-white bg-danger mb-3" style="max-width: 18rem; cursor: pointer;">

                    <div class="card-header">HẾT HÀNG</div>

                    <div class="card-body">

                        <h5 class="card-title">{{ $stockout }}</h5>

                        <p class="card-text">Số sản phẩm đã hết hàng</p>

                    </div>

                </a>

            </div>
        </div>

        <div class="card">

            <div class="card-header font-weight-bold">

                ĐƠN HÀNG MỚI

            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <thead>

                        <tr>

                            <th scope="col">#</th>

                            <th scope="col">Mã đơn hàng</th>

                            <th scope="col">Khách hàng</th>

                            <th scope="col">Số sản phẩm</th>

                            <th scope="col">Tổng giá</th>

                            <th scope="col">Trạng thái</th>

                            <th scope="col">Thời gian</th>

                            <th scope="col">Tác vụ</th>

                        </tr>

                    </thead>

                    <tbody>

                        @php
                            
                            $t = 0;
                            
                        @endphp

                        @foreach ($all_order as $order)
                            @php
                                
                                $t++;
                                
                            @endphp

                            <tr>

                                <th scope="row">{{ $t }}</th>

                                <td>{{ $order->code }}</td>

                                <td>

                                    {{ $order->customer }} <br>

                                    {{ $order->phone }}

                                </td>

                                <td>{{ $order->qty }}</td>


                                <td>{{ number_format($order->total, 0, ',', '.') }}₫</td>

                                <td><span
                                        class="badge  @if ($order->status == 'cancel') badge-danger

                    @elseif($order->status == 'success')

                        badge-success

                        @elseif($order->status == 'transporting')

                        badge-info

                        @else 

                        badge-warning @endif">
                                        @if ($order->status == 'cancel')
                                            Đã hủy
                                        @elseif($order->status == 'success')
                                            Thành công
                                        @elseif($order->status == 'transporting')
                                            Đang vận chuyển
                                        @elseif($order->status == 'processing')
                                            Đang xử lý
                                        @endif
                                    </span>

                                </td>

                                <td>{{ $order->created_at }}</td>

                                <td>

                                    <a href="{{ route('edit.order', $order->id) }}"
                                        class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fa fa-edit"></i></a>

                                </td>

                            </tr>
                        @endforeach



                    </tbody>

                </table>

                {{ $all_order->links() }}

            </div>

        </div>



    </div>



@endsection
