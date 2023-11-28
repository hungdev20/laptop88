@extends('layouts.admin')
@section('title', 'Edit danh mục quyền')
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
                        Cập nhật danh mục quyền
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.permissioncat', $permission_info->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $permission_info->name }}">
                                @error('name')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="display_name">Display Name</label>
                                <input class="form-control" type="text" name="display_name" id="display_name"
                                    value="{{ $permission_info->display_name }}">
                                @error('display_name')
                                    <small class="form-text text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold d-flex justify-content-between">
                        <h5 class="m-0 ">Danh mục quyền</h5>
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
                  
                    <a href="{{ Request::url() }}?status=trash" class="text-primary">Thùng
                        rác<span class="text-muted">({{ $data[0] }})</span></a>
                        </div>
                        <form action="{{ route('permissioncat.action') }}" method="POST">
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
                                        <th scope="col">Tên</th>
                                        <th scope="col">Display name</th>
                                        <th scope="col">Người tạo</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($listcat->total() > 0)
                                        @php
                                            
                                            $t = 0;
                                            
                                        @endphp
                                        @foreach ($listcat as $item)
                                            @php
                                                
                                                $t++;
                                                
                                            @endphp
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="checkItem[]" value="{{ $item->id }}">
                                                </td>
                                                <td scope="row">{{ $t }}</td>
                                                <td class="name"><a href="#">{{ $item->name }}</a></td>
                                                <td class="display_name"><a href="#">{{ $item->display_name }}</a></td>
                                                <td class="creator"><a href="#">{{ $item->user->name }}</a></td>
                                                <td>{{ $item->created_at }}</td>
                                                @if (Auth::id() == $item->user_id)
                                                    <td>
                                                        <a href="{{ route('edit.permissioncat', $item->id) }}"
                                                            class="btn btn-success btn-sm rounded-0 text-white"
                                                            type="button" data-toggle="tooltip" data-placement="top"
                                                            title="Edit"><i class="fa fa-edit"></i></a>
                                                        @if ($status != 'trash')
                                                            <a href="{{ route('delete.permissioncat', $item->id) }}"
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
                        {{ $listcat->appends($append)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
