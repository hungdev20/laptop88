@extends('layouts.admin')
@section('title', 'Danh sách menu')
@section('content')

    <div id="content" class="container-fluid">

        <div class="row">

            <div class="col-4">

                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>
                    @endif

                    <div class="card-header font-weight-bold">

                        Thêm mới

                    </div>

                    <div class="card-body">

                        <form action="{{ route('store.menu') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">

                                <label for="menu_title">Tên menu</label>

                                <input class="form-control" type="text" name="menu_title" id="menu_title"
                                    value="{{ request()->old('menu_title') }}">

                                @error('menu_title')
                                    <small class="form-text text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="slug">Đường dẫn tĩnh</label>

                                <input class="form-control" type="text" name="slug" id="slug"
                                    value="{{ request()->old('slug') }}">

                                @error('slug')
                                    <small class="form-text text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror

                                <small class="text-muted">Chuỗi đường dẫn tĩnh cho menu</small>

                            </div>

                            <div class="form-group">

                                <label for="menu_title">Class icon</label>

                                <input class="form-control" type="text" name="icon" id="icon"
                                    value="{{ request()->old('icon') }}">

                                @error('icon')
                                    <small class="form-text text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="page">Trang</label>

                                <select class="form-control" name="pages" id="">

                                    <option value="">Chọn danh mục</option>

                                    @foreach ($list_pages as $k => $v)
                                        <option value="{{ $v->id }}"
                                            @if (request()->old('pages') == $v->id) selected @endif>{{ $v->page_title }}
                                        </option>
                                    @endforeach

                                </select>



                                <small class="text-muted">Trang liên kết đến menu</small>

                            </div>

                            <div class="form-group">

                                <label for="product_cats">Danh mục sản phẩm</label>

                                <select class="form-control" name="product_cats" id="product_cats">

                                    <option value="">Chọn danh mục</option>

                                    @foreach ($list_procats as $k => $v)
                                        <option value="{{ $v->id }}"
                                            @if (request()->old('product_cats') == $v->id) selected @endif>

                                            {{ str_repeat('--', $v->level) . $v->cat_title }}

                                        </option>
                                    @endforeach

                                </select>



                                <small class="text-muted">Danh mục sản phẩm liên kết đến menu</small>

                            </div>
                            <div class="form-group">

                                <label for="order" class="d-block">Thứ tự</label>

                                <input type="text" class="" name="order" id="order"
                                    value="{{ request()->old('order') }}">

                                @error('order')
                                    <small class="form-text text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror

                            </div>

                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                    value="passive" checked>

                                <label class="form-check-label" for="exampleRadios1">

                                    Chờ duyệt

                                </label>

                            </div>

                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2"
                                    value="active">

                                <label class="form-check-label" for="exampleRadios2">

                                    Công khai

                                </label>

                            </div>

                            @error('status')
                                <small class="form-text text-danger">

                                    {{ $message }}

                                </small>
                            @enderror



                            <button type="submit" class="btn btn-primary">Thêm mới</button>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-8">

                <div class="card">

                    <div class="card-header font-weight-bold d-flex justify-content-between">

                        <h5 class="m-0 ">Danh sách Menu</h5>

                        <div class="form-search form-inline">

                            <form action="#">

                                @if ($status)
                                    <input type="hidden" name="status" value="{{ $status }}">
                                @endif

                                <input type="" class="form-control form-search" name="keyword"
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

                        <form action="{{ route('menu.action') }}" method="POST">

                            @csrf

                            <div class="form-action form-inline py-3">

                                <select class="form-control mr-1" name="act" id="">

                                    <option>Chọn</option>

                                    @foreach ($act as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                    @endforeach

                                </select>

                                <input type="submit" name="btn-search"
                                    onclick="return confirm('Bạn có chắc chắn muốn thực hiện thao tác này?')"
                                    value="Áp dụng" class="btn btn-primary">

                            </div>

                            <table class="table table-striped table-responsive table-checkall">

                                <thead>

                                    <tr>

                                        <th scope="col">

                                            <input name="checkall" type="checkbox">

                                        </th>

                                        <th scope="col">STT</th>

                                        <th scope="col">Tên menu</th>

                                        <th scope="col">Slug</th>

                                        <th scope="col">Thứ tự</th>

                                        <th scope="col">Trạng thái</th>

                                        <th scope="col">Tác vụ</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @if ($menu->total() > 0)

                                        @php
                                            
                                            $t = 0;
                                            
                                        @endphp

                                        @foreach ($menu as $item)
                                            @php
                                                
                                                $t++;
                                                
                                            @endphp

                                            <tr>

                                                <td>

                                                    <input type="checkbox" name="checkItem[]"
                                                        value="{{ $item->id }}">

                                                </td>

                                                <td scope="row">{{ $t }}</td>

                                                <td class="menu_title"><a href="#">{{ $item->menu_title }}</a>
                                                </td>

                                                <td class="slug"><a href="#">{{ $item->slug }}</a></td>

                                                <td class="order"><a href="#">{{ $item->order }}</a></td>



                                                <td
                                                    @if ($item->status == 'passive') style="color:red"

                                                @else

                                                    style="color:green" @endif>

                                                    {{ $item->status }}

                                                </td>





                                                @if (Auth::id() == $item->user_id)
                                                    <td>

                                                        <a href="{{ route('edit.menu', $item->id) }}"
                                                            class="btn btn-success btn-sm rounded-0 text-white"
                                                            type="button" data-toggle="tooltip" data-placement="top"
                                                            title="Edit"><i class="fa fa-edit"></i></a>

                                                        @if ($status != 'trash')
                                                            <a href="{{ route('delete.menu', $item->id) }}"
                                                                class="btn btn-danger btn-sm rounded-0 text-white"
                                                                type="button" data-toggle="tooltip" data-placement="top"
                                                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này ?')"
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

                        {{ $menu->appends($append)->links() }}

                    </div>

                </div>

            </div>

        </div>



    </div>

@endsection
