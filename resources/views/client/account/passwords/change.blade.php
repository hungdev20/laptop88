@extends('layouts.account')
@section('title', 'Đổi mật khẩu')
@section('inner_info')
    <div id="main-content-wp">
        <div id="wrapper">
            <div class="login-content">
                <div class="login-form mx-auto">
                    <h2 class="text-center">Đổi mật khẩu</h2>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="" method="POST" id="form-login">
                        @csrf
                        <div class="form-group">
                            <label for="old_password"><i class="fas fa-lock-alt"></i></label>
                            <input type="password" name="old_password" id="old_password" placeholder="Mật khẩu cũ">
                            @error('old_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in
                                hoa</small>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock-alt"></i></label>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu mới">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in
                                hoa</small>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="far fa-lock-alt"></i></label>
                            <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu"
                                id="password-confirm">
                        </div>
                        <button type="submit" name="changeNewPass" value="resetPass"
                            class="btn btn-primary form-control resetPass">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
