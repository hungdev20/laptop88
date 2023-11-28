
<?php $__env->startSection('title', 'Danh sách permission'); ?>
<?php $__env->startSection('content'); ?>

    <div id="content" class="container-fluid">

        <div class="row">

            <div class="col-6">

                <div class="card">

                    <?php if(session('status')): ?>

                        <div class="alert alert-success">

                            <?php echo e(session('status')); ?>


                        </div>

                    <?php endif; ?>

                    <div class="card-header font-weight-bold">

                        Thêm mới

                    </div>

                    <div class="card-body">

                        <form action="<?php echo e(route('permission.store')); ?>" method="POST">

                            <?php echo csrf_field(); ?>

                            <div class="form-group">

                                <label for="name">Name</label>

                                <input class="form-control" type="text" name="name" id="name"
                                    value="<?php echo e(request()->old('name')); ?>">

                                <?php $__errorArgs = ['name'];
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
                            <div class="form-group">

                                <label for="display_name">Display Name</label>

                                <input class="form-control" type="text" name="display_name" id="display_name"
                                    value="<?php echo e(request()->old('display_name')); ?>">

                                <?php $__errorArgs = ['display_name'];
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
                            <button type="submit" class="btn btn-primary">Thêm mới</button>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-6">

                <div class="card">

                    <div class="card-header font-weight-bold d-flex justify-content-between">

                        <h5 class="m-0 ">Danh sách Permission</h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-responsive table-checkall" id="table_permission">

                            <thead>

                                <tr>

                                    <th scope="col">

                                        <input name="checkall" type="checkbox">

                                    </th>

                                    <th scope="col">STT</th>

                                    <th scope="col">Name</th>

                                    <th scope="col">Display Name</th>

                                    <th scope="col">Tác vụ</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php if($permissions->total() > 0): ?>

                                    <?php
                                        
                                        $t = 0;
                                        
                                    ?>

                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php
                                            
                                            $t++;
                                            
                                        ?>

                                        <tr>

                                            <td>

                                                <input type="checkbox" name="checkItem[]" value="<?php echo e($item->id); ?>">

                                            </td>

                                            <td scope="row"><?php echo e($t); ?></td>

                                            <td class="menu_title"><a href="#"><?php echo e($item->name); ?></a></td>

                                            <td class="slug"><a href="#"><?php echo e($item->display_name); ?></a></td>



                                            <td>

                                                <a href="<?php echo e(route('permission.edit', $item->id)); ?>"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('permission.delete', $item->id)); ?>"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top"
                                                    onclick="return confirm('Bạn có chắc muốn xóa danh mục này ?')"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
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

                        <?php echo e($permissions->links()); ?>


                    </div>

                </div>

            </div>

        </div>



    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manhhungunitopcv/public_html/resources/views/admin/permission/list.blade.php ENDPATH**/ ?>