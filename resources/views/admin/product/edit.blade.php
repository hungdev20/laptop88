<?php
use App\Parameter_pro;
use App\Product_cat;
?>
@extends('layouts.admin')
@section('title', 'Edit sản phẩm')
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
            <div class="card-body" id="productReturnedInfo" data-id="{{ $id }}">
                <form action="{{ route('update.product', $product_info->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_title">Tên sản phẩm</label>
                                <input class="form-control" type="text" name="product_title" id="product_title"
                                    value="{{ $product_info->product_title }}">
                                @error('product_title')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Slug ( Friendly_url )</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ $product_info->slug }}">
                                @error('slug')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code">Mã sản phẩm</label>
                                <input class="form-control" type="text" name="code" id="code"
                                    value="{{ $product_info->code }}">
                                @error('code')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input class="form-control" type="text" name="price" id="price"
                                    value="{{ $product_info->price }}">
                                @error('price')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="qty">Số lượng</label>
                                <input class="form-control" type="number" min="1" name="qty" id="qty"
                                    value="{{ $product_info->qty }}">
                                @error('qty')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="special_offer">Khuyến mại</label>
                                <textarea name="special_offer" class="form-control" id="special_offer" cols="30"
                                    rows="5">{{ $product_info->special_offer }}</textarea>
                                @error('special_offer') 
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Thông số kỹ thuật</label>
                                <textarea name="intro" class="form-control" id="intro" cols="30"
                                    rows="5">{{ $product_info->intro }}</textarea>
                                @error('intro')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ProDesc">Mô tả danh mục</label>
                                <textarea  name="ProDesc" class="form-control textarea" id="ProDesc" cols="30"
                                    rows="5">{{ $product_info->meta_desc }}</textarea>
                                @error('ProDesc')
                                    <small class="form-text text-danger">
                                        {{ $message }}
         
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ProKeywords">Từ khóa danh mục</label>
                                <textarea name="ProKeywords" class="form-control textarea" id="ProKeywords" cols="30"
                                    rows="5">{{ $product_info->meta_keywords }}</textarea>
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
                            rows="8">{{ $product_info->description }}</textarea>
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
                            <div class="mt-1" id="product_image" style="width:200px">
                                <img src="{{ url($product_info->thumbnail) }}" class="img img-responsive" alt="">
                            </div>
                            <span class="d-block" data-uri="{{ route('ajaxUpload') }}"
                                id="error_multiple_files"></span>
                            <div class="table-responsive mt-2" id="image_table">
                                @if (count($image_data) > 0)
                                    @php
                                        $count = 0;
                                    @endphp
                                    <table class="table table-bordered table-triped">
                                        <tr>
                                            <th>Thứ tự</th>
                                            <th>Hình ảnh</th>
                                            <th>Đường dẫn ảnh</th>
                                            <th>Delete</th>
                                        </tr>
                                        @php
                                            session()->forget('imageIdReturned');
                                        @endphp
                                        @foreach ($image_data as $image)
                                            @php
                                                $count++;
                                            @endphp
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td><img src=" {{ url("uploads/products/subImages/{$image->path_img}") }}"
                                                        class="img img-thumbnail" width="100" height="100"></td>
                                                <td>{{ $image->path_img }} </td>
                                                <td><button class="btn btn-danger delete"
                                                        data-image_name="{{ $image->path_img }}"
                                                        id="{{ $image->id }}"
                                                        data-uri="{{ route('delete.images') }}">Delete</button></td>
                                            </tr>
                                            @php
                                                session()->push('imageIdReturned', $image->id);
                                            @endphp
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="list_cat">Danh mục cha</label>
                        <select class="form-control" name="list_cat" id="list_proCat"
                            data-uri="{{ route('fetchPara') }}">
                            <option value="0">Chọn danh mục</option>
                            @foreach ($list_cats as $k => $v)
                                <option value="{{ $v->id }}" @if ($product_info->cats->first()->id == $v->id)
                                    selected
                            @endif>{{ str_repeat('--', $v->level) . $v->cat_title }}
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
                        @php
                            if (session()->has('nameInput')) {
                                session()->forget('nameInput');
                            }
                            
                        @endphp
                        <div class="text-danger font-weight-bold mb-1">*Lựa chọn thông số sản phẩm</div>
                        @foreach ($paraParents as $item)
                            @php
                                session()->push('nameInput', $item->paraEng);
                                // lấy tất cả các thông số con của acer trong bảng parameterpro_cats với điều kiện là parent_id phải bằng item->id
                                $groupParaChild = Product_cat::find($product_info->cats->first()->id)->paras->where('parent_id', $item->id);
                            @endphp
                            <span class="paraParentTitle font-weight-bold">{{ $item->para_title }}</span>
                            <div class="form-group">
                                @foreach ($groupParaChild as $itemChild)
                                    <div class="form-check">
                                        <input type="checkbox" name="{{ $item->paraEng }}[]"
                                            value="{{ $itemChild->para_title }}" id="{{ $itemChild->id }}"
                                            class="form-check-input" @foreach ($paraPro as $itemPro)
                                        @if ($itemPro->id == $itemChild->id)
                                            checked
                                        @endif
                                @endforeach>
                                <label for="{{ $itemChild->id }}" class="form-check-label">{{ $itemChild->para_title }}</label>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="passive"
                    @if ($product_info->status == 'passive') checked @endif>
                <label class="form-check-label" for="exampleRadios1">
                    Chờ duyệt
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="active"
                    @if ($product_info->status == 'active') checked @endif>
                <label class="form-check-label" for="exampleRadios2">
                    Công khai
                </label>
            </div>
            @error('status')
                <small class="form-text text-danger">
                    {{ $message }}
                </small>
            @enderror
            <button type="submit" name="btn_add" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
