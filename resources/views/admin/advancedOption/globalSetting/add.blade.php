@extends('layouts.admin')
@section('title', 'Global Setting')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold">
                Global Setting
            </div>
            <div class="card-body">
                <form action="{{ route('globalSetting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="header">HEADER SCRIPTS</label>
                        <textarea name="header" class="form-control globalSetting" id="header" cols="30" rows="10">@if (!empty($scriptHead))
                                {{ $scriptHead }}
                            @endif</textarea>
                        <small class="form-text text-muted">
                            Add custom scripts inside HEAD tag. You need to have script tag around scripts
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="header">FOOTER SCRIPTS</label>
                        <textarea name="footer" class="form-control globalSetting" id="footer" cols="30" rows="10">@if (!empty($scriptFooter))
                            {{ $scriptFooter }}
                        @endif</textarea>

                        <small class="form-text text-muted">
                            Add custom scripts you might want to be loaded in the footer of your website. You need to have script tag around scripts
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="header">BODY SCRIPTS - TOP</label>
                        <textarea name="bodyTop" class="form-control globalSetting" id="bodyTop" cols="30" rows="10">@if (!empty($scriptBodyTop))
                            {{ $scriptBodyTop }}
                        @endif</textarea>

                        <small class="form-text text-muted">
                            Add custom scripts just after the BODY tag opened. You need to have script tag around scripts
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="header">BODY SCRIPTS - BOTTOM</label>
                        <textarea name="bodyBottom" class="form-control globalSetting" id="bodyBottom" cols="30" rows="10">@if (!empty($scriptBottom))
                            {{ $scriptBodyBottom }}
                        @endif</textarea>

                        <small class="form-text text-muted">
                            Add custom scripts just before the BODY tag closed. You need to have script tag around scripts
                        </small>

                    </div>
                    <button type="submit" name="btn_add" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
