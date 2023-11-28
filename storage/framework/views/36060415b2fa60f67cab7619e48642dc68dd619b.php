
<?php $__env->startSection('title', 'Thiết bị điện tử chất lượng cao'); ?>
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="wp-homepage">
        <div id="wp-inner" class="container">
            <div id="main-content">
                <div class="section" id="wp-main">
                    <div class="ha-col-1" id="main-menu">
                    </div>
                    <div class="ha-col-3 row no-gutters" id="main-advert">
                        <?php if(count($sliders) > 0): ?>


                            <div id="wp-slider" class="col-md-12 col-xl-9">
                                <div class="carousel slide carousel-fade" id="home-slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="carousel-item <?php if($slider->order == 1): ?>
                                            active
                                        <?php endif; ?>"
                                                data-interval="4000">
                                                <img src="<?php echo e(url('uploads/sliders/' . $slider->images)); ?>"
                                                    alt="<?php echo e($slider->slider_title); ?>" class="d-block w-100">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    
                                    <a href="#home-slide" class="carousel-control-prev" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a href="#home-slide" class="carousel-control-next" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                    <ol class="carousel-indicators">
                                        <li data-target="#home-slide" data-slide-to="0"></li>
                                        <li data-target="#home-slide" data-slide-to="1"></li>
                                        <li data-target="#home-slide" data-slide-to="2"></li>
                                        <li data-target="#home-slide" data-slide-to="3"></li>
                                    </ol>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(count($banners) > 0): ?>
                            <div id="wp-banner" class="col-xl-3">
                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="" class="sub-img-advert first d-block">
                                        <img src="<?php echo e(url('uploads/medias/' . $banner->images)); ?>" class="d-block rounded"
                                            alt="<?php echo e($banner->media_title); ?>">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(!empty($banner_under_slider)): ?>
                    <div class="section  justify-space-between wow" id="banner-under-slider">
                        <?php $__currentLoopData = $banner_under_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner_us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($banner_us->link); ?>" class="d-block"><img
                                    src="<?php echo e(url('uploads/medias/' . $banner_us->images)); ?>" alt=""
                                    title="<?php echo $banner_us->description; ?>"></a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($laptop)): ?>
                    <div class="section laptop box-pro-container wow bounceInUp">
                        <div class="box-title-container">
                            <h2 class="box-title">
                                Máy tính xách tay - Laptop
                            </h2>
                        </div>
                        <ul class="product-container row mt-3">
                            <?php $__currentLoopData = $laptop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemLap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="col-md-3">
                                    <div class="card-prd">
                                        <a href="<?php echo e(route('productDetail', [$itemLap->slug, $itemLap->id])); ?>"
                                            class="pro-thumb d-block">
                                            <img src="<?php echo e(url($itemLap->thumbnail)); ?>" alt="" class="d-block">
                                        </a>
                                        <div class="cprd-body">
                                            <a href="<?php echo e(route('productDetail', [$itemLap->slug, $itemLap->id])); ?>"
                                                class="pro-name d-block">
                                                <?php echo e(Str::of($itemLap->product_title)->limit(50)); ?> </a>
                                            <span
                                                class="pro-price text-center"><?php echo e(number_format($itemLap->price, 0, ',', '.')); ?>đ</span>
                                            <div class="clearfix">
                                                <a href="" data_id="<?php echo e($itemLap->id); ?>"
                                                    data_uri="<?php echo e(route('cart.add')); ?>"
                                                    uri_cart_show="<?php echo e(route('cart.show')); ?>"
                                                    class="add-cart fl-left mt-2 mb-3 btn btn-outline-dark">Thêm giỏ
                                                    hàng</a>
                                                <a href="<?php echo e(route('cart.addNormal', $itemLap->id)); ?>"
                                                    class="buy-now fl-right mt-2 mb-3 btn btn-outline-danger">Mua
                                                    ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="text-center mt-3">
                            <a href="<?php echo e(route('productCat', ['laptop', 50])); ?>" class="view-all d-inline-block">Xem tất
                                cả sản phẩm</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($blogs)): ?>
                    <div class="section news wow bounceInUp">
                        <h1 class="mb-3 news-title">Tin tức công nghệ</h1>
                        <ul class="owl-carousel owl-loaded">
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="card-post">
                                        <a href="<?php echo e(route('post_detail', [$blog->slug, $blog->id])); ?>"
                                            class="news-thumb d-block">
                                            <img src="<?php echo e(url('uploads/posts/' . $blog->thumbnail)); ?>" alt=""
                                                class="d-block">
                                        </a>
                                        <div class="news-body">
                                            <a href="<?php echo e(route('post_detail', [$blog->slug, $blog->id])); ?>"
                                                class="news-name d-block"><?php echo e(Str::of($blog->post_title)->limit(65)); ?></a>
                                            <span class="d-inline-block date"><?php echo e($blog->created_at); ?></span>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\TungHaiPc\resources\views/client/home/index.blade.php ENDPATH**/ ?>