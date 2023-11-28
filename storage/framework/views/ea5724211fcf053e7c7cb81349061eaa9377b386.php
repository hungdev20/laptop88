
<?php $__env->startSection('title', 'Danh sách slider'); ?>
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách slider</h5>
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
                    <a href="<?php echo e(Request::url()); ?>?status=active" class="text-primary">Đã
                        đăng<span class="text-muted">(<?php echo e($data[1]); ?>)</span></a>
                    <a href="<?php echo e(Request::url()); ?>?status=passive" class="text-primary">Chờ
                        duyệt<span class="text-muted">(<?php echo e($data[2]); ?>)</span></a>
                    <a href="<?php echo e(Request::url()); ?>?status=trash" class="text-primary">Thùng
                        rác<span class="text-muted">(<?php echo e($data[0]); ?>)</span></a>
                </div>
                <form action="<?php echo e(route('slider.action')); ?>" method="POST">
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
                                <th scope="col">STT</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Link</th>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người tạo</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($sliders->total() > 0): ?>
                                <?php
                                    $t = 0;
                                ?>
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $t++;
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checkItem[]" value="<?php echo e($slider->id); ?>">
                                        </td>
                                        <td scope="row"><?php echo e($t); ?></td>
                                        <td class="tbody-thumb"><img src="<?php echo e(url('uploads/sliders/' . $slider->images)); ?>"
                                                alt=""></td>
                                        <td class="slider_title"><a href="#"><?php echo e($slider->slider_title); ?></a></td>
                                        <td class="link"><a href="#"><?php echo e($slider->link); ?></a></td>
                                        <td class="order"><a href="#"><?php echo e($slider->order); ?></a></td>
                                        <td <?php if($slider->status == 'passive'): ?>
                                            style="color:red"
                                        <?php else: ?>
                                            style="color:green"
                                <?php endif; ?>>
                                <?php echo e($slider->status); ?>

                                </td>
                                <td><?php echo e($slider->name); ?></td>
                                <td><?php echo e($slider->created_at); ?></td>
                                <?php if(Auth::id() == $slider->user_id): ?>
                                    <td class="action">
                                        <a href="<?php echo e(route('edit.slider', $slider->id)); ?>"
                                            class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>
                                        <?php if($status != 'trash'): ?>
                                            <a href="<?php echo e(route('delete.slider', $slider->id)); ?>"
                                                class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top"
                                                onclick="return confirm('Bạn có chắc muốn xóa bài viết này ?')"
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
                <?php echo e($sliders->appends($append)->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\TungHaiPc\resources\views/admin/slider/list.blade.php ENDPATH**/ ?>