
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách khách hàng</h5>
                <div class="form-search">
                    <form action="#" class="form-inline">

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
                    <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'all'])); ?>" class="text-primary">Tất cả<span
                            class="text-muted">(<?php echo e($data[1]); ?>)</span></a>
                    <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'trash'])); ?>" class="text-primary">Thùng
                        rác<span class="text-muted">(<?php echo e($data[0]); ?>)</span></a>
                </div>
                <form action="<?php echo e(route('customer.action')); ?>" method="POST">
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


                    <table class="table table-striped table-checkall" id="customer_list">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col" id="address">Địa chỉ</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($customers->total() > 0): ?>
                                <?php
                                    $t = 0;
                                ?>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $t++;
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checkItem[]" value="<?php echo e($customer->id); ?>">
                                        </td>
                                        <th scope="row"><?php echo e($t); ?></th>
                                        <td>
                                            <div>
                                                <a href=""><?php echo e($customer->fullname); ?></a>
                                            </div>
                                        </td>

                                        <td><?php echo e($customer->phone_number); ?></td>
                                        <td><?php echo e($customer->email); ?></td>
                                        <td><?php echo e($customer->address); ?></td>
                                        <td><?php echo e($customer->orders->first()->id); ?></td>
                                        <td><?php echo e($customer->created_at); ?></td>

                                        <td>
                                            <a href="<?php echo e(route('edit.customer', $customer->id)); ?>"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <?php if($status != 'trash'): ?>
                                                <a href="<?php echo e(route('delete.customer', $customer->id)); ?>"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top"
                                                    onclick="return confirm('Bạn có chắc muốn xóa khách hàng này ?')"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
                                            <?php endif; ?>

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
                <?php echo e($customers->appends($append)->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/admin/order/customer.blade.php ENDPATH**/ ?>