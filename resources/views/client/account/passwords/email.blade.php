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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="" method="POST" id="form-login">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i></label>
                            <input type="text" name="email" id="email" placeholder="email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" name="resetPass" value="resetPass"
                            class="btn btn-primary form-control resetPass">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
