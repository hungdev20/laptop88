@extends('layouts.admin')
@section('title', 'Cập nhật tài khoản')
@section('content')

    <div id="content" class="container-fluid">

        <div class="card">

            @if (session('status'))
                <div class="alert alert-success">

                    {{ session('status') }}

                </div>
            @endif

            <div class="card-header font-weight-bold">

                Cập nhật tài khoản

            </div>

            <div class="card-body">



                <form action="{{ route('update.accounts', $account_info->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">

                        <label for="fullname">Họ và tên</label>

                        <input class="form-control" type="text" name="fullname" id="fullname"
                            value="{{ $account_info->fullname }}">

                        @error('fullname')
                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="username">username</label>

                        <input type="text" class="form-control" name="username" id="username"
                            value="{{ $account_info->username }}">

                        @error('username')
                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="email">Email</label>

                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ $account_info->email }}">

                        @error('email')
                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" id="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in hoa</small>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Xác nhận mật khẩu</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password-confirm">
                    </div>

                    <div class="form-group">

                        <label for="phone_number" class="d-block">Số điện thoại</label>

                        <input type="tel" class="" name="phone_number" id="phone_number"
                            value="{{ $account_info->phone_number }}">

                        @error('phone_number')
                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label>Avatar</label>

                        <div id="uploadFile">

                            <input type="file" name="avatar" id="upload-slider">

                            @error('avatar')
                                <small class="form-text text-danger">

                                    {{ $message }}

                                </small>
                            @enderror
                        </div>
                        @if (!empty($account_info->avatar))
                            <div class="mt-1" id="avatar" style="width:200px">

                                <img src="{{ url('uploads/accounts/avatar/' . $account_info->avatar) }}"
                                    class="img img-responsive" alt="">

                            </div>
                        @endif

                    </div>

                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male"
                            @if ($account_info->gender == 'male') checked @endif>

                        <label class="form-check-label" for="exampleRadios1">

                            Nam

                        </label>

                    </div>

                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female"
                            @if ($account_info->gender == 'female') checked @endif>

                        <label class="form-check-label" for="exampleRadios2">

                            Nữ

                        </label>

                    </div>

                    @error('gender')
                        <small class="form-text text-danger">

                            {{ $message }}

                        </small>
                    @enderror

                    <button type="submit" name="btn_add" class="btn btn-primary">Cập nhật</button>

                </form>

            </div>

        </div>

    </div>

@endsection
