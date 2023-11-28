<!DOCTYPE html>
<html lang="en">

<?php $__env->startSection('title', 'Đăng ký tài khoản'); ?>
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp">
        <div id="wrapper">

            <div class="signup-content" style="text-align: center">
                <div class="signup-form text-left" style="display: inline-block ">
                    <h2 style="text-align: center">Đăng ký</h2>
                    <form action="<?php echo e(url('user/store')); ?>" method="POST" id="form-register">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="fullname"><i class="fas fa-user-tie"></i></label>
                            <input type="text" name="fullname" id="fullname" placeholder="Họ và tên" value="<?php echo e(request()->old('fullname')); ?>">
                            <?php $__errorArgs = ['fullname'];
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
                            <label for="username"><i class="fas fa-user"></i></label>
                            <input type="text" name="username" id="username" placeholder="Tên đăng nhập" value="<?php echo e(request()->old('username')); ?>">
                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự</small>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i></label>
                            <input type="text" name="email" id="email" placeholder="email" value="<?php echo e(request()->old('email')); ?>">
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
                            <label for="password"><i class="fas fa-lock-alt"></i></label>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu">
                            <div class="eye">
                                <i class="far fa-eye"></i>
                            </div>
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
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in hoa</small>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm"><i class="far fa-lock-alt"></i></label>
                            <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu"
                                id="password-confirm">
                        </div>
                        <div class="form-group">
                            <label for="phone_number"><i class="fas fa-phone"></i></label>
                            <input type="text" name="phone_number" placeholder="Số điện thoại" id="phone_number" value="<?php echo e(request()->old('phone_number')); ?>">
                            <?php $__errorArgs = ['phone_number'];
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
                        

                        
                        <div class="form-group mb-2">
                            <input type="radio" name="gender" class="agree-term form-check-input" checked
                                style="margin-left: 0" id="male" value="male">
                            <label for="male" class="form-check-label agree-label" style="margin-left: 20px">Nam</label>
                            <br>
                            <input type="radio" name="gender" class="agree-term form-check-input" id="female" value="female"
                                style="margin-left: 0">
                            <label for="female" class="form-check-label agree-label" style="margin-left: 20px">Nữ</label>
                        </div>

                        <button type="submit" name="btn-regis" value="Đăng ký" class="btn btn-primary">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
 

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manhhungunitopcv/public_html/resources/views/client/account/register.blade.php ENDPATH**/ ?>