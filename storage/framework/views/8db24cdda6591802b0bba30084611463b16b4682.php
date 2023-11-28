

<?php $__env->startSection('title', 'Thanh toán'); ?>

<?php $__env->startSection('content'); ?>

    <div id="main-content-wp" class="wp-homepage">

        <div class="container">

            <?php echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div id="main-content-wp" class="checkout-page">

                <form method="POST" action="<?php echo e(route('checkInfo')); ?>" name="form-checkout">

                    <?php echo csrf_field(); ?>

                    <div class="wp-inner clearfix" style = "padding-bottom: 30px">

                        <div class="section" id="customer-info-wp">

                            <div class="section-head">

                                <h1 class="section-title">Thông tin khách hàng</h1>

                            </div>

                            <div class="section-detail">


                                <div class="form-row clearfix">

                                    <div class="form-col fl-left">

                                        <label for="fullname">Họ tên</label>

                                        <input type="text" name="fullname" id="fullname">

                                        <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                            <small class="form-text text-danger">

                                                <?php echo e($message); ?>


                                            </small>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <div class="form-col fl-right">

                                        <label for="phone">Số điện thoại</label>

                                        <input type="tel" name="phone" id="phone">

                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                            <small class="form-text text-danger">

                                                <?php echo e($message); ?>


                                            </small>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>


                                </div>

                                <div class="form-group">

                                    <label for="email">Email</label>

                                    <input type="email" name="email" class="form-control" id="email">

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                        <small class="form-text text-danger">

                                            <?php echo e($message); ?>


                                        </small>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                   

                                </div>

                                <div class="clearfix"></div>

                                <div class="form-row">

                                    <label for="" id="address">Địa chỉ giao hàng:</label>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-12 col-lg-3">

                                        <label for="provinces">Tỉnh</label>

                                        <select name="provinces" id="provinces" data-uri="<?php echo e(route('chooseProvince')); ?>"

                                            class="custom-select">

                                            <option value="" data_id="0">Chọn tỉnh</option>

                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($province->name); ?>" data_id="<?php echo e($province->id); ?>">

                                                    <?php echo e($province->name); ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </select>

                                        <?php $__errorArgs = ['provinces'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                            <small class="form-text text-danger">

                                                <?php echo e($message); ?>


                                            </small>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <div class="form-group col-12 col-lg-4">

                                        <label for="district">Quận/Huyện</label>

                                        <select name="district" id="district" class="custom-select"

                                            data-uri="<?php echo e(route('chooseDistrict')); ?>">

                                            <option value="" data_id="0">Chưa chọn tỉnh</option>

                                        </select>

                                        <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                            <small class="form-text text-danger">

                                                <?php echo e($message); ?>


                                            </small>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <div class="form-group col-12 col-lg-5">

                                        <label for="wards">Phường</label>

                                        <select name="wards" id="wards" class="custom-select">

                                            <option value="" data_id="0">Chưa chọn Quận/Huyện</option>


                                        </select>

                                        <?php $__errorArgs = ['wards'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                            <small class="form-text text-danger">

                                                <?php echo e($message); ?>


                                            </small>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    

                                </div>

                                

                                <div class="form-row">

                                    <div class="form-group col-12">

                                        <label for="detail-address">Địa chỉ cụ thể</label>

                                        <textarea name="detail-address" id="detail-address" cols="70" rows="4"

                                            class="form-control"></textarea>

                                        <?php $__errorArgs = ['detail-address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                            <small class="form-text text-danger">

                                                <?php echo e($message); ?>


                                            </small>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>


                                </div>

                               

                                <div class="form-row">

                                    <div class="form-group col-12 col-lg-7">

                                        <label for="notes">Ghi chú</label>

                                        <textarea name="note" id="" cols="42" rows="4"></textarea>

                                    </div>


                                </div>


                            </div>

                        </div>

                        <div class="section" id="order-review-wp">

                            <div class="section-head">

                                <h1 class="section-title">Thông tin đơn hàng</h1>

                            </div>

                            <div class="section-detail">

                                <table class="shop-table">

                                    <thead>

                                        <tr>

                                            <td>Sản phẩm</td>

                                            <td>Tổng</td>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr class="cart-item">

                                                <td class="product-name"><?php echo e($item->name); ?><strong

                                                        class="product-quantity">x

                                                        <?php echo e($item->qty); ?></strong></td>

                                                <td class="product-total">

                                                    <?php echo e(number_format($item->total, 0, ',', '.')); ?>đ</td>

                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>

                                    <tfoot>

                                        <tr class="order-total">

                                            <td>Tổng đơn hàng:</td>

                                            <td><strong class="total-price"><?php echo e(Cart::total()); ?>đ</strong></td>

                                        </tr>

                                    </tfoot>

                                </table>

                                <div id="payment-checkout-wp">

                                    <ul id="payment_methods">

                                        <li>

                                            <input type="radio" id="payment-home" checked name="payment-method"

                                                value="payment-home">

                                            <label for="payment-home">Thanh toán tại nhà</label>


                                        </li>

                                        <li>

                                            <input type="radio" id="direct-payment" name="payment-method"

                                                value="direct-payment">

                                            <label for="direct-payment">Chuyển khoản</label>

                                            <div class="txt_555 d-none" id="pay_1" style="white-space: pre-line;">
                                                Quý khách chuyển khoản trước theo thông tin dưới đây :
                                                
                                                Công ty Cổ Phần Thương Mại Máy Tính Laptop88
                                                Tầng 5, Số 49 Nguyễn Trãi , Quận Thanh Xuân, Thành phố Hà Nội, Việt Nam
                                                MST: 0108940873
                                                •Vietcombank chi nhánh Hoàn Kiếm - 9399809781
                                                •Techcombank chi nhánh Đống Đa - 19037288089010
                                                •BIDV chi nhánh Đông Đô (Phòng giao dịch Kim Liên) - 21510003139555
                                                •Vietinbank chi nhánh Nam Thăng Long - 102873546144
                                        </li>


                                    </ul>

                                </div>

                                <div class="place-order-wp clearfix">

                                    <input type="submit" id="order-now" value="Đặt hàng">

                                </div>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/client/checkout/index.blade.php ENDPATH**/ ?>