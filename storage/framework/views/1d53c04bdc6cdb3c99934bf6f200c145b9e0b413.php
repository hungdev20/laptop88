
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container-fluid py-5">

        <div class="row">

            <div class="col">

                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

                    <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>

                    <div class="card-body">

                        <h5 class="card-title"><?php echo e($number_success); ?></h5>

                        <p class="card-text">Đơn hàng thành công</p>

                    </div>

                </div>

            </div>

            <div class="col">

                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">

                    <div class="card-header">ĐƠN HÀNG ĐANG GIAO</div>

                    <div class="card-body">

                        <h5 class="card-title"><?php echo e($number_transporting); ?></h5>

                        <p class="card-text">Đơn hàng đang giao</p>

                    </div>

                </div>

            </div>

            <div class="col">

                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">

                    <div class="card-header">ĐANG XỬ LÝ</div>

                    <div class="card-body">

                        <h5 class="card-title"><?php echo e($number_processing); ?></h5>

                        <p class="card-text">Đơn hàng đang xử lý</p>

                    </div>

                </div>

            </div>
            <div class="col">

                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">

                    <div class="card-header">DOANH SỐ</div>

                    <div class="card-body">

                        <h5 class="card-title"><?php echo e(number_format($total, 0, ',', '.')); ?>đ</h5>

                        <p class="card-text">Doanh số hệ thống</p>

                    </div>

                </div>

            </div>

            <div class="col">

                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">

                    <div class="card-header">ĐƠN HÀNG HỦY</div>

                    <div class="card-body">

                        <h5 class="card-title"><?php echo e($number_canceled); ?></h5>

                        <p class="card-text">Số đơn bị hủy trong hệ thống</p>

                    </div>

                </div>

            </div>

        </div>

        <!-- end analytic  -->

        <div class="card">

            <div class="card-header font-weight-bold">

                ĐƠN HÀNG MỚI

            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <thead>

                        <tr>

                            <th scope="col">#</th>

                            <th scope="col">Mã đơn hàng</th>

                            <th scope="col">Khách hàng</th>

                            <th scope="col">Số sản phẩm</th>

                            <th scope="col">Tổng giá</th>

                            <th scope="col">Trạng thái</th>

                            <th scope="col">Thời gian</th>

                            <th scope="col">Tác vụ</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                            $t = 0;

                        ?>

                        <?php $__currentLoopData = $all_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php

                                $t++;

                            ?>

                            <tr>

                                <th scope="row"><?php echo e($t); ?></th>

                                <td><?php echo e($order->code); ?></td>

                                <td>

                                    <?php echo e($order->customer); ?> <br>

                                    <?php echo e($order->phone); ?>


                                </td>

                                <td><?php echo e($order->qty); ?></td>

                                <td><?php echo e(number_format($order->total, 0, ',', '.')); ?>₫</td>

                                <td><span

                                        class="badge  <?php if($order->status == 'cancel'): ?>

                        badge-danger

                    <?php elseif($order->status == 'success'): ?>

                        badge-success

                        <?php elseif($order->status == 'transporting'): ?>

                        badge-info

                        <?php else: ?>

                        badge-warning

                    <?php endif; ?>"><?php echo e($order->status); ?></span>

                                </td>

                                <td><?php echo e($order->created_at); ?></td>

                                <td>

                                    <a href="<?php echo e(route('edit.order', $order->id)); ?>"

                                        class="btn btn-success btn-sm rounded-0 text-white" type="button"

                                        data-toggle="tooltip" data-placement="top" title="Edit"><i

                                            class="fa fa-edit"></i></a>

                                </td>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </tbody>

                </table>

                <?php echo e($all_order->links()); ?>


            </div>

        </div>



    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>