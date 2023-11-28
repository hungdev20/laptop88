<!DOCTYPE html>
<html lang="en">


<?php $__env->startSection('title', 'Đăng nhập tài khoản'); ?>
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" style="background: #f7f7f7">
        <div id="wrapper">

            <div class="login-content" style="text-align: center">
                <div class="login-form" style="display: inline-block">
                    <h2>Đăng Nhập</h2>
                    <form action="<?php echo e(url('user/checkLogin')); ?>" method="POST" id="form-login">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="username"><i class="fas fa-user"></i></label>
                            <input type="text" name="username" id="username" placeholder="Tên đăng nhập"
                                value="<?php echo e(request()->old('username')); ?>">
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
                            <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in
                                hoa</small>
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control-checkbox mb-0"><span class="caption">Remember me</span>
                                <input type="checkbox" class="rmb_me" name="rmb_me" value="ok">

                            </label>
                            <span class="ml-auto"><a href="<?php echo e(url('resetpass')); ?>" class="forgot-pass">Quên Mật
                                    Khẩu?</a></span>
                        </div>
                        <div class="d-flex mb-2 align-items-center">
                            <span class="mx-auto" style="font-size: 18px">Bạn Chưa Có Tài Khoản? <a
                                    href="<?php echo e(route('account_register')); ?>" id="hover-reg" class="forgot-pass">Đăng
                                    Ký</a></span>
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            <span class="mx-auto" style="font-size: 18px">Trở Về Trang Chủ <a
                                    href="<?php echo e(url('/')); ?>" id="hover-home" class="forgot-pass">Trang
                                    Chủ</a></span>
                        </div>
                        <button type="submit" name="btn-login" value="Đăng nhập"
                            class="btn btn-primary form-control btn-login">Đăng Nhập</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/client/account/login.blade.php ENDPATH**/ ?>