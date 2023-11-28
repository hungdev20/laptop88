@extends('layouts.admin')
@section('title', 'Danh sách role')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold">
                Thêm mới
            </div>
            <div class="card-body row">
                <form action="{{ route('role.store') }}" method="POST" id="add_role" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ request()->old('name') }}">
                            @error('name')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="display_name">Display Name</label>
                            <input class="form-control" type="text" name="display_name" id="display_name"
                                value="{{ request()->old('display_name') }}">
                            @error('display_name')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" style="font-weight: bold">
                                    <input type="checkbox" class="checkall">
                                </label>
                                <span style="font-weight: bold;
                                    font-size: 17px;">CheckAll</span>
                            </div>
                            @foreach ($permissionParent as $permissionParentItem)
                                <div class="item col-md-12">
                                    <div class="card border-primary mb-3 card-item">
                                        <div class="card-header">
                                            <label for="">
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            Module {{ $permissionParentItem->name }}
                                        </div>
                                        <div class="row">
                                            @foreach ($permissionParentItem->permissionsChildren as $permissionsChildrenItem)
                                                <div class="card-body text-primary col-md-3">
                                                    <h6 class="card-title">
                                                        <label for="{{ $permissionsChildrenItem->id }}">
                                                            <input type="checkbox" name="permission_id[]"
                                                                class="checkbox_children"
                                                                id="{{ $permissionsChildrenItem->id }}"
                                                                value="{{ $permissionsChildrenItem->id }}">
                                                        </label>
                                                        {{ $permissionsChildrenItem->name }}
                                                    </h6>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
        {{-- <div class="col-6">
                <div class="card">
                    <div class="card-header font-weight-bold d-flex justify-content-between">
                        <h5 class="m-0 ">Danh sách Quyền</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive table-checkall" id="table_role">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input name="checkall" type="checkbox">
                                    </th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Display Name</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($role->total() > 0)
                                    @php
                                        
                                        $t = 0;
                                        
                                    @endphp
                                    @foreach ($role as $item)
                                        @php
                                            
                                            $t++;
                                            
                                        @endphp
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="checkItem[]" value="{{ $item->id }}">
                                            </td>
                                            <td scope="row">{{ $t }}</td>
                                            <td class="menu_title"><a href="#">{{ $item->name }}</a></td>
                                            <td class="slug"><a href="#">{{ $item->display_name }}</a></td>
                                            <td>
                                                <a href="{{ route('role.edit', $item->id) }}"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('role.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top"
                                                    onclick="return confirm('Bạn có chắc muốn xóa danh mục này ?')"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
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
                        {{ $role->links() }}
                    </div>
                </div>
            </div> --}}
    </div>
@endsection
