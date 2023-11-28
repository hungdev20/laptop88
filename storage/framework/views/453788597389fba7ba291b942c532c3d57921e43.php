<?php
    use App\Product;
?>

<?php $__env->startSection('title', 'Thông tin giỏ hàng'); ?>

<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="wp-homepage">
        <div class="container">
            <div id="main-content-wp" class="cart-page pt-4">
                <div class="wp-inner clearfix">
                    <div class="section" id="info-cart-wp">
                        <?php if(Cart::count() > 0): ?>
                            <div class="section-detail table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Mã sản phẩm</td>
                                            <td>Ảnh sản phẩm</td>
                                            <td id="CartProductTitle">Tên sản phẩm</td>
                                            <td>Giá sản phẩm</td>
                                            <td>Số lượng</td>
                                            <td colspan="2">Thành tiền</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $product = Product::find($row->id);
                                            ?>
                                            <tr>
                                                <td><?php echo e($row->options->code); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('productDetail', [$row->options->slug, $row->id])); ?>"
                                                        title="" class="thumb">
                                                        <img src="<?php echo e(url($row->options->thumbnail)); ?>" alt="">
                                                    </a>
                                                </td>
                                                <td id="nameProductCart">
                                                    <a href="<?php echo e(route('productDetail', [$row->options->slug, $row->id])); ?>"
                                                        title="" class="name-product"><?php echo e($row->name); ?></a>
                                                </td>
                                                <td><?php echo e(number_format($row->price, 0, ',', '.')); ?>đ</td>
                                                <td>
                                                    <input type="number" name="num-order" min="1"
                                                        max="<?php echo e($product->qty - $product->products_sold); ?>"
                                                        value="<?php echo e($row->qty); ?>" class="num-order"
                                                        row-id="<?php echo e($row->rowId); ?>"
                                                        data-uri="<?php echo e(route('updateCartAjax')); ?>">
                                                </td>
                                                <td id="sub-total-<?php echo e($row->rowId); ?>">
                                                    <?php echo e(number_format($row->total, 0, ',', '.')); ?>đ</td>
                                                <td>
                                                    <a href="<?php echo e(route('cart.delete', $row->rowId)); ?>" title=""
                                                        class="del-product"><i class="fas fa-trash-alt"></i></a>
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="clearfix">
                                                    <p id="total-price" class="fl-right">Tổng giá:
                                                        <span><?php echo e(Cart::total()); ?>đ</span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <div class="clearfix">
                                                    <div class="fl-right">

                                                        <a href="<?php echo e(route('checkout')); ?>" title=""
                                                            id="checkout-cart">Thanh toán</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="no-item text-center">
                                <img src="<?php echo e(asset('client/images/empty_cart.jpeg')); ?>" style="width:685px; height:auto"
                                    alt="" class="d-inline-block">
                                <div class="no-item-title">Giỏ hàng chưa có sản phẩm nào</div>
                                <a href="<?php echo e(url('/')); ?>" class="buy">Mua sắm ngay</a>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="section" id="action-cart-wp">
                        <div class="section-detail">
                            <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập
                                vào số
                                lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua
                                hàng.</p>
                            <a href="<?php echo e(url('/')); ?>" title="" id="buy-more">Mua tiếp</a><br />
                            <a href="<?php echo e(route('cart.destroy')); ?>" title="" onclick="confirm('Bạn chắc chắn muốn xóa toàn bộ giỏ hàng chứ?')" id="delete-cart">Xóa giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh\resources\views/client/cart/show.blade.php ENDPATH**/ ?>