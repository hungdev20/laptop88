@extends('layouts.admin')
@section('title', 'Edit role')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold">
                Cập nhật
            </div>
            <div class="card-body">
                <form action="{{ route('role.update', $role->id) }}" id="edit_role" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $role->name }}">
                            @error('name')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="display_name">Display Name</label>
                            <input class="form-control" type="text" name="display_name" id="display_name"
                                value="{{ $role->display_name }}">
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
                                                                {{ $permissionChecked->contains('id', $permissionsChildrenItem->id) ? 'checked' : '' }}
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
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
