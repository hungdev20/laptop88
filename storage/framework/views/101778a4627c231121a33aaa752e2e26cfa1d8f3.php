
<?php $__env->startSection('title', 'Danh sách đơn hàng'); ?>
<?php $__env->startSection('content'); ?>

    <div id="content" class="container-fluid">

        <div class="card">

            <?php if(session('status')): ?>
                <div class="alert alert-success">

                    <?php echo e(session('status')); ?>


                </div>
            <?php endif; ?>

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">

                <h5 class="m-0 ">Danh sách đơn hàng</h5>

                <div class="form-search form-inline">

                    <form action="#" class='d-flex'>

                        <?php if($status): ?>
                            <input type="hidden" name="status" value="<?php echo e($status); ?>">
                        <?php endif; ?>

                        <input type="" class="form-control form-search mr-1" name="keyword"
                            value="<?php echo e(request()->input('keyword')); ?>" placeholder="Tìm kiếm">

                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">

                    </form>

                </div>

            </div>

            <div class="card-body">

                <div class="analytic">

                    <a href="<?php echo e(Request::url()); ?>?status=all" class="text-primary">Tất cả<span
                            class="text-muted">(<?php echo e($data[0]); ?>)</span></a>

                    <a href="<?php echo e(Request::url()); ?>?status=processing" class="text-primary">Đang xử

                        lý<span class="text-muted">(<?php echo e($data[2]); ?>)</span></a>

                    <a href="<?php echo e(Request::url()); ?>?status=transporting" class="text-primary">Đang

                        giao<span class="text-muted">(<?php echo e($data[3]); ?>)</span></a>

                    <a href="<?php echo e(Request::url()); ?>?status=success" class="text-primary">Hoàn

                        thành<span class="text-muted">(<?php echo e($data[4]); ?>)</span></a>

                    <a href="<?php echo e(Request::url()); ?>?status=cancel" class="text-primary">Hủy đơn

                        hàng<span class="text-muted">(<?php echo e($data[1]); ?>)</span></a>

                </div>

                <form action="<?php echo e(route('order.action')); ?>" method="POST">

                    <?php echo csrf_field(); ?>

                    <div class="form-action form-inline py-3">

                        <select class="form-control mr-1" name="act" id="">

                            <option>Chọn</option>

                            <?php $__currentLoopData = $act; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </select>

                        <input type="submit" name="btn-search"
                            onclick="return confirm('Bạn có chắc chắn muốn thực hiện thao tác này?')" value="Áp dụng"
                            class="btn btn-primary">

                    </div>

                    <table class="table table-striped table-checkall">

                        <thead>

                            <tr>

                                <th>

                                    <input type="checkbox" name="checkall">

                                </th>

                                <th scope="col">#</th>

                                <th scope="col">Mã</th>

                                <th scope="col">Khách hàng</th>

                                <th scope="col">Số điện thoại</th>

                                <th scope="col">Số lượng</th>

                                <th scope="col">Giá trị</th>

                                <th scope="col">Trạng thái</th>

                                <th scope="col">Thời gian</th>

                                <th scope="col">Chi tiết</th>

                                <th scope="col">Tác vụ</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if($orders->total() > 0): ?>

                                <?php
                                    
                                    $t = 0;
                                    
                                ?>

                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        
                                        $t++;
                                        
                                    ?>

                                    <tr>



                                        <td>

                                            <input type="checkbox" name="checkItem[]" value="<?php echo e($order->id); ?>">

                                        </td>

                                        <td><?php echo e($t); ?></td>

                                        <td><?php echo e($order->code); ?></td>

                                        <td>

                                            <?php echo e($order->customer); ?>


                                        </td>
                                        <td>

                                            <?php echo e($order->phone); ?>


                                        </td>

                                        <td><?php echo e($order->qty); ?></td>

                                        <td><?php echo e(number_format($order->total, 0, ',', '.')); ?>₫</td>

                                        <td><span
                                                class="badge  <?php if($order->status == 'cancel'): ?> badge-danger

                                <?php elseif($order->status == 'success'): ?>

                                    badge-success

                                    <?php elseif($order->status == 'transporting'): ?>

                                    badge-info

                                    <?php else: ?>

                                    badge-warning <?php endif; ?>">
                                                <?php if($order->status == 'cancel'): ?>
                                                    Đã hủy
                                                <?php elseif($order->status == 'success'): ?>
                                                    Thành công
                                                <?php elseif($order->status == 'transporting'): ?>
                                                    Đang vận chuyển
                                                <?php elseif($order->status == 'processing'): ?>
                                                    Đang xử lý
                                                <?php endif; ?>
                                            </span>

                                        </td>

                                        <td><?php echo e($order->created_at); ?></td>

                                        <td><a href="">Chi tiết</a></td>

                                        

                                        <td>

                                            <a href="<?php echo e(route('edit.order', $order->id)); ?>"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>

                                            <?php if($status != 'cancel'): ?>
                                                <a href="<?php echo e(route('delete.order', $order->id)); ?>"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top"
                                                    onclick="return confirm('Bạn có chắc muốn xóa trang này ?')"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
                                            <?php endif; ?>

                                            <a href="<?php echo e(route('print.order', $order->id)); ?>"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Print"><i
                                                    class="fas fa-print"></i></a>
                                        </td>

                                        

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>

                                    <td colspan="7" class="bg-white">

                                        Không tìm thấy bản ghi

                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </form>

                <?php echo e($orders->appends($append)->links()); ?>


            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/admin/order/index.blade.php ENDPATH**/ ?>