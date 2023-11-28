
<?php $__env->startSection('content'); ?>
    <div id="content" class="detail-exhibition container-fluid fl-right bg-white" style="min-height: 624px;">
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('update.order', $order_info->id)); ?>">
            <?php echo csrf_field(); ?>
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item list-unstyled">
                    <li>
                        <div class="d-flex icon">
                            <i class="fas fa-barcode"></i>
                            <h3 class="title">Mã đơn hàng</h3>
                        </div>
                        <span class="detail"><?php echo e($order_info->code); ?></span>
                    </li>
                    <li>
                        <div class="d-flex icon">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3 class="title">Địa chỉ nhận hàng</h3>
                        </div>
                        <span class="detail"><?php echo e($order_info->address); ?></span>
                    </li>
                    <li>
                        <div class="d-flex icon">
                            <i class="fas fa-shuttle-van"></i>
                            <h3 class="title">Thông tin vận chuyển</h3>
                        </div>
                        <?php if($order_info->payment_method == 'payment-home'): ?>
                            <span class="detail">Thanh toán tại nhà</span>
                        <?php else: ?>
                            <span class="detail">Thanh toán online</span>
                        <?php endif; ?>

                    </li>

                    <li>
                        <div class="d-flex icon">
                            <i class="fas fa-barcode"></i>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                        </div>
                        <select name="status" class="order_details">
                            <option value="processing" <?php if($order_info->status == 'processing'): ?>
                                selected
                                <?php endif; ?>>Chờ xử lý</option>
                            <option <?php if($order_info->status == 'transporting'): ?>
                                selected
                                <?php endif; ?> value="transporting">Đang vận chuyển</option>
                            <option value="success" <?php if($order_info->status == 'success'): ?>
                                selected
                                <?php endif; ?>>Thành công</option>
                            <option value="cancel" <?php if($order_info->status == 'cancel'): ?>
                                selected
                                <?php endif; ?>>Đã hủy</option>
                        </select>
                        <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                    </li>

                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <th class="thead-text">STT</th>
                                <th class="thead-text">Ảnh sản phẩm</th>
                                <th class="thead-text">Tên sản phẩm</th>
                                <th class="thead-text">Số lượng kho còn</th>
                                <th class="thead-text">Đơn giá</th>
                                <th class="thead-text">Số lượng</th>
                                <th class="thead-text">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $t = 0;
                            ?>
                            <?php $__currentLoopData = $product_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $t++;
                                ?>
                                <tr class="start_each_pr">
                                    <td class="thead-text"><?php echo e($t); ?></td>
                                    <td class="thead-text">
                                        <div class="thumb">
                                            <img src="<?php echo e(url($product->thumbnail)); ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text"><?php echo e($product->product_title); ?></td>
                                    <td class="thead-text"><?php echo e($product->qty - $product->products_sold); ?></td>
                                    <td class="thead-text"><?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                                    
                                    <td class="thead-text qty d-flex">
                                        <input type="number" name="qty[]" min="1"
                                            class="order_qty_<?php echo e($product->id); ?> <?php echo e($order_info->status == 'success' || $order_info->status == 'transporting' ? 'w-100 py-2 px-2' : ''); ?>"
                                            value="<?php echo e($product->pivot->qty); ?>">
                                        <input type="hidden" name="order_qty_storage[]"
                                            class="order_qty_storage_<?php echo e($product->id); ?>"
                                            value="<?php echo e($product->qty - $product->products_sold); ?>">
                                        <input type="hidden" name="order_code" class="order_code"
                                            value="<?php echo e($order_info->code); ?>">
                                        <input type="hidden" name="order_id" class="order_id"
                                            value="<?php echo e($order_info->id); ?>">
                                        <input type="hidden" name="order_product_id[]" class="order_product_id"
                                            value="<?php echo e($product->id); ?>">
                                        <?php if($order_info->status != 'success' AND $order_info->status != 'transporting' ): ?>
                                            <input type="button" class="btn btn-primary update_qty_order" style="width:90px"
                                                data-product_id="<?php echo e($product->id); ?>"
                                                data_uri="<?php echo e(route('update.qty')); ?>" value="Cập nhật">

                                        <?php endif; ?>
                                     
                                    <td class="thead-text order_product_subtotal_<?php echo e($product->id); ?>">
                                        <?php echo e(number_format($product->price * $product->pivot->qty, 0, ',', '.')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <div class="section">
            <h3 class="section-title">Giá trị đơn hàng</h3>
            <div class="section-detail">
                <ul class="list-item list-unstyled clearfix">
                    <li>
                        <span class="total-fee">Tổng số lượng:</span>
                        <span class="total">Tổng đơn hàng:</span>
                    </li>
                    <li>
                        <span class="total-fee"><strong class="total_qty"><?php echo e($order_info->qty); ?></strong> sản
                            phẩm</span>
                        <span class="total"> <strong
                                class="order_total_price"><?php echo e(number_format($order_info->total, 0, ',', '.')); ?></strong></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/admin/order/detail.blade.php ENDPATH**/ ?>