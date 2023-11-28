
<?php $__env->startSection('title', 'Edit user'); ?>
<?php $__env->startSection('content'); ?>

    <div id="content" class="container-fluid">

        <div class="card">
            <?php if(session('status')): ?>

                <div class="alert alert-success">

                    <?php echo e(session('status')); ?>

                </div>

            <?php endif; ?>
            <div class="card-header font-weight-bold">

                Cập nhật thông tin người dùng

            </div>

            <div class="card-body">

                <form action="<?php echo e(route('update_user', $user->id)); ?>" method="POST">

                    <?php echo csrf_field(); ?>

                    <div class="form-group">

                        <label for="name">Họ và tên</label>

                        <input class="form-control" type="text" name="name" id="name" value="<?php echo e($user->name); ?>">

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            <small class="text-danger"><?php echo e($message); ?></small>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="form-group">

                        <label for="email">Email</label>

                        <input class="form-control" type="text" name="email" id="email" disabled
                            value="<?php echo e($user->email); ?>">

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            <small class="text-danger"><?php echo e($message); ?></small>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="form-group">

                        <label for="password">Mật khẩu</label>

                        <input class="form-control" type="password" name="password" id="password">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            <small class="text-danger"><?php echo e($message); ?></small>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="form-group">

                        <label for="password-confirm">Xác nhận mật khẩu</label>

                        <input class="form-control" type="password" name="password_confirmation" id="password-confirm">

                    </div>



                    <div class="form-group">

                        <label for="">Nhóm quyền</label>

                        <select class="form-control" id="roles" name="roles[]" multiple="multiple">

                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($role->id); ?>"
                                    <?php echo e($listRoleOfUser->contains($role->id) ? 'selected' : ''); ?>><?php echo e($role->display_name); ?>
                                </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                    </div>



                    <button type="submit" name="btn-update" value="Cập nhật" class="btn btn-primary">Cập nhật</button>

                </form>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>