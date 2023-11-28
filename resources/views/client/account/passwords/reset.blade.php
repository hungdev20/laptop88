<!DOCTYPE html>
<html lang="en">

@extends('layouts.client')
@section('title', 'Đổi mật khẩu')
@section('content')
    <div id="main-content-wp" style="background: #f7f7f7">
        <div id="wrapper">

            <div class="login-content">
                <div class="login-form mx-auto">
                    <h2 class="text-center">Reset Password</h2>
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <form action="" method="POST" id="form-login">
                        @csrf
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock-alt"></i></label>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in hoa</small>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="far fa-lock-alt"></i></label>
                            <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu"
                                id="password-confirm">
                        </div>
                        <button type="submit" name="changePass" value="resetPass"
                            class="btn btn-primary form-control resetPass">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
