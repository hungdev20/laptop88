<?php
use App\Parameter_pro; 
?>
@extends('layouts.admin')
@section('title', 'Danh sách thông số')
@section('content')

    <div id="content" class="container-fluid">

        <div class="card">

            @if (session('status'))

                <div class="alert alert-success">

                    {{ session('status') }}

                </div>

            @endif

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">

                <h5 class="m-0 ">Danh sách thông số</h5>

                <div class="form-search">

                    <form action="#" class="form-inline">

                        @if ($status)

                            <input type="hidden" name="status" value="{{ $status }}">

                        @endif

                        <input type="" class="form-control form-search mr-1" name="keyword"
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

                <form action="{{ route('para.action') }}" method="POST">

                    @csrf

                    <div class="form-action form-inline py-3">

                        <select class="form-control mr-1" name="act" id="">

                            <option>Chọn</option>

                            @foreach ($act as $k => $v)

                                <option value="{{ $k }}">{{ $v }}</option>

                            @endforeach

                        </select>

                        <input type="submit" name="btn-search"
                            onclick="return confirm('Bạn có chắc chắn muốn thực hiện thao tác này?')" value="Áp dụng"
                            class="btn btn-primary">

                    </div>

                    <table class="table table-striped table-checkall">

                        <thead>

                            <tr>

                                <th scope="col">

                                    <input name="checkall" type="checkbox">

                                </th>

                                <th scope="col">STT</th>

                                <th scope="col">Tiêu đề</th>

                                <th scope="col">Danh mục cha</th>

                                <th scope="col">Trạng thái</th>

                                <th scope="col">Người tạo</th>

                                <th scope="col">Ngày tạo</th>

                                <th scope="col">Tác vụ</th>

                            </tr>

                        </thead>

                        <tbody>

                            @if ($para_cat->total() > 0)

                                @php
                                    
                                    $t = 0;
                                    
                                @endphp

                                @foreach ($para_cat as $cat)

                                    @php
                                        
                                        $t++;
                                        
                                    @endphp

                                    <tr>

                                        <td>

                                            <input type="checkbox" name="checkItem[]" value="{{ $cat->id }}">

                                        </td>

                                        <td scope="row">{{ $t }}</td>

                                        <td><a href="">{{ $cat->para_title }}</a></td>

                                        @php
                                            $catParentName = Parameter_pro::find($cat->parent_id);
                                            
                                        @endphp

                                        <td>
                                            @if (!empty($catParentName))
                                                {{ $catParentName->para_title }}
                                            @else

                                            @endif
                                        </td>

                                        <td @if ($cat->status == 'passive')
                                            style="color:red"

                                        @else

                                            style="color:green"
                                @endif>

                                {{ $cat->status }}

                                </td>

                                <td>{{ $cat->name }}</td>

                                <td>{{ $cat->created_at }}</td>

                                @if (Auth::id() == $cat->user_id)

                                    <td>

                                        <a href="{{ route('edit.para', $cat->id) }}"
                                            class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>

                                        @if ($status != 'trash')

                                            <a href="{{ route('delete.para', $cat->id) }}"
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

                </form>

                {{ $para_cat->appends($append)->links() }}

            </div>

        </div>

    </div>

@endsection
