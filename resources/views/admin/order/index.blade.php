@extends('layouts.admin')
@section('title', 'Danh sách đơn hàng')
@section('content')

    <div id="content" class="container-fluid">

        <div class="card">

            @if (session('status'))
                <div class="alert alert-success">

                    {{ session('status') }}

                </div>
            @endif

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">

                <h5 class="m-0 ">Danh sách đơn hàng</h5>

                <div class="form-search form-inline">

                    <form action="#" class='d-flex'>

                        @if ($status)
                            <input type="hidden" name="status" value="{{ $status }}">
                        @endif

                        <input type="" class="form-control form-search mr-1" name="keyword"
                            value="{{ request()->input('keyword') }}" placeholder="Tìm kiếm">

                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">

                    </form>

                </div>

            </div>

            <div class="card-body">

                <div class="analytic">

                    <a href="{{ Request::url() }}?status=all" class="text-primary">Tất cả<span
                            class="text-muted">({{ $data[0] }})</span></a>

                    <a href="{{ Request::url() }}?status=processing" class="text-primary">Đang xử

                        lý<span class="text-muted">({{ $data[2] }})</span></a>

                    <a href="{{ Request::url() }}?status=transporting" class="text-primary">Đang

                        giao<span class="text-muted">({{ $data[3] }})</span></a>

                    <a href="{{ Request::url() }}?status=success" class="text-primary">Hoàn

                        thành<span class="text-muted">({{ $data[4] }})</span></a>

                    <a href="{{ Request::url() }}?status=cancel" class="text-primary">Hủy đơn

                        hàng<span class="text-muted">({{ $data[1] }})</span></a>

                </div>

                <form action="{{ route('order.action') }}" method="POST">

                    @csrf

                    <div class="form-action form-inline py-3">

                        <select class="form-control mr-1" name="act" id="">

                            <option>Chọn</option>

                            @foreach ($act as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach



                        </select>

                        <input type="submit" name="btn-search"
                            onclick="return confirm('Bạn có chắc chắn muốn thực hiện thao tác này?')" value="Áp dụng"
                            class="btn btn-primary">

                    </div>

                    <table class="table table-striped table-checkall">

                        <thead>

                            <tr>

                                <th>

                                    <input type="checkbox" name="checkall">

                                </th>

                                <th scope="col">#</th>

                                <th scope="col">Mã</th>

                                <th scope="col">Khách hàng</th>

                                <th scope="col">Số điện thoại</th>

                                <th scope="col">Số lượng</th>

                                <th scope="col">Giá trị</th>

                                <th scope="col">Trạng thái</th>

                                <th scope="col">Thời gian</th>

                                <th scope="col">Chi tiết</th>

                                <th scope="col">Tác vụ</th>

                            </tr>

                        </thead>

                        <tbody>

                            @if ($orders->total() > 0)

                                @php
                                    
                                    $t = 0;
                                    
                                @endphp

                                @foreach ($orders as $order)
                                    @php
                                        
                                        $t++;
                                        
                                    @endphp

                                    <tr>



                                        <td>

                                            <input type="checkbox" name="checkItem[]" value="{{ $order->id }}">

                                        </td>

                                        <td>{{ $t }}</td>

                                        <td>{{ $order->code }}</td>

                                        <td>

                                            {{ $order->customer }}

                                        </td>
                                        <td>

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

                                        <td><a href="">Chi tiết</a></td>

                                        {{-- @if (Auth::id() == $order->user_id) --}}

                                        <td>

                                            <a href="{{ route('edit.order', $order->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>

                                            @if ($status != 'cancel')
                                                <a href="{{ route('delete.order', $order->id) }}"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top"
                                                    onclick="return confirm('Bạn có chắc muốn xóa trang này ?')"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
                                            @endif

                                            <a href="{{ route('print.order', $order->id) }}"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Print"><i
                                                    class="fas fa-print"></i></a>
                                        </td>

                                        {{-- @endif --}}

                                    </tr>
                                @endforeach
                            @else
                                <tr>

                                    <td colspan="7" class="bg-white">

                                        Không tìm thấy bản ghi

                                    </td>

                                </tr>

                            @endif

                        </tbody>

                    </table>

                </form>

                {{ $orders->appends($append)->links() }}

            </div>

        </div>

    </div>

@endsection
