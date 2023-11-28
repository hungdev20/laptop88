
<?php $__env->startSection('title', 'Danh sách settings'); ?>
<?php $__env->startSection('content'); ?>

    <div id="content" class="container-fluid">

        <div class="card">

            <?php if(session('status')): ?>

                <div class="alert alert-success">

                    <?php echo e(session('status')); ?>


                </div>

            <?php endif; ?>

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">

                <h5 class="m-0 ">Danh sách Settings</h5>

                <div class="form-search form-inline">

                    <form action="#">

                        <?php if($status): ?>

                            <input type="hidden" name="status" value="<?php echo e($status); ?>">

                        <?php endif; ?>

                        <input type="" class="form-control form-search" name="keyword"
                            value="<?php echo e(request()->input('keyword')); ?>" placeholder="Tìm kiếm">

                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">

                    </form>

                </div>

            </div>

            <div class="card-body">

                <div class="analytic">

                    <a href="<?php echo e(Request::url()); ?>?status=active" class="text-primary">Đã
                        đăng<span class="text-muted">(<?php echo e($data[1]); ?>)</span></a>
                    <a href="<?php echo e(Request::url()); ?>?status=trash" class="text-primary">Thùng
                        rác<span class="text-muted">(<?php echo e($data[0]); ?>)</span></a>

                </div>

                <form action="<?php echo e(route('setting.action')); ?>" method="POST"> 

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

                                <th scope="col">Config key</th>

                                <th scope="col">Config value</th>

                                <th scope="col">Người tạo</th>

                                <th scope="col">Ngày tạo</th>

                                <th scope="col">Tác vụ</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if($settings->total() > 0): ?>

                                <?php
                                    
                                    $t = 0;
                                    
                                ?>

                                <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        
                                        $t++;
                                        
                                    ?>

                                    <tr>

                                        <td>

                                            <input type="checkbox" name="checkItem[]" value="<?php echo e($setting->id); ?>">

                                        </td>

                                        <td scope="row"><?php echo e($t); ?></td>


                                        <td class=""><a href="#"><?php echo e($setting->config_key); ?></a></td>

                                        <td class="link"><a href="#"><?php echo e($setting->config_value); ?></a></td>


                                        <td><?php echo e($setting->name); ?></td>

                                        <td><?php echo e($setting->created_at); ?></td>

                                        <?php if(Auth::id() == $setting->user_id): ?>

                                            <td>

                                                <a href="<?php echo e(route('edit.settings', $setting->id) . "?type=" . $setting->type); ?>"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>

                                                <?php if($status != 'trash'): ?>

                                                    <a href="<?php echo e(route('delete.settings', $setting->id)); ?>"
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

                <?php echo e($settings->appends($append)->links()); ?>


            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\TungHaiPc\resources\views/admin/settings/list.blade.php ENDPATH**/ ?>