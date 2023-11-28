
<?php $__env->startSection('title', 'Cập nhật tài khoản'); ?>
<?php $__env->startSection('content'); ?>

    <div id="content" class="container-fluid">

        <div class="card">

            <?php if(session('status')): ?>
                <div class="alert alert-success">

                    <?php echo e(session('status')); ?>


                </div>
            <?php endif; ?>

            <div class="card-header font-weight-bold">

                Cập nhật tài khoản

            </div>

            <div class="card-body">



                <form action="<?php echo e(route('update.accounts', $account_info->id)); ?>" method="POST"
                    enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="form-group">

                        <label for="fullname">Họ và tên</label>

                        <input class="form-control" type="text" name="fullname" id="fullname"
                            value="<?php echo e($account_info->fullname); ?>">

                        <?php $__errorArgs = ['fullname'];
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

                        <label for="username">username</label>

                        <input type="text" class="form-control" name="username" id="username"
                            value="<?php echo e($account_info->username); ?>">

                        <?php $__errorArgs = ['username'];
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

                        <label for="email">Email</label>

                        <input type="text" class="form-control" name="email" id="email"
                            value="<?php echo e($account_info->email); ?>">

                        <?php $__errorArgs = ['email'];
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
                        <small class="form-text text-muted mb-2">Độ dài từ 6-32 kí tự và bắt đầu bằng chữ cái in hoa</small>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Xác nhận mật khẩu</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password-confirm">
                    </div>

                    <div class="form-group">

                        <label for="phone_number" class="d-block">Số điện thoại</label>

                        <input type="tel" class="" name="phone_number" id="phone_number"
                            value="<?php echo e($account_info->phone_number); ?>">

                        <?php $__errorArgs = ['phone_number'];
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

                        <label>Avatar</label>

                        <div id="uploadFile">

                            <input type="file" name="avatar" id="upload-slider">

                            <?php $__errorArgs = ['avatar'];
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
                        <?php if(!empty($account_info->avatar)): ?>
                            <div class="mt-1" id="avatar" style="width:200px">

                                <img src="<?php echo e(url('uploads/accounts/avatar/' . $account_info->avatar)); ?>"
                                    class="img img-responsive" alt="">

                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male"
                            <?php if($account_info->gender == 'male'): ?> checked <?php endif; ?>>

                        <label class="form-check-label" for="exampleRadios1">

                            Nam

                        </label>

                    </div>

                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female"
                            <?php if($account_info->gender == 'female'): ?> checked <?php endif; ?>>

                        <label class="form-check-label" for="exampleRadios2">

                            Nữ

                        </label>

                    </div>

                    <?php $__errorArgs = ['gender'];
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

                    <button type="submit" name="btn_add" class="btn btn-primary">Cập nhật</button>

                </form>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/admin/accounts/edit.blade.php ENDPATH**/ ?>