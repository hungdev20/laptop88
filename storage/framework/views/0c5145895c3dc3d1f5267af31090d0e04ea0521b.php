
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header p-3 font-weight-bold justify-content-between align-items-center">
                <h5 class="m-0 ">Chi tiết sản phẩm</h5>
            </div>
            <div class="card-body">
                <div class="row"> 
                    <div id="product-img" class="col-md-5">
                        <div class="single-product-image">
                            <a href="">
                                <img src="<?php echo e(url($product_info->thumbnail)); ?>" alt="">
                            </a>
                        </div>
                        <div class="subImages">
                            
                        </div>
                    </div>
                    <div id="product-info" class="col-md-7">
                        <div id="product-intro" class="mt-3">
                            <?php echo $product_info->intro; ?>

                        </div>
                        <div class="qty">
                            <span><strong>Số lượng: </strong><?php echo e($product_info->qty); ?></span>
                        </div>
                        <div class="price">
                            <span><strong>Giá: </strong><?php echo e(number_format($product_info->price, 0, ',', '.')); ?>đ</span>
                        </div>
                    </div>

                    <div id="description" class="col-md-12">
                        <?php echo $product_info->description; ?>

                    </div>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manhhungunitopcv/public_html/resources/views/admin/product/detail.blade.php ENDPATH**/ ?>