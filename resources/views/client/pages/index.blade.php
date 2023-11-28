@extends('layouts.client')
@section('title', $page_info->page_title)
@section('content')
    <div id="main-content-wp">
        <div id="wrapper"> 
            @include('layouts.breadcrumb', compact('page_info', 'id'))
            <div id="main-content">
                <div id="page-info">
                    <div class="page-title">
                        <h1>{{ $page_info->page_title }}</h1>
                    </div>
                    <div id="content">
                        {!! $page_info->content !!}                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
