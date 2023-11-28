@extends('layouts.admin')
@section('title', 'Edit setting')
@section('content')

    <div id="content" class="container-fluid">

        <div class="card">

            @if (session('status'))

                <div class="alert alert-success">

                    {{ session('status') }}

                </div>

            @endif

            <div class="card-header font-weight-bold">

                Edit Setting

            </div>

            <div class="card-body">



                <form action="{{ route('update.settings',$setting->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">

                        <label for="config_key">Config key</label>

                        <input class="form-control @error('config_key') is-invalid @enderror" type="text" name="config_key" id="config_key"
                            value="{{ $setting->config_key }}" placeholder="Nhập config key">

                        @error('config_key')

                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="config_value">Config value</label>
                        @if (request()->type === 'Text')
                            <input class="form-control @error('config_value') is-invalid @enderror" type="text" name="config_value" id="config_value"
                                value="{{ $setting->config_value }}" placeholder="Nhập config value">
                        @elseif(request()->type === 'Textarea')
                            <textarea class="form-control settings @error('config_value') is-invalid @enderror"  name="config_value" id="config_value"
                             placeholder="Nhập config value" rows="5">{{ $setting->config_value }}</textarea>
                        @endif
                        @error('config_value')

                            <small class="form-text text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>

                </form>

            </div>

        </div>

    </div>

@endsection
