<!DOCTYPE html>
<html lang="en">


<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" style="background: #f7f7f7">
        <div id="wrapper">

            <div class="login-content">
                <div class="login-form mx-auto">
                    <h2 class="text-center">Reset Password</h2>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <form action="" method="POST" id="form-login">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i></label>
                            <input type="text" name="email" id="email" placeholder="email">
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
                        <button type="submit" name="resetPass" value="resetPass"
                            class="btn btn-primary form-control resetPass">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh\resources\views/client/account/passwords/email.blade.php ENDPATH**/ ?>