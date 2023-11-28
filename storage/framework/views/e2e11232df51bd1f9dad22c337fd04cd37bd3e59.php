
<?php $__env->startSection('title', 'Thông tin cá nhân'); ?>
<?php $__env->startSection('inner_info'); ?>
    <div class="inf120">
        <div class="hinfo">
            <h1>Hồ sơ của tôi</h1>
            <span style="font-size: 16px">Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
        </div>
        <div class="binfo">
            <form action="<?php echo e(route('update.profile')); ?>" method="POST" class="row"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="col-md-8 left-info">
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="username">Tên đăng nhập</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="username" id="username"
                                value="<?php echo e($user_info->username); ?>">
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
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="fullname">Họ và tên</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                value="<?php echo e($user_info->fullname); ?>">
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
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-8">
                            <span><?php echo e($user_info->email); ?></span>
                        </div>
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="phone_number">Số điện thoại</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="phone_number" class="form-control" id="phone_number"
                                value="<?php echo e($user_info->phone_number); ?>">
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
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                            <label for="gender">Giới tính</label>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4">
                                    <input type="radio" id="male" <?php if($user_info->gender == 'male'): ?>
                                    checked
                                    <?php endif; ?> name="gender" value="male">
                                    <label for="male">Nam</label>
                                </div>
                                <div class="col-4">
                                    <input type="radio" id="female" <?php if($user_info->gender == 'female'): ?>
                                    checked
                                    <?php endif; ?> name="gender" value="female" >
                                    <label for="female">Nữ</label>
                                </div>
                                <?php $__errorArgs = ['gender'];
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
                        </div>
                    </div>
                    <div class="item row mb-5">
                        <div class="col-4">
                        </div>
                        <div class="col-8">
                            <button type="submit" name="save_info" class="btn btn-primary save_info">Lưu</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 right-info">
                    <div class="edit_img">
                        <div class="img_avatar" style="width: 65px; ">
                            <?php if($user_info->avatar == ''): ?>
                                <img src="<?php echo e(asset('client/images/avatar_default.jpg')); ?>" alt="" class="img-fluid">
                            <?php else: ?>
                                <img src="<?php echo e(url('uploads/accounts/avatar/' . $user_info->avatar)); ?>" alt=""
                                    class="img-fluid">
                            <?php endif; ?>
                        </div>
                        <div class="choose_img">
                            <input type="file" name="file" class="mt-3" id="file">
                            <br>
                            <?php $__errorArgs = ['file'];
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
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/client/account/profile.blade.php ENDPATH**/ ?>