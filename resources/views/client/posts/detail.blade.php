@extends('layouts.client')
@section('title', $post_info->post_title)
@section('content')
    <div id="main-content-wp" class="wp-homepage">
        <div id="wrapper">
            @include('layouts.breadcrumb', compact('post_info', 'post_vertical'))
            <div id="main-content">
                <div id="detail-post" class="pb-3">
                    <div id="post-title">
                        <h1>{{ $post_info->post_title }}</h1>
                    </div>
                    <small class="date text-muted"> <i class="fa fa-clock-o"></i>{{ $post_info->created_at }}</small>
                    <div id="content">
                       {!! $post_info->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
