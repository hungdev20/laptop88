@extends('layouts.admin')
@section('title', 'Thêm sản phẩm')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold">
                Thêm sản phẩm
            </div>
            <div class="card-body">
                <form action="{{ route('store.product') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_title">Tên sản phẩm</label>
                                <input class="form-control" type="text" name="product_title" id="product_title"
                                    value="{{ request()->old('product_title') }}">
                                @error('product_title')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Slug ( Friendly_url )</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ request()->old('slug') }}">
                                @error('slug')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code">Mã sản phẩm</label>
                                <input class="form-control" type="text" name="code" id="code"
                                    value="{{ request()->old('code') }}">
                                @error('code')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input class="form-control" type="text" name="price" id="price"
                                    value="{{ request()->old('price') }}">
                                @error('price')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="qty">Số lượng</label>
                                <input class="form-control" type="number" min="1" name="qty" id="qty"
                                    value="{{ request()->old('qty') }}">
                                @error('qty')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
 
                            <div class="form-group">
                                <label for="special_offer">Khuyến mại</label>
                                <textarea name="special_offer" class="form-control" id="special_offer" cols="30"
                                    rows="5">{{ request()->old('special_offer') }}</textarea>
                                @error('special_offer')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Thông số sản phẩm</label>
                                <textarea name="intro" class="form-control" id="intro" cols="30"
                                    rows="5">{{ request()->old('intro') }}</textarea>
                                @error('intro')
                                    <small class="form-text text-danger"> 
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ProDesc">Mô tả danh mục</label>
                                <textarea  name="ProDesc" class="form-control textarea" id="ProDesc" cols="30"
                                    rows="5">{{ request()->old('ProDesc') }}</textarea>
                                @error('ProDesc')
                                    <small class="form-text text-danger">
                                        {{ $message }}
         
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ProKeywords">Từ khóa danh mục</label>
                                <textarea name="ProKeywords" class="form-control textarea" id="ProKeywords" cols="30"
                                    rows="5">{{ request()->old('ProKeywords') }}</textarea>
                                @error('ProKeywords')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Chi tiết sản phẩm</label>
                        <textarea name="description" class="form-control" id="description" cols="30"
                            rows="8">{{ request()->old('description') }}</textarea>
                        @error('description')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div id="uploadFile" class="___class_+?30___">
                            <input type="file" name="images[]" id="multiple_files" multiple=""
                                data-uri="{{ route('fetchData') }}">
                            <input type="submit" id="bt_upload" name="bt_upload" value="Upload">
                            @error('images.*')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                            <span class="d-block" data-uri="{{ route('ajaxUpload') }}"
                                id="error_multiple_files"></span>
                            <div class="table-responsive" id="image_table">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="list_cat">Danh mục cha</label>
                        <select class="form-control" name="list_cat" id="list_proCat"
                            data-uri="{{ route('fetchPara') }}">
                            <option value="0">Chọn danh mục</option>
                            @foreach ($list_cats as $k => $v)
                                <option value="{{ $v->id }}">{{ str_repeat('--', $v->level) . $v->cat_title }}
                                </option>
                            @endforeach
                        </select>
                        @error('list_cat')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div id="paraProduct">
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="passive"
                                checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Chờ duyệt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="active">
                            <label class="form-check-label" for="exampleRadios2">
                                Công khai
                            </label>
                        </div>
                        <button type="submit" name="btn_add" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
