
<?php $__env->startSection('title', $page_info->page_title); ?>
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp">
        <div id="wrapper"> 
            <?php echo $__env->make('layouts.breadcrumb', compact('page_info', 'id'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="main-content">
                <div id="page-info">
                    <div class="page-title">
                        <h1><?php echo e($page_info->page_title); ?></h1>
                    </div>
                    <div id="content">
                        <?php echo $page_info->content; ?>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/client/pages/index.blade.php ENDPATH**/ ?>