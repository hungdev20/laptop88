<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div id="content" style="border:none" class="detail-exhibition container-fluid fl-right bg-white" style="min-height: 624px;">

            @if (session('status'))
                <div class="alert alert-success">

                    {{ session('status') }}

                </div>
            @endif

            <form method="POST" action="{{ route('update.order', $order_info->id) }}">

                @csrf

                <div class="section" id="info">

                    <div class="section-head">

                        <h3 class="section-title">Thông tin đơn hàng</h3>

                    </div>

                    <ul class="list-item list-unstyled">

                        <li>

                            <div class="d-flex icon">

                                <i class="fas fa-barcode"></i>

                                <h3 class="title">Mã đơn hàng</h3>

                            </div>

                            <span class="detail">{{ $order_info->code }}</span>

                        </li>
                        <li>

                            <div class="d-flex icon">

                                <i class="fas fa-user"></i>
                                <h3 class="title">Tên khách hàng</h3>

                            </div>

                            <span class="detail">{{ $order_info->customer }}</span>

                        </li>
                        <li>

                            <div class="d-flex icon">

                                <i class="fas fa-phone-volume"></i>
                                <h3 class="title">Số điện thoại</h3>

                            </div>

                            <span class="detail">{{ $order_info->phone }}</span>

                        </li>
                        <li>

                            <div class="d-flex icon">

                                <i class="fas fa-envelope"></i>

                                <h3 class="title">Email</h3>

                            </div>

                            <span class="detail">{{ $order_info->email }}</span>

                        </li>


                        <li>

                            <div class="d-flex icon">

                                <i class="fas fa-map-marker-alt"></i>

                                <h3 class="title">Địa chỉ nhận hàng</h3>

                            </div>

                            <span class="detail">{{ $order_info->address }}</span>

                        </li>

                        <li>

                            <div class="d-flex icon">

                                <i class="fas fa-shuttle-van"></i>

                                <h3 class="title">Thông tin vận chuyển</h3>

                            </div>

                            @if ($order_info->payment_method == 'payment-home')
                                <span class="detail">Thanh toán tại nhà</span>
                            @else
                                <span class="detail">Thanh toán online</span>
                            @endif



                        </li>



                        <li>

                            <div class="d-flex icon">

                                <i class="fas fa-barcode"></i>

                                <h3 class="title">Tình trạng đơn hàng</h3>

                            </div>
                            <span class="detail">
                                @if ($order_info->status == 'processing')
                                    Chờ xử lý
                                @elseif($order_info->status == 'success')
                                    Thành công
                                @elseif($order_info->status == 'cancel')
                                    Đã hủy
                                @endif
                            </span>
                        </li>



                    </ul>

                </div>

                <div class="section">

                    <div class="section-head">

                        <h3 class="section-title">Sản phẩm đơn hàng</h3>

                    </div>

                    <div class="table-responsive">

                        <table class="table info-exhibition">

                            <thead>

                                <tr>

                                    <th class="thead-text">STT</th>

                                    <th class="thead-text">Ảnh sản phẩm</th>

                                    <th class="thead-text">Tên sản phẩm</th>

                                    <th class="thead-text">Số lượng kho còn</th>

                                    <th class="thead-text">Đơn giá</th>

                                    <th class="thead-text">Số lượng</th>

                                    <th class="thead-text">Thành tiền</th>

                                </tr>

                            </thead>

                            <tbody>

                                @php
                                    
                                    $t = 0;
                                    
                                @endphp

                                @foreach ($product_info as $product)
                                    @php
                                        
                                        $t++;
                                        
                                    @endphp

                                    <tr class="start_each_pr">

                                        <td class="thead-text">{{ $t }}</td>

                                        <td class="thead-text">

                                            <div class="thumb">

                                                <img src="{{ url($product->thumbnail) }}" alt="">

                                            </div>

                                        </td>

                                        <td class="thead-text" style="width:30%">{{ $product->product_title }}</td>

                                        <td class="thead-text">{{ $product->qty - $product->products_sold }}</td>

                                        <td class="thead-text">{{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td class="thead-text">

                                            {{ $product->pivot->qty }}
                                        </td>

                                        <td class="thead-text order_product_subtotal_{{ $product->id }}">

                                            {{ number_format($product->price * $product->pivot->qty, 0, ',', '.') }}
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </form>

            <div class="section">

                <h3 class="section-title">Giá trị đơn hàng</h3>

                <div class="section-detail">

                    <ul class="list-item list-unstyled clearfix">

                        <li>

                            <span class="total-fee">Tổng số lượng:</span>

                            <span class="total">Tổng đơn hàng:</span>

                        </li>

                        <li>

                            <span class="total-fee"><strong class="total_qty">{{ $order_info->qty }}</strong> sản

                                phẩm</span>

                            <span class="total"> <strong
                                    class="order_total_price">{{ number_format($order_info->total, 0, ',', '.') }}</strong></span>

                        </li>

                    </ul>

                </div>

            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>

</body>

</html>
