@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm còn hàng')
@section('content')

    <div id="content" class="container-fluid">

        <div class="card">

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">

                <h5 class="m-0 ">Danh sách sản phẩm còn hàng</h5>

                <div class="form-search">

                    <form action="#" class="form-inline">

                        <input type="" class="form-control form-search mr-1" name="keyword"
                            value="{{ request()->input('keyword') }}" placeholder="Tìm kiếm">

                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">

                    </form>

                </div>

            </div>

            <div class="card-body">

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
                            <th scope="col">Danh mục</th>

                            <th scope="col">Người tạo</th>

                            <th scope="col">Ngày tạo</th>

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

                                    <td>{{ $product->cats->first()->cat_title }}</td>

                                    <td>{{ $product->name }}</td>

                                    <td>{{ $product->created_at }}</td>

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


                {{ $products->links() }}

            </div>

        </div>

    </div>

@endsection
