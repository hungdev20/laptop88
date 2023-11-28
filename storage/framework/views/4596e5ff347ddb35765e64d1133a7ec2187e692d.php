
<?php $__env->startSection('title', 'Đổi mật khẩu'); ?>
<?php $__env->startSection('inner_info'); ?>
    <div id="main-content-wp">
        <div id="wrapper">
            <div class="login-content">
                <div class="login-form mx-auto">
                    <h2 class="text-center">Đổi mật khẩu</h2>
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST" id="form-login">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="old_password"><i class="fas fa-lock-alt"></i></label>
                            <input type="password" name="old_password" id="old_password" placeholder="Mật khẩu cũ">
                            <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in
                                hoa</small>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock-alt"></i></label>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu mới">
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
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in
                                hoa</small>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="far fa-lock-alt"></i></label>
                            <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu"
                                id="password-confirm">
                        </div>
                        <button type="submit" name="changeNewPass" value="resetPass"
                            class="btn btn-primary form-control resetPass">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/client/account/passwords/change.blade.php ENDPATH**/ ?>