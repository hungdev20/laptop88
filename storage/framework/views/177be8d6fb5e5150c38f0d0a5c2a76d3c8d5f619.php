
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="wp-homepage">
        <div class="container">
            <div id="main-content-wp" class="orderSuccess row">
                <div class="col-4 thank-you text-center">
                    <div class="stick">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <div class="thank-content">
                        <h2>Cảm ơn quý khách đã đặt hàng</h2>
                        <p>Bạn sẽ nhận được một email xác nhận đơn đặt hàng với thông tin chi tiết về đơn hàng của bạn</p>
                        <p>Mã đơn hàng: <strong>HA1009</strong></p>
                        <p>Mọi thắc mắc quy khách vui lòng liên hệ SĐT: 0399.809.781</p>
                    </div>
                    <a href="<?php echo e(url('/')); ?>" class="continue-buy btn-success d-inline-block">Tiếp tục mua hàng</a>
                </div>
                <div class="col-8 order_info">
                    <h1 class="">Sản phẩm đã đặt: </h1>
                    <div class=" product_info row">
                        <div class="form-group">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-3 product-img">
                                        <img src="<?php echo e(url('public/client/images/best-seller-1.png')); ?>" alt=""
                                            class="d-block">
                                    </div>
                                    <div class="col-9 extra-info">
                                        <div class="product-title">
                                            LAPTOP MOI TOANH NHA
                                        </div>
                                        <div class="code">
                                            Mã sản phẩm: <strong>HA1009</strong>

                                        </div>
                                        <div class="price">
                                            Giá: <span class="text-info">20.000.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <span>Số lượng: <strong>1</strong></span>
                                <div class="sub-total">Thành tiền: <span class="text-red">20.000.000đ</span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/client/checkout/orderSucess.blade.php ENDPATH**/ ?>