@extends('layouts.admin')
@section('title', 'Thêm danh mục sản phẩm')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold">
                Thêm danh mục
            </div>
            <div class="card-body"> 
                <form action="{{ route('store.cat') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cat_title">Tên danh mục</label>
                        <input class="form-control" type="text" name="cat_title" id="cat_title"
                            value="{{ request()->old('cat_title') }}">
                        @error('cat_title')
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
                        <label for="catProDesc">Mô tả danh mục</label>
                        <textarea  name="catProDesc" class="form-control textarea" id="catProDesc" cols="30"
                            rows="5">{{ request()->old('catProDesc') }}</textarea>
                        @error('catProDesc')
                            <small class="form-text text-danger">
                                {{ $message }}
 
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="catProKeywords">Từ khóa danh mục</label>
                        <textarea name="catProKeywords" class="form-control textarea" id="catProKeywords" cols="30"
                            rows="5">{{ request()->old('catProKeywords') }}</textarea>
                        @error('catProKeywords')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="list_cat">Danh mục cha</label>
                        <select class="form-control" name="list_cat">
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
                    <div class="form-group">
                        <label>Icon danh mục lớn</label>
                        <div id="uploadFile">
                            <input type="file" class="form-control-file" name="file" >
                            @error('file')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent_cat" class="text-danger">Danh mục thông số:</label>
                        <div class="form-group" id="paraParentList">
                            @foreach ($parent_cats as $k => $v)
                                <div class="form-check-inline">
                                    <input type="checkbox" name="parent_cat[]" id="{{ $v->paraEng }}" value="{{ $v->id }}"
                                        class="form-check-input list_para"  data-uri="{{ route('fetchParaForProCat') }}" data-uri1 = "{{ route('deleteParaForProCat') }}">
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
                    <div id="paraProductForCatPro">
                    </div>
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
                    @error('status')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                    <button type="submit" name="btn_add" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection
