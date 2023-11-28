@extends('layouts.account')
@section('title', 'Thông tin cá nhân')
@section('inner_info')
    <div class="inf120">
        <div class="hinfo">
            <h1>Hồ sơ của tôi</h1>
            <span style="font-size: 16px">Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
        </div>
        <div class="binfo">
            <form action="{{ route('update.profile') }}" method="POST" class="row"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-8 left-info">
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="username">Tên đăng nhập</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="username" id="username"
                                value="{{ $user_info->username }}">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="fullname">Họ và tên</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                value="{{ $user_info->fullname }}">
                            @error('fullname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-8">
                            <span>{{ $user_info->email }}</span>
                        </div>
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="phone_number">Số điện thoại</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="phone_number" class="form-control" id="phone_number"
                                value="{{ $user_info->phone_number }}">
                            @error('phone_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="gender">Giới tính</label>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4">
                                    <input type="radio" id="male" @if ($user_info->gender == 'male')
                                    checked
                                    @endif name="gender" value="male">
                                    <label for="male">Nam</label>
                                </div>
                                <div class="col-4">
                                    <input type="radio" id="female" @if ($user_info->gender == 'female')
                                    checked
                                    @endif name="gender" value="female" >
                                    <label for="female">Nữ</label>
                                </div>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                        </div>
                        <div class="col-8">
                            <button type="submit" name="save_info" class="btn btn-primary save_info">Lưu</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 right-info">
                    <div class="edit_img">
                        <div class="img_avatar" style="width: 65px; ">
                            @if ($user_info->avatar == '')
                                <img src="{{ asset('client/images/avatar_default.jpg') }}" alt="" class="img-fluid">
                            @else
                                <img src="{{ url('uploads/accounts/avatar/' . $user_info->avatar) }}" alt=""
                                    class="img-fluid">
                            @endif
                        </div>
                        <div class="choose_img">
                            <input type="file" name="file" class="mt-3" id="file">
                            <br>
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
