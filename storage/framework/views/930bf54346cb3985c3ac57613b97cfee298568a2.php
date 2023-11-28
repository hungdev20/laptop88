
<?php $__env->startSection('title', 'Edit setting'); ?>
<?php $__env->startSection('content'); ?>

    <div id="content" class="container-fluid">

        <div class="card">

            <?php if(session('status')): ?>

                <div class="alert alert-success">

                    <?php echo e(session('status')); ?>


                </div>

            <?php endif; ?>

            <div class="card-header font-weight-bold">

                Edit Setting

            </div>

            <div class="card-body">



                <form action="<?php echo e(route('update.settings',$setting->id)); ?>" method="POST" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="form-group">

                        <label for="config_key">Config key</label>

                        <input class="form-control <?php $__errorArgs = ['config_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="config_key" id="config_key"
                            value="<?php echo e($setting->config_key); ?>" placeholder="Nhập config key">

                        <?php $__errorArgs = ['config_key'];
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

                        <label for="config_value">Config value</label>
                        <?php if(request()->type === 'Text'): ?>
                            <input class="form-control <?php $__errorArgs = ['config_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="config_value" id="config_value"
                                value="<?php echo e($setting->config_value); ?>" placeholder="Nhập config value">
                        <?php elseif(request()->type === 'Textarea'): ?>
                            <textarea class="form-control settings <?php $__errorArgs = ['config_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="config_value" id="config_value"
                             placeholder="Nhập config value" rows="5"><?php echo e($setting->config_value); ?></textarea>
                        <?php endif; ?>
                        <?php $__errorArgs = ['config_value'];
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
                    <button type="submit" class="btn btn-primary">Cập nhật</button>

                </form>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/admin/settings/edit.blade.php ENDPATH**/ ?>