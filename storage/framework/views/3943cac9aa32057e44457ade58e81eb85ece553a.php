
<?php $__env->startSection('title', 'Global Setting'); ?>

<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>
                </div>
            <?php endif; ?>
            <div class="card-header font-weight-bold">
                Global Setting
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('globalSetting.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="header">HEADER SCRIPTS</label>
                        <textarea name="header" class="form-control globalSetting" id="header" cols="30" rows="10"><?php if(!empty($scriptHead)): ?>
                                <?php echo e($scriptHead); ?>
                            <?php endif; ?></textarea>
                        <small class="form-text text-muted">
                            Add custom scripts inside HEAD tag. You need to have script tag around scripts
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="header">FOOTER SCRIPTS</label>
                        <textarea name="footer" class="form-control globalSetting" id="footer" cols="30" rows="10"><?php if(!empty($scriptFooter)): ?>
                            <?php echo e($scriptFooter); ?>
                        <?php endif; ?></textarea>

                        <small class="form-text text-muted">
                            Add custom scripts you might want to be loaded in the footer of your website. You need to have script tag around scripts
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="header">BODY SCRIPTS - TOP</label>
                        <textarea name="bodyTop" class="form-control globalSetting" id="bodyTop" cols="30" rows="10"><?php if(!empty($scriptBodyTop)): ?>
                            <?php echo e($scriptBodyTop); ?>
                        <?php endif; ?></textarea>

                        <small class="form-text text-muted">
                            Add custom scripts just after the BODY tag opened. You need to have script tag around scripts
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="header">BODY SCRIPTS - BOTTOM</label>
                        <textarea name="bodyBottom" class="form-control globalSetting" id="bodyBottom" cols="30" rows="10"><?php if(!empty($scriptBottom)): ?>
                            <?php echo e($scriptBodyBottom); ?>
                        <?php endif; ?></textarea>

                        <small class="form-text text-muted">
                            Add custom scripts just before the BODY tag closed. You need to have script tag around scripts
                        </small>

                    </div>
                    <button type="submit" name="btn_add" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/admin/advancedOption/globalSetting/add.blade.php ENDPATH**/ ?>