<!DOCTYPE html>
<html lang="en">

@extends('layouts.client')
@section('title', 'Đăng nhập tài khoản')
@section('content')
    <div id="main-content-wp" style="background: #f7f7f7">
        <div id="wrapper">

            <div class="login-content" style="text-align: center">
                <div class="login-form" style="display: inline-block">
                    <h2>Đăng Nhập</h2>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ url('user/checkLogin') }}" method="POST" id="form-login">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="fas fa-user"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email"
                                value="{{ request()->old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock-alt"></i></label>

                            <input type="password" name="password" id="password" placeholder="Mật khẩu">
                            <div class="eye">
                                <i class="far fa-eye"></i>
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in
                                hoa</small>
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control-checkbox mb-0"><span class="caption">Remember me</span>
                                <input type="checkbox" class="rmb_me" name="rmb_me" value="ok">

                            </label>
                            <span class="ml-auto"><a href="{{ url('resetpass') }}" class="forgot-pass">Quên Mật
                                    Khẩu?</a></span>
                        </div>
                        <div class="d-flex mb-2 align-items-center">
                            <span class="mx-auto" style="font-size: 18px">Bạn Chưa Có Tài Khoản? <a
                                    href="{{ route('account_register') }}" id="hover-reg" class="forgot-pass">Đăng
                                    Ký</a></span>
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            <span class="mx-auto" style="font-size: 18px">Trở Về Trang Chủ <a
                                    href="{{ url('/') }}" id="hover-home" class="forgot-pass">Trang
                                    Chủ</a></span>
                        </div>
                        <button type="submit" name="btn-login" value="Đăng nhập"
                            class="btn btn-primary form-control btn-login">Đăng Nhập</button>
                    </form>
                </div>
                {{-- <div class="signup-image">

                </div> --}}
            </div>
        </div>
    </div>
@endsection
