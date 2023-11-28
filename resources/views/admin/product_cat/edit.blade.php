<?php

use App\Parameter_pro;

?>

@extends('layouts.admin')
@section('title', 'Edit danh mục sản phẩm')
@section('content')

    <div id="content" class="container-fluid">

        <div class="card">

            <div class="card-header font-weight-bold">

                Cập nhật danh mục

            </div>

            <div class="card-body" id="catReturnedInfo" data-id="{{ $id }}">

                <form action="{{ route('update.cat', $cat_info->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">

                        <label for="cat_title">Tên danh mục</label>

                        <input class="form-control" type="text" name="cat_title" id="cat_title"

                            value="{{ $cat_info->cat_title }}">

                        @error('cat_title')

                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>
                    <div class="form-group">

                        <label for="title">Slug ( Friendly_url )</label>

                        <input type="text" class="form-control" name="slug" id="slug"

                            value="{{ $cat_info->slug }}">

                        @error('slug')

                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>
                    <div class="form-group">

                        <label for="catProDesc">Mô tả danh mục</label>

                        <textarea name="catProDesc" class="form-control textarea" id="catProDesc" cols="30"

                            rows="5">{{ $cat_info->meta_desc }}</textarea>

                        @error('catProDesc')

                            <small class="form-text text-danger">

                                {{ $message }} 

                            </small>

                        @enderror

                    </div>
                    <div class="form-group">

                        <label for="catProKeywords">Từ khóa sản phẩm</label>

                        <textarea name="catProKeywords" class="form-control textarea" id="catProKeywords" cols="30"

                            rows="5">{{ $cat_info->meta_keywords }}</textarea>

                        @error('catProKeywords')

                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="list_cat">Danh mục cha</label>

                        <select class="form-control" name="list_cat" id="">

                            <option value="0">Chọn danh mục</option>

                            @foreach ($list_cats as $k => $v)

                                <option value="{{ $v->id }}" @if ($cat_info->parent_id == $v->id) selected @endif>

                                    {{ str_repeat('--', $v->level) . $v->cat_title }}

                                </option>

                            @endforeach

                        </select>

                        @error('list_cat')

                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                    <div class="form-group">

                        <label>Icon danh mục lớn</label>

                        <div id="uploadFile">

                            <input type="file" class="form-control-file" name="file">

                            @error('file')

                                <small class="form-text text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

                            <div class="mt-1" id="productCat_image" style="width:200px">

                                <img src="{{ url('uploads/product-cat/' . $cat_info->file) }}" class="img img-responsive" alt="">

                            </div>

                        </div>

                    </div>

                    @foreach ($groupParaParent as $item)

                        @php

                            session()->push('nameInputReturned', $item->paraEng);

                        @endphp

                    @endforeach

                    <div class="form-group">

                        <label for="parent_cat" class="text-danger">Danh mục thông số:</label>

                        <div class="form-group">

                            @foreach ($parent_cats as $k => $v)

                                <div class="form-check-inline">

                                    <input type="checkbox" name="parent_cat[]" id="{{ $v->paraEng }}" value="{{ $v->id }}"

                                        class="form-check-input list_para" data-uri="{{ route('fetchParaForProCat') }}"

                                        data-uri1="{{ route('deleteParaForProCat') }}" @if (!empty(session('nameInputReturned'))){

                                    @foreach (session('nameInputReturned') as $name)

                                        @if ($name == $v->paraEng)

                                            checked

                                        @endif

                                    @endforeach

                            @endif}

                            >

                            <label for="{{ $v->paraEng }}" class="form-check-label">{{ $v->para_title }}</label>

                        </div>

                        @endforeach



                    </div>

                    @error('parent_cat')

                        <small class="form-text text-danger">

                            {{ $message }}

                        </small>

                    @enderror

            </div>

            @if (!empty($groupParaParent))





                <div id="paraProductForCatPro">

                    <div class="text-danger font-weight-bold mb-1">*Lựa chọn thông số sản phẩm</div>

                    @foreach ($groupParaParent as $item)

                        @php

                            

                            $paraChildren = Parameter_pro::where('parent_id', $item->id)->get();

                        @endphp

                        <span class="paraParentTitle font-weight-bold">{{ $item->para_title }}</span>

                        <div class="form-group">

                            @foreach ($paraChildren as $itemChild)

                                <div class="form-check">

                                    <input type="checkbox" name="{{ $item->paraEng }}[]"

                                        value="{{ $itemChild->para_title }}" id="{{ $itemChild->id }}"

                                        class="form-check-input" @foreach ($paraOfCat as $itemPara)

                                    @if ($itemPara->id == $itemChild->id)

                                        checked

                                    @endif

                            @endforeach>

                            <label for="{{ $itemChild->id }}" class="form-check-label">{{ $itemChild->para_title }}</label>

                        </div>

                    @endforeach

                </div>

            @endforeach



        </div>

        @endif

        <div class="form-check">

            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="passive"

                @if ($cat_info->status == 'passive') checked @endif>

            <label class="form-check-label" for="exampleRadios1">

                Chờ duyệt

            </label>

        </div>

        <div class="form-check">

            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="active"

                @if ($cat_info->status == 'active') checked @endif>

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

@endsection

