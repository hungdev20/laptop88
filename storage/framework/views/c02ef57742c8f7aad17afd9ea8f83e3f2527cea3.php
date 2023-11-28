
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="wp-homepage">
        <div id="wp-inner" class="container">
            <div id="main-content" style="padding-top: 30px; min-height:600px" class="d-flex">
                <div id="sidebar_user">
                    <div id="inf_1" class="d-flex">
                        <div class="inf_avatar">
                            <?php if($user_info->avatar == ''): ?>
                                <img src="<?php echo e(asset('client/images/avatar_default.jpg')); ?>" alt="" class="img-fluid">
                            <?php else: ?>
                                <img src="<?php echo e(url('uploads/accounts/avatar/' . $user_info->avatar)); ?>" alt=""
                                    class="img-fluid">
                            <?php endif; ?>
                        </div>
                        <div class="inf_text">
                            <span class="d-block" style="font-size: 20px"><?php echo e($user_info->username); ?></span>
                            <i class="fas fa-pen"
                                style="color: #888; text-transform: capitalize; font-size:15px; padding-left:7px"><span
                                    style="padding-left: 6px;">Sửa Hồ Sơ</span></i>
                        </div>
                    </div>
                    <div class="inf_2">
                        <div class="user_icon d-flex">
                            <i style="font-size: 20px; color:#0984e3; width: 18%" class="far fa-user"></i>
                            <a href="">Tài khoản của tôi</a>
                        </div>
                        <div class="stardust-dropdown">
                            <div class="stardust" style="font-size: 17px">
                                <a href="<?php echo e(url('user/profile')); ?>"
                                    class="profile d-block <?php if(session('related_account') == 'profile'): ?>
                                    active
                                <?php endif; ?>"><span>Hồ
                                        sơ</span></a>
                                <a href="<?php echo e(url('user/changePass')); ?>"  class="changePass d-block <?php if(session('related_account') == 'changePass'): ?>
                                active
                            <?php endif; ?>"><span>Đổi mật khẩu</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="inf_3">
                        <div class="orders d-flex">
                            <img src="<?php echo e(asset('client/images/order.png')); ?>"
                                style="font-size: 20px; color:#0984e3; width:20%" alt="">
                            
                            <a href="<?php echo e(url('user/purchase')); ?>"
                                class=" <?php if(session('related_account') == 'purchase'): ?>
                            active
                        <?php endif; ?>">Đơn
                                mua</a>
                        </div>
                    </div>
                </div>
                <div id="inner_info">
                    <?php echo $__env->yieldContent('inner_info'); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/layouts/account.blade.php ENDPATH**/ ?>