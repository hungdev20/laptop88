@extends('layouts.admin')
@section('title', 'Danh sách trang')
@section('content')

    <div id="content" class="container-fluid">

        <div class="card">

            @if (session('status'))

                <div class="alert alert-success">

                    {{ session('status') }}

                </div>

            @endif

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">

                <h5 class="m-0 ">Danh sách thành viên</h5>

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

                <form action="{{ route('page.action') }}" method="POST">

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

                                <th>

                                    <input type="checkbox" name="checkall">

                                </th>

                                <th scope="col">STT</th>

                                <th scope="col">Tiêu đề</th>

                                <th scope="col">Trạng thái</th>

                                <th scope="col">Người tạo</th>

                                <th scope="col">Ngày tạo</th>

                                <th scope="col">Chi tiết</th>

                                <th scope="col">Tác vụ</th>

                            </tr>

                        </thead>

                        <tbody>

                            @if (count($pages) > 0)

                                @php

                                    $t = 0;

                                @endphp

                                @foreach ($pages as $page)

                                    @php

                                        $t++;

                                    @endphp 

                                    <tr>

                                        <td>

                                            <input type="checkbox" name="checkItem[]" value="{{ $page->id }}">

                                        </td>

                                        <th scope="row">{{ $t }}</th>

                                        <td >

                                            <div>

                                                <a

                                                    href="{{ route('page.detail', $page->id) }}">{{ $page->page_title }}</a>

                                            </div>

                                        </td>

                                        <td @if ($page->status == 'passive')

                                            style="color:red"

                                        @else

                                            style="color:green"

                                @endif>

                                {{ $page->status }}

                                </td>

                                <td>{{ $page->name }}</td>

                                <td>{{ $page->created_at }}</td>

                                <td><a href="">Chi tiết</a></td>

                                @if (Auth::id() == $page->user_id)

                                    <td>

                                        <a href="{{ route('edit.page', $page->id) }}"

                                            class="btn btn-success btn-sm rounded-0 text-white" type="button"

                                            data-toggle="tooltip" data-placement="top" title="Edit"><i

                                                class="fa fa-edit"></i></a>

                                        @if ($status != 'trash')

                                            <a href="{{ route('delete.page', $page->id) }}"

                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"

                                                data-toggle="tooltip" data-placement="top"

                                                onclick="return confirm('Bạn có chắc muốn xóa trang này ?')"

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

                {{-- {{ $pages->appends($append)->links() }} --}}


            </div>

        </div>

    </div>

@endsection

