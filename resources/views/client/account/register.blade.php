<!DOCTYPE html>

<html lang="en">

@extends('layouts.client')

@section('title', 'Đăng ký tài khoản')

@section('content')

    <div id="main-content-wp">

        <div id="wrapper">



            <div class="signup-content" style="text-align: center">

                <div class="signup-form text-left" style="display: inline-block ">

                    <h2 style="text-align: center">Đăng ký</h2>

                    <form action="{{ url('user/store') }}" method="POST" id="form-register">

                        @csrf

                        <div class="form-group">

                            <label for="fullname"><i class="fas fa-user-tie"></i></label>

                            <input type="text" name="fullname" id="fullname" placeholder="Họ và tên" value="{{ request()->old('fullname') }}">

                            @error('fullname')

                                <small class="text-danger">{{ $message }}</small>

                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="username"><i class="fas fa-user"></i></label>

                            <input type="text" name="username" id="username" placeholder="Tên đăng nhập" value="{{ request()->old('username') }}">

                            @error('username')

                                <small class="text-danger">{{ $message }}</small>

                            @enderror

                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự</small>

                        </div>

                        <div class="form-group">

                            <label for="email"><i class="fas fa-envelope"></i></label>

                            <input type="text" name="email" id="email" placeholder="email" value="{{ request()->old('email') }}">

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

                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in hoa</small>

                        </div>

                        <div class="form-group">

                            <label for="password-confirm"><i class="far fa-lock-alt"></i></label>

                            <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu"

                                id="password-confirm">

                        </div>

                        <div class="form-group">

                            <label for="phone_number"><i class="fas fa-phone"></i></label>

                            <input type="text" name="phone_number" placeholder="Số điện thoại" id="phone_number" value="{{ request()->old('phone_number') }}">

                            @error('phone_number')

                                <small class="text-danger">{{ $message }}</small>

                            @enderror

                        </div>

                        {{-- <div class="form-group"> --}}



                        {{-- </div> --}}

                        <div class="form-group mb-2">

                            <input type="radio" name="gender" class="agree-term form-check-input" checked

                                style="margin-left: 0" id="male" value="male">

                            <label for="male" class="form-check-label agree-label" style="margin-left: 20px">Nam</label>

                            <br>

                            <input type="radio" name="gender" class="agree-term form-check-input" id="female" value="female"

                                style="margin-left: 0">

                            <label for="female" class="form-check-label agree-label" style="margin-left: 20px">Nữ</label>

                        </div>



                        <button type="submit" name="btn-regis" value="Đăng ký" class="btn btn-primary">Đăng ký</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

 {{-- <div id="footer-wp">

                <div id="foot-body">

                    <div class="wp-inner container clearfix">

                        <div class="block" id="info-company">

                            <h3 class="title">Thông tin chung</h3>

                            <ul class="list-item">

                                <li>

                                    <div class="d-flex icon">

                                        <a class="">Giới thiệu HA shop</a>

                                    </div>

                                </li>

                                <li>

                                    <div class="

                                            d-flex icon">



                                            <a class="">Tin tức</a>

                                    </div>

                                </li>

                                <li>

                                    <div class="

                                                d-flex icon">



                                                <a class="">Liên hệ, góp ý</a>

                                    </div>

                                </li>

                                <li>

                                    <div class="

                                                    d-flex icon">



                                                    <a class="">Liên hệ</a>

                                    </div>

                                </li>

                            </ul>

                        </div>

                        <div class="

                                                        block menu-ft" id="info-shop">

                                                        <h3 class="title">Thông tin cửa hàng</h3>

                                                        <ul class="list-item">

                                                            <li>

                                                                <div class="d-flex icon">

                                                                    <i class="fas fa-map-marker-alt"></i>

                                                                    <p class="">Đồng Ích, Lập Thạch, Vĩnh Phúc</p>

                                    </div>

                                </li>

                                <li>

                                    <div class="

                                                                        d-flex icon">

                                                                        <i class="fas fa-phone-alt"></i>

                                                                    <p class="">0399809781</p>

                                    </div>

                                </li>

                                <li>

                                    <div class="

                                                                        d-flex icon">

                                                                        <i class="fas fa-envelope"></i>

                                                                    <p class="">nguyenmanhhung201102@gmail.com</p>

                                    </div>

                                </li>

                            </ul>

                        </div>

                        <div class="

                                                                        block menu-ft policy" id="info-shop">

                                                                    <h3 class="title">Chính sách mua hàng</h3>

                                                                    <ul class="list-item">

                                                                        <li>

                                                                            <a href="trang/doi-tra-mien-phi-1"

                                                                                title="">Đổi trả miễn phí</a>

                                                                        </li>

                                                                        <li>

                                                                            <a href="trang/mien-phi-van-chuyen-2"

                                                                                title="">Miễn phí vận chuyển</a>

                                                                        </li>

                                                                        <li>

                                                                            <a href="trang/huong-dan-mua-hang-online-3"

                                                                                title="">Hướng dẫn mua hàng online</a>

                                                                        </li>

                                                                        <li>

                                                                            <a href="trang/huong-dan-mua-tra-gop-4"

                                                                                title="">Hướng dẫn mua trả góp</a>

                                                                        </li>

                                                                    </ul>

                                                                </div>

                                                                <div class="block" id="newfeed">

                                                                    <h3 class="title">Bảng tin</h3>

                                                                    <p class="desc">Đăng ký với chung tôi để

                                                                        nhận được thông tin ưu

                                                                        đãi

                                                                        sớm nhất</p>

                                                                    <div id="form-reg">

                                                                        <form method="" action="">

                                                                            <input type="email" name="email" id="email"

                                                                                placeholder="Nhập email tại đây">

                                                                            <button type="submit" id="sm-reg">Đăng

                                                                                ký</button>

                                                                        </form>

                                                                    </div>

                                                                </div>

                                    </div>

                        </div>

                        <div id="foot-bot">

                            <div class="wp-inner">

                                <p id="copyright">© Bản quyền thuộc về HA SHOP</p>

                            </div>

                        </div>

                    </div>

                </div> --}}

