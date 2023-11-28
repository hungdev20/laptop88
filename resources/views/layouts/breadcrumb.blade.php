@php

use App\Product_cat;

@endphp

<nav aria-label="breadcrumb" style="padding-top: 20px">

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>

        @if (!empty($slugLastCat))

            @php
                
                $parent_id = Product_cat::find($id)->parent_id;
                
                $all = Product_cat::all();
                
                $groupId = array_reverse(find_parentId($all, $parent_id));
                
            @endphp

            @if (!empty($groupId))

                @foreach ($groupId as $id1)

                    @php
                        
                        $productCat = Product_cat::find($id1);
                        
                        $parentTitle = $productCat->cat_title;
                        
                        $slug = $productCat->slug;
                        
                    @endphp

                    <li class="breadcrumb-item"><a
                            href="{{ route('productCat', [$slug, $id1]) }}">{{ $parentTitle }}</a>

                    </li>

                @endforeach

            @endif

            <li class="breadcrumb-item"><a
                    href="{{ route('productCat', [$slugLastCat, $id]) }}">{{ $productCatTitle }}</a></li>

            @if (!empty($productDetail))

                <li class="breadcrumb-item"><a
                        href="{{ route('productDetail', [$productDetail->slug, $productDetail->id]) }}">{{ $productDetail->product_title }}</a>

                </li>

            @endif

        @elseif (!empty($page_info))

            <li class="breadcrumb-item"><a
                    href="{{ route('pages', [$page_info->slug, $id]) }}">{{ $page_info->page_title }}</a>

            </li>

        @elseif (!empty($post_vertical))

            <li class="breadcrumb-item"><a href="">Tin tức công nghệ</a>

            </li>

            @if (!empty($post_info))

                <li class="breadcrumb-item"><a
                        href="{{ route('post_detail', [$post_info->slug, $post_info->id]) }}">{{ $post_info->post_title }}</a>

                </li>

            @endif
        @elseif (!empty($provinces))
            <li class="breadcrumb-item"><a href="thanh-toan">Thanh toán</a>
        @endif



    </ol>

</nav>
