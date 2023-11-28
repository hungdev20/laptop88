
<?php $__env->startSection('title', $post_info->post_title); ?>
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="wp-homepage">
        <div id="wrapper">
            <?php echo $__env->make('layouts.breadcrumb', compact('post_info', 'post_vertical'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="main-content">
                <div id="detail-post" class="pb-3">
                    <div id="post-title">
                        <h1><?php echo e($post_info->post_title); ?></h1>
                    </div>
                    <small class="date text-muted"> <i class="fa fa-clock-o"></i><?php echo e($post_info->created_at); ?></small>
                    <div id="content">
                       <?php echo $post_info->content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\TungHaiPc\resources\views/client/posts/detail.blade.php ENDPATH**/ ?>