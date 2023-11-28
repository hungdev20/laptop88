@extends('layouts.client')
@section('title', 'Tin tức công nghệ')
@section('content')
    <div id="main-content-wp" class="container"> 
        <div class="wp-inner">
            <div id="main-content">
                @include('layouts.breadcrumb', compact('post_vertical')) 
                <div class="section images-related-tech row no-gutters">
                    <a class="main-img col-md-8 d-block" style="position: relative"
                        href="{{ route('post_detail', [$post_newest1->slug, $post_newest1->id]) }}">
                        <img src="{{ url('uploads/posts/' . $post_newest1->thumbnail) }}" alt="" class="d-block">
                        <div class="inner-text">
                            <div class="contain-text1">
                                <h1 style="font-size: 40px; line-height:67px">{{ $post_newest1->post_title }}</h1>
                            </div>
                        </div>
                    </a>
                    <div class="col-md-4 sub-images">
                        @foreach ($post_newest2 as $post_new)
                            <div class="sub-1">
                                <a href="{{ route('post_detail', [$post_new->slug, $post_new->id]) }}"
                                    class="d-block" style="width: 100%; position: relative">
                                    <img src="{{ url('uploads/posts/' . $post_new->thumbnail) }}" class="d-block"
                                        alt="">
                                        <div class="inner-text">
                                            <div class="contain-text">
                                                <h1 style="font-size: 24px; line-height:42px">{{ $post_new->post_title }}</h1>
                                            </div>
                                        </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="section post-about-pro">
                    <h2 class="box-title">
                        Tin về sản phẩm
                    </h2>
                    <ul class="post-container row my-3">
                        @foreach ($post_vertical as $post)
                            <li class=" col-lg-3 col-md-4 col-sm-6">
                                <div class="card-post">
                                    <a href="{{ route('post_detail', [$post->slug, $post->id]) }}"
                                        class="pro-thumb d-block">
                                        <img src="{{ url('uploads/posts/' . $post->thumbnail) }}" alt=""
                                            class="d-block">
                                    </a>
                                    <div class="cp-body">
                                        <a href="{{ route('post_detail', [$post->slug, $post->id]) }}"
                                            class="post-name d-block"> {{ Str::of($post->post_title)->limit(52) }}
                                        </a>
                                        <div class="other-info">
                                            <small class="date text-muted"> <i
                                                    class="fa fa-clock-o"></i>{{ $post->created_at }}</small>
                                            <div class="excerpt">
                                                {!! Str::words($post->content, 14) !!}
                                            </div>
                                        </div>
                                    </div>
                            </li>
                        @endforeach
                    </ul>
                    <div id="post-horizon">
                        @foreach ($list_posts as $item)
                            <div class="item row mb-4">
                                <div class="post-thumb col-md-4">
                                    <a href="{{ route('post_detail', [$item->slug, $item->id]) }}"
                                        class="d-block">
                                        <img src="{{ url('uploads/posts/' . $item->thumbnail) }}" alt=""
                                            class="d-block">
                                    </a>
                                </div>
                                <div class="post-content col-md-8">
                                    <a href="{{ route('post_detail', [$item->slug, $item->id]) }}"
                                        class="post-title">{{ $item->post_title }}</a>
                                    <div class="other-info">
                                        <small class="date text-muted"> <i
                                                class="fa fa-clock-o"></i>{{ $item->created_at }}</small>
                                        <div class="author">
                                            By <span>{{ $item->user->name }}</span>
                                        </div>
                                        <div class="post-excerpt">
                                            {!! Str::words($item->content, 10) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div id="pagination" class="text-center" data_id = "{{ $id }}">
                            @php
                                echo get_pagging($num_page, $page, route('posts', [$slug, $id]));
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
