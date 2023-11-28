@extends('layouts.admin')
@section('title', 'Danh sách accounts')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách accounts</h5>
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
                    <a href="{{ Request::url() }}?status=active" class="text-primary">Đã tạo<span class="text-muted">({{ $data[1] }})</span></a>
                    <a href="{{ Request::url() }}?status=trash" class="text-primary">Thùng
                        rác<span class="text-muted">({{ $data[0] }})</span></a>
                </div>
                <form action="{{ route('accounts.action') }}" method="POST">
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
                                <th scope="col">Avatar</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Tên đăng nhập</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($accounts->total() > 0)
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($accounts as $account)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checkItem[]" value="{{ $account->id }}">
                                        </td>
                                        <td scope="row">{{ $t }}</td>
                                        <td class="tbody-thumb"><img
                                                src="{{ url('uploads/accounts/avatar/' . $account->avatar) }}" alt="">
                                        </td>
                                        <td class="fullname">{{ $account->fullname }}</td>
                                        <td class="username">{{ $account->username }}</td>
                                        <td class="email">{{ $account->email }}</td>
                                        <td class="phone_number">{{ $account->phone_number }}</td>
                                        <td class="phone_number">{{ $account->gender }}</td>
                                        <td>{{ $account->created_at }}</td>
                                        <td class="action">
                                            <a href="{{ route('edit.accounts', $account->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if ($status != 'trash')
                                                <a href="{{ route('delete.accounts', $account->id) }}"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top"
                                                    onclick="return confirm('Bạn có chắc muốn xóa tài khoản này ?')"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
                                            @endif
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
                </form>
                {{ $accounts->appends($append)->links() }}
            </div>
        </div>
    </div>
@endsection
