@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('content')

    <div id="content" class="container-fluid">

        <div class="card">

            @if (session('status'))
                <div class="alert alert-success">

                    {{ session('status') }}

                </div>
            @endif

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">

                <h5 class="m-0 ">Danh sách sản phẩm</h5>

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

                    <a href="{{ Request::url() }}?status=active" class="text-primary">Đã
                        đăng<span class="text-muted">({{ $data[1] }})</span></a>
                    <a href="{{ Request::url() }}?status=passive" class="text-primary">Chờ
                        duyệt<span class="text-muted">({{ $data[2] }})</span></a>
                    <a href="{{ Request::url() }}?status=trash" class="text-primary">Thùng
                        rác<span class="text-muted">({{ $data[0] }})</span></a>

                </div>

                <form action="{{ route('product.action') }}" method="POST">

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

                                <th scope="col">

                                    <input name="checkall" type="checkbox">

                                </th>

                                <th scope="col">#</th>

                                <th scope="col">Ảnh</th>

                                <th scope="col">Tên sản phẩm</th>

                                <th scope="col">Giá</th>

                                <th scope="col">Hàng tồn</th>

                                <th scope="col">Danh mục</th>

                                <th scope="col">Người tạo</th>

                                <th scope="col">Ngày tạo</th>

                                <th scope="col">Trạng thái</th>

                                <th scope="col">Tác vụ</th>

                            </tr>

                        </thead>

                        <tbody>

                            @if ($products->total() > 0)

                                @php
                                    
                                    $t = 0;
                                    
                                @endphp

                                @foreach ($products as $product)
                                    @php
                                        
                                        $t++;
                                        
                                    @endphp

                                    <tr class="">

                                        <td>

                                            <input type="checkbox" name="checkItem[]" value="{{ $product->id }}">

                                        </td>

                                        <td>{{ $t }}</td>

                                        <td>

                                            <div class="tbody-thumb">

                                                <img src="{{ url($product->thumbnail) }}" alt="">

                                            </div>

                                        </td>

                                        <td class="title">

                                            <div>

                                                <a
                                                    href="{{ route('product.detail', $product->id) }}">{{ $product->product_title }}</a>

                                            </div>

                                        </td>

                                        <td>{{ number_format($product->price, 0, ',', '.') }}đ</td>

                                        <td>{{ $product->qty - $product->products_sold }}</td>

                                        <td>{{ $product->cats->first()->cat_title }}</td>

                                        <td>{{ $product->name }}</td>

                                        <td>{{ $product->created_at }}</td>

                                        <td>

                                            @if ($product->qty > 0)
                                                <span class="badge badge-success">

                                                    Còn hàng

                                                </span>
                                            @else
                                                <span class="badge badge-dark">

                                                    Hết hàng

                                                </span>
                                            @endif

                                        </td>

                                        @if (Auth::id() == $product->user_id)
                                            <td>

                                                <a href="{{ route('edit.product', $product->id) }}"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>

                                                @if ($status != 'trash')
                                                    <a href="{{ route('delete.product', $product->id) }}"
                                                        class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                        data-toggle="tooltip" data-placement="top"
                                                        onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ?')"
                                                        title="Delete"><i class="fa fa-trash"></i></a>
                                                @endif



                                            </td>
                                        @endif



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

                {{ $products->appends($append)->links() }}

            </div>

        </div>

    </div>

@endsection
