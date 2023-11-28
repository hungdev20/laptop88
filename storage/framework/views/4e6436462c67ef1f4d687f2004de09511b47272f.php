<?php

use App\Parameter_pro;

use App\Parameterpro_cat;

?>



<?php $__env->startSection('title', 'Kết quả tìm kiếm'); ?>

<?php $__env->startSection('content'); ?>

    <div id="main-content-wp" class="wp-homepage">

        <div id="wp-inner" class="container">

            <div id="main-content">

                <?php if($list_products->count() == 0): ?>

                    <div id="no-productResult" style="background: #fff">

                        <div style="height: 300px; width:340px" class="d-inline-block">

                            <img class="lazyload css-jdz5ak" alt=""

                                src="<?php echo e(asset('images/glass-cute-not-found-symbol-unsuccessful.jpg')); ?>">

                        </div>

                        <div id="noResultTitle">

                            Không tìm thấy sản phẩm nào

                        </div>

                    </div>

                <?php else: ?>

                    <div id="wp-list" class="row">

                        <div id="wp-search-list" class="col-md-12">

                            <div id="head-list">

                                <div class="title">Kết quả tìm kiếm cho từ khóa '<span

                                        class="text-danger"><?php echo e($keyword); ?></span>'</div>

                            </div>

                            <ul class="wp-product d-flex flex-wrap">

                                <?php $__currentLoopData = $list_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="search-item">

                                        <div class="card-prd">

                                            <a href="<?php echo e(route('productDetail', [$product->slug, $product->id])); ?>"

                                                class="pro-thumb d-block">

                                                <img src="<?php echo e(url($product->thumbnail)); ?>" alt="" class="d-block">

                                            </a>

                                            <div class="cprd-body">

                                                <a href="<?php echo e(route('productDetail', [$product->slug, $product->id])); ?>"

                                                    class="pro-name d-block">

                                                    <?php echo e(Str::of($product->product_title)->limit(50)); ?>

                                                </a>

                                                <span

                                                    class="pro-price text-center"><?php echo e(number_format($product->price, 0, ',', '.')); ?>đ</span>



                                                <div class="text-center">

                                                    <a href="" data_id="<?php echo e($product->id); ?>"

                                                        data_uri="<?php echo e(route('cart.add')); ?>"

                                                        uri_cart_show="<?php echo e(route('cart.show')); ?>"

                                                        class="add-cart mt-2 mb-3 btn btn-outline-dark">Thêm giỏ

                                                        hàng</a>

                                                </div>

                                            </div>

                                        </div>

                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>



                            <div id="productForSearch" class="text-center">

                                <?php echo e($list_products->appends($append)->links()); ?> 

                            </div>

                        </div>



                    </div>



                <?php endif; ?>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/client/search/index.blade.php ENDPATH**/ ?>