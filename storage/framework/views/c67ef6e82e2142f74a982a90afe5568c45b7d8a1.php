
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="wp-homepage">
        <div class="container">
            <?php if(session()->has('orderSuccess')): ?>
                <div id="main-content-wp" class="orderSuccess row" style="max-width:1240px; margin: 0px auto">
                    <div class="col-12 thank-you text-center" style="margin-bottom: 30px">
                        <div class="stick">
                            <i class="far fa-check-circle"></i>
                        </div>
                        <div class="thank-content">
                            <h2>Cảm ơn quý khách đã đặt hàng</h2>
                            <p>Bạn sẽ nhận được một email xác nhận đơn đặt hàng với thông tin chi tiết về đơn hàng của bạn
                            </p>
                            <p>Mã đơn hàng: <strong><?php echo e($extra_info['code']); ?></strong></p>
                            <p>Mọi thắc mắc quy khách vui lòng liên hệ SĐT: <strong>0399.809.781</strong> </p>
                        </div>
                        <a href="<?php echo e(url('/')); ?>" class="continue-buy btn-success d-inline-block">Tiếp tục mua hàng</a>
                    </div>
                    <div class="col-12 order_info item">
                        <h1 class="">Sản phẩm đã đặt: </h1>
                    <div class=" all-product">
                            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class=" product_info item form-row">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-3 product-img">
                                                <img src="<?php echo e(url($item->options->thumbnail)); ?>" alt=""
                                                    class="d-block">
                                            </div>
                                            <div class="col-9 extra-info">
                                                <div class="product-title">
                                                    <?php echo e($item->name); ?>

                                                </div>
                                                <div class="code">
                                                    Mã sản phẩm: <strong><?php echo e($item->options->code); ?></strong>

                                                </div>
                                                <div class="price">
                                                    Giá: <span class="text-info">
                                                        <?php echo e(number_format($item->price, 0, ',', '.')); ?>đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <span>Số lượng: <strong><?php echo e($item->qty); ?></strong></span>
                                        <div class="sub-total">Thành tiền: <span style="color: red">
                                                <?php echo e(number_format($item->total, 0, ',', '.')); ?>đ</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="total-price clearfix">
                                <span class="fl-right">Tổng: <strong><?php echo e(Cart::total()); ?>đ</strong></span>
                            </div>
                    </div>

                    <div class="address-and-payment row">
                        <div class="address col-6">
                            <h1>Địa chỉ giao hàng</h1>
                            <p><?php echo e($extra_info['address_detail']); ?></p>
                            <p><?php echo e($extra_info['ward']); ?></p>
                            <p><?php echo e($extra_info['district']); ?></p>
                            <p><?php echo e($extra_info['province']); ?></p>
                        </div>
                        <div class="payment-method col-6">
                            <h1>Hình thức thanh toán</h1>
                            <span>
                                <?php if($extra_info['payment_method'] == 'payment-home'): ?>
                                    Thanh toán tại nhà
                                <?php else: ?>
                                    Thanh toán online
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <div class="customer-info-and-payment-status row">
                        <div class="customer-info col-6">
                            <h1>Thông tin khách hàng</h1>
                            <p>Tên: <strong><?php echo e($extra_info['fullname']); ?></strong></p>
                            <p>Số điện thoại: <strong><?php echo e($extra_info['phone_number']); ?></strong></p>
                            <p>Email: <strong><?php echo e($extra_info['email']); ?> </strong></p>
                            <p>Note: <strong><?php echo e($extra_info['note']); ?></strong></p>
                        </div>
                        <div class="payment-status col-6">
                            <h1>Trạng thái thanh toán</h1>
                            <span>Chưa thanh toán</span>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="no-item text-center">
                    <img src="<?php echo e(asset('client/images/no-order.png')); ?>" style="width:685px; height:auto" alt=""
                        class="d-inline-block">
                    <div class="no-item-title">Không có đơn hàng nào</div>
                    <a href="<?php echo e(url('/')); ?>" class="buy">Mua sắm ngay</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/client/checkout/orderSuccess.blade.php ENDPATH**/ ?>