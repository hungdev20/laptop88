@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách khách hàng</h5>
                <div class="form-search">
                    <form action="#" class="form-inline">

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
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'all']) }}" class="text-primary">Tất cả<span
                            class="text-muted">({{ $data[1] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Thùng
                        rác<span class="text-muted">({{ $data[0] }})</span></a>
                </div>
                <form action="{{ route('customer.action') }}" method="POST">
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


                    <table class="table table-striped table-checkall" id="customer_list">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col" id="address">Địa chỉ</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($customers->total() > 0)
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($customers as $customer)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checkItem[]" value="{{ $customer->id }}">
                                        </td>
                                        <th scope="row">{{ $t }}</th>
                                        <td>
                                            <div>
                                                <a href="">{{ $customer->fullname }}</a>
                                            </div>
                                        </td>

                                        <td>{{ $customer->phone_number }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->orders->first()->id}}</td>
                                        <td>{{ $customer->created_at }}</td>

                                        <td>
                                            <a href="{{ route('edit.customer', $customer->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if ($status != 'trash')
                                                <a href="{{ route('delete.customer', $customer->id) }}"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top"
                                                    onclick="return confirm('Bạn có chắc muốn xóa khách hàng này ?')"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
                                            @endif

                                        </td>

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
                {{ $customers->appends($append)->links() }}
            </div>
        </div>
    </div>
@endsection
