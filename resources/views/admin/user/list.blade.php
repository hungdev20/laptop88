@extends('layouts.admin')
@section('title', 'Danh sách user')
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

                <div class="form-search form-inline">

                    <form action="#">

                        @if ($status)

                            <input type="hidden" name="status" value="{{ $status }}">

                        @endif

                        <input type="text" name="keyword" class="form-control form-search" placeholder="Tìm kiếm"

                            value="{{ request()->input('keyword') }}">

                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">

                    </form>

                </div>

            </div>

            <div class="card-body">

                <div class="analytic">
                    <a href="{{ Request::url() }}?status=active" class="text-primary">Kích hoạt<span class="text-muted">({{ $data[0] }})</span></a>
                 
                    <a href="{{ Request::url() }}?status=trash" class="text-primary">Vô hiệu hóa<span class="text-muted">({{ $data[1] }})</span></a>


                </div>

                <form action="{{ url('admin/user/action') }}" method="POST">

                    @csrf

                    <div class="form-action form-inline py-3">

                        <select class="form-control mr-1" name="act" id="">

                            <option>Chọn</option>

                            @foreach ($act as $k => $v)

                                <option value="{{ $k }}">{{ $v }}</option>

                            @endforeach



                        </select>

                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">

                    </div>

                    <table class="table table-striped table-checkall">

                        <thead>

                            <tr>

                                <th>

                                    <input type="checkbox" name="checkall">

                                </th>

                                <th scope="col">#</th>

                                <th scope="col">Họ tên</th>

                                <th scope="col">Email</th>

                                <th scope="col">Quyền</th>

                                <th scope="col">Ngày tạo</th>

                                @if ($status != 'trash')

                                    <th scope="col">Tác vụ</th>

                                @endif



                            </tr>

                        </thead>

                        <tbody>

                            @if ($users->total() > 0)





                                @php

                                    $t = 0;

                                @endphp

                                @foreach ($users as $user)

                                    @php

                                        $t++;

                                    @endphp

                                    <tr>

                                        <td>

                                            <input type="checkbox" name="list_check[]" value="{{ $user->id }}">

                                        </td>

                                        <th scope="row">{{ $t }}</th>

                                        <td>{{ $user->name }}</td>

                                        <td>{{ $user->email }}</td>

                                        <td class="roleOfUser">
                                            @if (count($user->roles) > 0)
                                                @foreach ($user->roles as $role)
                                                    <span>{{ $role->name }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>

                                        @if ($status != 'trash')

                                            <td>

                                                <a href="{{ route('edit_user', $user->id) }}"

                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"

                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i

                                                        class="fa fa-edit"></i></a>

                                                @if (Auth::id() != $user->id)

                                                    <a href="{{ route('delete_user', $user->id) }}"

                                                        onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')"

                                                        class="btn btn-danger btn-sm rounded-0 text-white" type="button"

                                                        data-toggle="tooltip" data-placement="top" title="Delete"><i

                                                            class="fa fa-trash"></i></a>

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

                {{ $users->links() }}

            </div>

        </div>

    </div>

@endsection

