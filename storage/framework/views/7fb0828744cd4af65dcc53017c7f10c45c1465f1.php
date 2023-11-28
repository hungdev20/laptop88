

<?php $__env->startSection('title', $productDetail->product_title); ?>

<?php $__env->startSection('content'); ?>

    <div id="main-content-wp" class="wp-homepage">

        <div id="wp-inner" class="container">

            <?php echo $__env->make('layouts.breadcrumb', compact('productDetail', 'id', 'slugLastCat', 'productCatTitle'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-content pt-4">

                <form action="<?php echo e(route('cart.addNormal', $productDetail->id)); ?>" method="POST">

                    <?php echo csrf_field(); ?>

                    <div class="section" id="detail-product-wp">

                        <div class="section-detail clearfix box-left">

                            <div class="thumb-wp fl-left">

                                <a href="" title="" id="main-thumb">

                                    <img style="cursor: pointer;" src="<?php echo e(url($productDetail->thumbnail)); ?>"
                                        id="main-thumb" />

                                </a>

                                <div id="list-thumb" class="owl-carousel owl-loaded">

                                    <?php $__currentLoopData = $subImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <img style="cursor: pointer;"
                                            src="<?php echo e(url('uploads/products/subImages/' . $image->path_img)); ?>"
                                            class="product_thumb" />

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>

                                <div class="box-banner-sis" style="margin-top: 10px">

                                    <img src="<?php echo e(asset('client/images/gif-400x100.png')); ?>" alt=""
                                        title="Khai trương giàn hàng samsung">

                                </div>

                            </div>

                            <div class="info fl-right">

                                <h3 class="product-name"><?php echo e($productDetail->product_title); ?></h3>

                                <div class="extra-info">

                                    <div class="pro-code" style="margin-bottom:5px">

                                        Mã sản phẩm: <strong><?php echo e($productDetail->code); ?></strong>

                                    </div>

                                </div>

                                <div class="pro_qty">

                                    <span class="title">Số lượng: </span>

                                    <span
                                        class="qty"><?php echo e($productDetail->qty - $productDetail->products_sold); ?></span>

                                </div>

                                <div class="num-product">

                                    <span class="title">Sản phẩm: </span>

                                    <?php if($productDetail->qty - $productDetail->products_sold > 0): ?>

                                        <span class="status" style="background: #3ef06d">Còn hàng</span>

                                    <?php else: ?>

                                        <span class="status">Hết hàng</span>

                                    <?php endif; ?>

                                </div>

                                <p class="price"><?php echo e(number_format($productDetail->price, 0, ',', '.')); ?>đ</p>

                                <div id="num-order-wp">

                                    <a title="" id="minus"><i class="fa fa-minus"></i></a>

                                    <input type="text" name="num_order"
                                        data_qty="<?php echo e($productDetail->qty - $productDetail->products_sold); ?>" value="1"
                                        id="num-order">

                                    <a title="" id="plus"><i class="fa fa-plus"></i></a>

                                </div>

                                <?php if(!empty($productDetail->special_offer)): ?>

                                    <div class="pro-special-offer-container">

                                        <div class="spec-title d-flex align-items-center justify-content-between">

                                            <div class="spec-price font-weight-bold">

                                                KHUYẾN MẠI

                                            </div>



                                        </div>



                                        <?php echo $productDetail->special_offer; ?>




                                    </div>

                                <?php endif; ?>

                                <div class="box-action-button">

                                    <button class="action-button buy-now button-red">

                                        <strong>Mua ngay</strong>

                                        <span>(Giao tận nơi hoặc lấy tại cửa hàng)</span>

                                    </button>

                                    <div class="form-group">

                                        <div class="group-button d-flex">

                                            <div class="button1">

                                                <a href="" class="action-button buy-now button-blue">

                                                    <strong>Mua trả góp</strong>

                                                    <span>(Thủ tục đơn giản)</span>

                                                </a>

                                            </div>



                                            <div class="button2">

                                                <a data_id="<?php echo e($productDetail->id); ?>"
                                                    data_uri="<?php echo e(route('cart.add')); ?>"
                                                    uri_cart_show="<?php echo e(route('cart.show')); ?>" name="add-cart"
                                                    class="action-button button-blue add-cart" <?php if($productDetail->qty - $productDetail->products_sold > 0): ?>



                                                <?php else: ?>

                                                    disabled ='disabled'

                                                    <?php endif; ?>>

                                                    <strong>Thêm giỏ hàng</strong>

                                                    <span>Mua tiếp sản phẩm</span>

                                                </a>

                                            </div>



                                        </div>

                                    </div>



                                </div>



                            </div>

                        </div>

                        <div class="box-right sell-policy">

                            <div class="inner-box">

                                <div class="card-body">

                                    <div class="ha-policy1">

                                        <div class="ha-sell__policy">

                                            Chính sách bán hàng

                                        </div>

                                        <div class="ha-sell-policy-item">

                                            <i class="far fa-shield-check"></i>

                                            <div class="text">Cam kết hàng chính hãng 100%</div>

                                        </div>

                                        <div class="ha-sell-policy-item">

                                            <i class="fas fa-exchange-alt"></i>

                                            <div class="text">Đổi trả miễn phí trong 10 ngày</div>

                                        </div>

                                        <div class="ha-sell-policy-item">

                                            <i class="far fa-gift"></i>

                                            <div class="text">Mua hàng lần hai sẽ nhận được ưu đãi từ cửa hàng

                                            </div>

                                        </div>

                                    </div>

                                    <div class="ha-policy2">

                                        <div class="ha-sell__policy">

                                            Dịch vụ khác

                                        </div>

                                        <div class="ha-sell-policy-item">

                                            <i class="fas fa-laptop"></i>

                                            <div class="text">Vệ sinh máy tính, Laptop</div>

                                        </div>

                                        <div class="ha-sell-policy-item">

                                            <i class="far fa-shield-check"></i>

                                            <div class="text">Bảo hành tại nhà

                                            </div>

                                        </div>

                                    </div>


                                </div>

                            </div>
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0"
                                                        nonce="1izPgzNb"></script>

                            <div class="fb-share-button" data-href="<?php echo e($url_canonical); ?>"
                                data-layout="box_count" data-size="small"><a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($url_canonical); ?>"
                                    class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

                        </div>

                    </div>

                </form>

                <div class="d-flex" id="under_info_about_pro">

                    <div id="nav_product">

                        <nav style=" margin-top: 30px; font-size: 18px" id="info_about_product">

                            <div class="nav nav-tabs">

                                <a href="#tab-content-1" class="nav-item nav-link active" data-toggle="tab">Đánh

                                    giá</a>

                                <a href="#tab-content-2" class="nav-item nav-link" data-toggle="tab">Mô tả sản

                                    phẩm</a>

                            </div>

                        </nav>

                        <div class="tab-content">

                            <div class="tab-pane show fade active" id="tab-content-1">

                                <div>

                                    <div class="rating_product" style="background: #fff; max-width:100%; padding:10px">

                                        <div class="row">

                                            <div class="info-related_pro col-12 d-flex">

                                                <div class="creator">

                                                    <i class="fas fa-user"></i>

                                                    <span><?php echo e($productDetail->user->name); ?></span>

                                                </div>

                                                <div class="day_created">

                                                    <i class="far fa-calendar"></i>

                                                    <span><?php echo e($productDetail->created_at); ?></span>

                                                </div>

                                            </div>

                                            <div class="real_rate col-12">

                                                <span class="near_round_rating">Có

                                                    <strong><?php echo e($near_round_rating); ?></strong> trên

                                                    5</span>

                                                <ul class="list-inline real_rating">

                                                    <?php for($count = 1; $count <= 5; $count++): ?>

                                                        <?php
                                                            
                                                            if ($count <= $rating) {
                                                                $color = 'color:#F59E0B';
                                                            } else {
                                                                $color = 'color:#707070';
                                                            }
                                                            
                                                        ?>



                                                        <li class="real_rating"
                                                            style="cursor: pointer; font-size:30px; margin-right:5px; <?php echo e($color); ?>"
                                                            title="real_rating">

                                                            &#9733;</li>

                                                    <?php endfor; ?>



                                                </ul>



                                            </div>

                                            <div class="inner-rating col-12">

                                                <h3 style="font-size: 25px">Đánh giá sản phẩm</h3>



                                                <ul class="list-inline rating" data_uri="<?php echo e(route('ratingProAjax')); ?>"
                                                    data_product_id="<?php echo e($productDetail->id); ?>">

                                                    <?php for($count = 1; $count <= 5; $count++): ?>



                                                        <li class="rating"
                                                            id="<?php echo e($productDetail->id); ?>-<?php echo e($count); ?>"
                                                            data_index="<?php echo e($count); ?>"
                                                            data_product_id="<?php echo e($productDetail->id); ?>"
                                                            data_rating="<?php echo e($rating); ?>"
                                                            style="cursor: pointer; font-size:30px; margin-right:5px;"
                                                            title="star_rating">

                                                            &#9733;</li>

                                                    <?php endfor; ?>



                                                </ul>

                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Họ và tên">

                                                <textarea name="content_rate" id="content_rate" class="form-control"
                                                    cols="30" rows="10" placeholder="Nội dung"></textarea>

                                                <button type="submit" name="add_rate" class="btn btn-success add_rate mt-2"
                                                    data_uri="<?php echo e(route('addRateAjax')); ?>">Submit</button>



                                            </div>

                                            <div class="all_rating col-12">

                                                <?php $__currentLoopData = $allRating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <div class="ha-product-rating d-flex">

                                                        <img src="<?php echo e(asset('client/images/noavatar.png')); ?>"
                                                            class="ha-product-rating-ava">

                                                        <div class="ha-product-rating-main">

                                                            <strong class="ha-product-rating-name"
                                                                style="margin-bottom: 3px; display:inline-block"><?php echo e($item->name); ?></strong>

                                                            <div class="time">

                                                                <small class="date"
                                                                    style="color: black; margin-bottom: 5px; display: inline-block">

                                                                    <i class="far fa-clock"
                                                                        style="padding-right: 3px; display:inline-block"></i><?php echo e($item->created_at); ?></small>

                                                            </div>

                                                            <div class="d-flex">

                                                                <strong
                                                                    style="font-size: 16px; font-family: Sans-serif; margin-right: 3px">Đánh

                                                                    giá: </strong>

                                                                <ul class="repeat-purchase-con d-flex">

                                                                    <?php for($count = 1; $count <= 5; $count++): ?>



                                                                        <?php
                                                                            
                                                                            if ($count <= $item->rating) {
                                                                                $color = 'color:#F59E0B';
                                                                            } else {
                                                                                $color = 'color:#707070';
                                                                            }
                                                                            
                                                                        ?>

                                                                        <li class="ratingOfCust"
                                                                            style="cursor: pointer; font-size:18px; margin-right:5px; <?php echo e($color); ?>"
                                                                            title="ratingOfCust">

                                                                            &#9733;</li>

                                                                    <?php endfor; ?>





                                                                </ul>

                                                            </div>

                                                            <div class="d-flex">

                                                                <strong
                                                                    style="font-size: 16px; font-family: Sans-serif; margin-right: 3px">Nhận

                                                                    xét: </strong>



                                                                <div class="ha-product-rating-content">

                                                                    <?php echo e($item->content); ?>


                                                                </div>

                                                            </div>

                                                        </div>



                                                    </div>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>

                                        </div>

                                    </div>



                                </div>

                                

                            </div>

                            <div class="tab-pane show fade" id="tab-content-2">

                                <div class="section" id="content-product-wp">

                                    <div class="section-detail">

                                        <?php echo $productDetail->description; ?>


                                    </div>

                                    <div class="text-center">

                                        <a href="javascript:void()" class="readmore-btn">Đọc thêm</a>

                                    </div>

                                </div>

                            </div>

                        </div>



                    </div>

                    <div id="block-info">

                        <div class="block-technical-info">

                            <div class="box-title">

                                <h2 class="box-title__title">Thông số kỹ thuật</h2>

                            </div>

                            <div class="box-content">

                                <div class="inner-info">

                                    <?php echo $productDetail->intro; ?>


                                </div>

                                <div class="text-center">

                                    <a href="javascript:void()" class="readmore-tech-info">Xem thêm cấu hình chi tiết</a>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>


                <?php if($sameCategory->count() > 0): ?>


                    <div class="section" id="same-category-wp" style="padding-bottom: 30px">

                        <div class="section-head">

                            <h3 class="section-title">Cùng chuyên mục</h3>

                        </div>

                        <div class="section-detail">

                            <ul class="list-item">
                                <?php $__currentLoopData = $sameCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemPro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li>
                                        <a href="<?php echo e(route('productDetail', [$itemPro->slug, $itemPro->id])); ?>" title=""
                                            class="thumb d-block">

                                            <img src="<?php echo e(url($itemPro->thumbnail)); ?>">

                                        </a>

                                        <a href="<?php echo e(route('productDetail', [$itemPro->slug, $itemPro->id])); ?>" title=""
                                            class="product-name"><?php echo e(Str::of($itemPro->product_title)->limit(50)); ?></a>

                                        <div class="price">

                                            <span
                                                class="new"><?php echo e(number_format($itemPro->price, 0, ',', '.')); ?>đ</span>

                                        </div>

                                        <div class="action text-center">
                                            <a href="" data_id="<?php echo e($itemPro->id); ?>" data_uri="<?php echo e(route('cart.add')); ?>"
                                                uri_cart_show="<?php echo e(route('cart.show')); ?>" title=""
                                                class="add-cart btn btn-outline-dark d-inline-block">Thêm
                                                giỏ
                                                hàng</a>
                                        </div>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>

                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>

    <script>
        $('.readmore-btn').on('click', function() {

            $(this).parents('div#content-product-wp').toggleClass('showContent');

            var replaceText = $(this).parents('div#content-product-wp').hasClass("showContent") ? "Ẩn bớt" :

                "Đọc thêm";

            $(this).text(replaceText);

        })

        $('.readmore-tech-info').on('click', function() {

            $(this).parents('div.box-content').toggleClass('showContent');

            var replaceText = $(this).parents('div.box-content').hasClass("showContent") ? "Ẩn bớt" :

                "Xem thêm cấu hình chi tiết";

            $(this).text(replaceText);

        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh\resources\views/client/product/index.blade.php ENDPATH**/ ?>