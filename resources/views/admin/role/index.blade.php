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
                                    @if (!empty($roleOfUser))
                                        <td>
                                            <a href="{{ route('role.edit', $item->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if (!$roleOfUser->contains($item->id))
                                                <a href="{{ route('role.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top"
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
                {{ $role->links() }}
            </div>
        </div>
    </div>
@endsection
