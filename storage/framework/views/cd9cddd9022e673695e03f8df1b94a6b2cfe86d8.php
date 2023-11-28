<?php $__env->startSection('title', 'Thêm banner'); ?><?php $__env->startSection('content'); ?>    <div id="content" class="container-fluid">        <div class="card">            <?php if(session('status')): ?>                <div class="alert alert-success">                    <?php echo e(session('status')); ?>                </div>            <?php endif; ?>            <div class="card-header font-weight-bold">                Thêm Media            </div>            <div class="card-body">                <form action="<?php echo e(route('store.media')); ?>" method="POST" enctype="multipart/form-data">                    <?php echo csrf_field(); ?>                    <div class="form-group">                        <label for="media_title">Tiêu đề Media</label>                        <input class="form-control" type="text" name="media_title" id="media_title"                            value="<?php echo e(request()->old('media_title')); ?>">                        <?php $__errorArgs = ['media_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                            <small class="form-text text-danger">                                <?php echo e($message); ?>                            </small>                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    </div>                    <div class="form-group">                        <label for="link">Link</label>                        <input type="text" class="form-control" name="link" id="link"                            value="<?php echo e(request()->old('link')); ?>">                        <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                            <small class="form-text text-danger">                                <?php echo e($message); ?>                            </small>                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    </div>                    <div class="form-group">                        <label for="description">Mô tả</label>                        <textarea name="description" class="form-control" id="description" cols="30"                            rows="10"><?php echo e(request()->old('description')); ?></textarea>                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                            <small class="form-text text-danger">                                <?php echo e($message); ?>                            </small>                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    </div>                    <div class="form-group">                        <label>Hình ảnh</label>                        <div id="uploadFile">                            <input type="file" name="file" id="upload-slider">                            <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                                <small class="form-text text-danger">                                    <?php echo e($message); ?>                                </small>                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                        </div>                    </div>                    <div class="form-check">                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="passive"                            checked>                        <label class="form-check-label" for="exampleRadios1">                            Chờ duyệt                        </label>                    </div>                    <div class="form-check">                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="active">                        <label class="form-check-label" for="exampleRadios2">                            Công khai                        </label>                    </div>                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                        <small class="form-text text-danger">                            <?php echo e($message); ?>                        </small>                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    <button type="submit" name="btn_add" class="btn btn-primary">Thêm mới</button>                </form>            </div>        </div>    </div><?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manhhungunitopcv/public_html/resources/views/admin/media/add.blade.php ENDPATH**/ ?>