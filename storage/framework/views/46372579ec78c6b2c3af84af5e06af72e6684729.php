
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header p-3 font-weight-bold justify-content-between align-items-center">
                <h5 class="m-0 ">Chi tiết trang</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <?php echo $page_info->title; ?>

                        </div>
                        <div class="page-content">
                            <?php echo $page_info->content; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/admin/page/detail.blade.php ENDPATH**/ ?>