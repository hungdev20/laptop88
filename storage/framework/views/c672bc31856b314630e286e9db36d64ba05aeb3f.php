
<?php $__env->startSection('inner_info'); ?>

    <div class="purchase">
        <div class="tabLinks">
            <div class="row">
                <a href="<?php echo e(url('user/purchase')); ?>"
                    class="col-2 d-block text-center link <?php if($type == 0): ?>
                    border_active
                <?php endif; ?>">Tất
                    cả</a>
                <a href="<?php echo e(url('user/purchase') . '?type=1'); ?>"
                    class="col-2 d-block text-center link <?php if($type == 1): ?>
                border_active
            <?php endif; ?>">Chờ
                    xử lý</a>
                <a href="<?php echo e(url('user/purchase') . '?type=2'); ?>"
                    class="col-2 d-block text-center link <?php if($type == 2): ?>
                border_active
            <?php endif; ?>">Đang
                    giao</a>
                <a href="<?php echo e(url('user/purchase') . '?type=3'); ?>"
                    class="col-2 d-block text-center link <?php if($type == 3): ?>
                border_active
            <?php endif; ?>">Hoàn
                    thành</a>
                <a href="<?php echo e(url('user/purchase') . '?type=4'); ?>"
                    class="col-2 d-block text-center link <?php if($type == 4): ?>
                border_active
            <?php endif; ?>">Đã
                    hủy</a>
            </div>
        </div>

        <div class="inner_order">
            <?php if($orders->count() > 0): ?>
                <div class="hasID" style="position: relative; margin-bottom: 40px">
                    <input type="text" class="form-control" name="searchBill" id="searchBill"
                        data_type="<?php echo e($type); ?>" data_uri="<?php echo e(route('ajaxSearchBill')); ?>"
                        placeholder="Tìm Kiếm Theo ID Đơn Hàng">
                    <span class="icon-search"><i class="fas fa-search"></i></span>
                </div>
                <div class="sOrder">
                    <div id="zsBB">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="minizsBB mb-4 pb-4" style="border-bottom: 1px solid rgb(145 143 143 / 96%);">
                                <div class="row bill-item pb-3 mb-3">
                                    <?php if($order->status == 'processing'): ?>
                                        <div class="col-4 col-md-6">
                                            <div class="row">
                                                <div class="col-4 codeHA_parent">
                                                    <span class="codeHA">Mã Bill:
                                                        <strong><?php echo e($order->code); ?></strong></span>

                                                </div>
                                                <div class="col-8 cancel_order">
                                                    <button class="btn btn-danger" id="cancel_order"
                                                        data_uri="<?php echo e(route('cancel.order')); ?>"
                                                        data_id="<?php echo e($order->id); ?>"
                                                        onclick="confirm('Bạn chắc chắn muốn hủy đơn hàng này chứ?')">Hủy
                                                        đơn hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class=" col-4 col-md-6">
                                            <span class="codeHA">Mã Bill:
                                                <strong><?php echo e($order->code); ?></strong></span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-8 col-md-6 row status">
                                        <div class="col-6 d-flex">
                                            <?php if($order->status == 'processing'): ?>
                                                <i class=" fas fa-truck-loading"
                                                    style="color: #ffc107; font-size:18px; font-weight:700"><span
                                                        class="pl-2">Đang xử lý</span></i>
                                            <?php elseif($order->status == 'transporting'): ?>
                                                <i class=" fas fa-shuttle-van"
                                                    style="color: #17a2b8; font-size:18px; font-weight:700"><span
                                                        class="pl-2">Đang giao</span></i>
                                            <?php elseif($order->status == 'success'): ?>
                                                <i class="fas fa-check-circle"
                                                    style="color: #197d00; font-size:18px; font-weight:700"><span
                                                        class="pl-2">Hoàn thành</span></i>
                                            <?php elseif($order->status == 'cancel'): ?>
                                                <i class="far fa-window-close"
                                                    style="color: red; font-size:18px; font-weight:700"><span
                                                        class="pl-2">Đã hủy</span></i>
                                            <?php endif; ?>

                                        </div>
                                        <div class="col-6">
                                            <span class="notPay"><i class="fas fa-money-bill-wave pr-2"></i>Chưa
                                                Thanh Toán</span>
                                        </div>
                                    </div>
                                </div>
                                <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row pb-2 mb-2 prd_item">
                                        <div class="col-2 thumb_order">
                                            <img src="<?php echo e(url($item->thumbnail)); ?>" alt="" class="d-block">
                                        </div>
                                        <div class="col-7 col-md-8 middle_order" style="margin-top: 14px">
                                            <div class="product-title">
                                                <?php echo e($item->product_title); ?>

                                            </div>
                                            <div class="code">
                                                Mã sản phẩm: <strong><?php echo e($item->code); ?></strong>

                                            </div>
                                            <div class="qty" style="margin-top:5px">
                                                <span>Số lượng: <strong><?php echo e($item->pivot->qty); ?></strong></span>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-2 subtotal_order">
                                            <div class="sub-total" style="padding-top: 50px">Thành tiền: <span
                                                    style="color: red">
                                                    <?php echo e(number_format($item->price * $item->pivot->qty, 0, ',', '.')); ?>đ</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="total_order d-flex justify-content-end">
                                    <div class="totHA">
                                        Tổng tiền:
                                    </div>
                                    <div class="tot">
                                        <?php echo e(number_format($order->total, 0, ',', '.')); ?>đ
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="no_pro text-center">
                    <span class="d-block" style="font-size: 30px;
                                margin-bottom: 20px;">Không có đơn hàng nào</span>
                    <i style="font-size: 75px; color:#c8d6e5" class="fas fa-receipt mt-3"></i>
                </div>
            <?php endif; ?>
        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/client/account/purchase.blade.php ENDPATH**/ ?>