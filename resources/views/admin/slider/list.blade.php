@extends('layouts.admin')
@section('title', 'Danh sách slider')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách slider</h5>
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
                <form action="{{ route('slider.action') }}" method="POST">
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
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Link</th>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người tạo</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($sliders->total() > 0)
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($sliders as $slider)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checkItem[]" value="{{ $slider->id }}">
                                        </td>
                                        <td scope="row">{{ $t }}</td>
                                        <td class="tbody-thumb"><img src="{{ url('uploads/sliders/' . $slider->images) }}"
                                                alt=""></td>
                                        <td class="slider_title"><a href="#">{{ $slider->slider_title }}</a></td>
                                        <td class="link"><a href="#">{{ $slider->link }}</a></td>
                                        <td class="order"><a href="#">{{ $slider->order }}</a></td>
                                        <td @if ($slider->status == 'passive')
                                            style="color:red"
                                        @else
                                            style="color:green"
                                @endif>
                                {{ $slider->status }}
                                </td>
                                <td>{{ $slider->name }}</td>
                                <td>{{ $slider->created_at }}</td>
                                @if (Auth::id() == $slider->user_id)
                                    <td class="action">
                                        <a href="{{ route('edit.slider', $slider->id) }}"
                                            class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>
                                        @if ($status != 'trash')
                                            <a href="{{ route('delete.slider', $slider->id) }}"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top"
                                                onclick="return confirm('Bạn có chắc muốn xóa bài viết này ?')"
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
                {{ $sliders->appends($append)->links() }}
            </div>
        </div>
    </div>
@endsection
