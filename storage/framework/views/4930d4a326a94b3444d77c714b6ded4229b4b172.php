
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
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
                    <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'active'])); ?>" class="text-primary">Đã đăng<span
                            class="text-muted">(<?php echo e($data[1]); ?>)</span></a>
                    <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'passive'])); ?>" class="text-primary">Chờ
                        duyệt<span class="text-muted">(<?php echo e($data[2]); ?>)</span></a>
                    <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'trash'])); ?>" class="text-primary">Thùng rác<span
                            class="text-muted">(<?php echo e($data[0]); ?>)</span></a>
                </div>
                <form action="<?php echo e(route('product.action')); ?>" method="POST">
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
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Người tạo</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($products->total() > 0): ?>
                                <?php
                                    $t = 0;
                                ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $t++;
                                    ?>
                                    <tr class="">
                                        <td>
                                            <input type="checkbox" name="checkItem[]" value="<?php echo e($product->id); ?>">
                                        </td>
                                        <td><?php echo e($t); ?></td>
                                        <td>
                                            <div class="tbody-thumb">
                                                <img src="<?php echo e(url($product->thumbnail)); ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="title">
                                            <div >
                                                <a
                                                    href="<?php echo e(route('product.detail', $product->id)); ?>"><?php echo e($product->product_title); ?></a>
                                            </div>
                                        </td>
                                        <td><?php echo e(number_format($product->price, 0, ',', '.')); ?>đ</td>
                                        <td><?php echo e($product->cats->first()->cat_title); ?></td>
                                        <td><?php echo e($product->name); ?></td>
                                        <td><?php echo e($product->created_at); ?></td>
                                        <td>
                                            <?php if($product->qty > 0): ?>
                                                <span class="badge badge-success">
                                                    Còn hàng
                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-dark">
                                                    Hết hàng
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if(Auth::id() == $product->user_id): ?>
                                            <td>
                                                <a href="<?php echo e(route('edit.product', $product->id)); ?>"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <?php if($status != 'trash'): ?>
                                                    <a href="<?php echo e(route('delete.product', $product->id)); ?>"
                                                        class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                        data-toggle="tooltip" data-placement="top"
                                                        onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ?')"
                                                        title="Delete"><i class="fa fa-trash"></i></a>
                                                <?php endif; ?>

                                            </td>
                                        <?php endif; ?>

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
                <?php echo e($products->appends($append)->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/admin/product/list.blade.php ENDPATH**/ ?>