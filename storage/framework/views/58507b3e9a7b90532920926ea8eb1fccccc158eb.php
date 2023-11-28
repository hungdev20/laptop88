
<?php $__env->startSection('title', 'Edit role'); ?>
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <div class="card-header font-weight-bold">
                Cập nhật
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('role.update', $role->id)); ?>" id="edit_role" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" value="<?php echo e($role->name); ?>">
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
                                value="<?php echo e($role->display_name); ?>">
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
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" style="font-weight: bold">
                                    <input type="checkbox" class="checkall">
                                </label>
                                <span style="font-weight: bold;
                                    font-size: 17px;">CheckAll</span>
                            </div>
                            <?php $__currentLoopData = $permissionParent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionParentItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item col-md-12">
                                    <div class="card border-primary mb-3 card-item">
                                        <div class="card-header">
                                            <label for="">
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            Module <?php echo e($permissionParentItem->name); ?>

                                        </div>
                                        <div class="row">
                                            <?php $__currentLoopData = $permissionParentItem->permissionsChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionsChildrenItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card-body text-primary col-md-3">
                                                    <h6 class="card-title">
                                                        <label for="<?php echo e($permissionsChildrenItem->id); ?>">
                                                            <input type="checkbox" name="permission_id[]"
                                                                <?php echo e($permissionChecked->contains('id', $permissionsChildrenItem->id) ? 'checked' : ''); ?>

                                                                class="checkbox_children"
                                                                id="<?php echo e($permissionsChildrenItem->id); ?>"
                                                                value="<?php echo e($permissionsChildrenItem->id); ?>">
                                                        </label>
                                                        <?php echo e($permissionsChildrenItem->name); ?>

                                                    </h6>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/admin/role/edit.blade.php ENDPATH**/ ?>