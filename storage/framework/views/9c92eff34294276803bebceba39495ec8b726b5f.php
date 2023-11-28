<?php $__env->startSection('title', 'Thêm danh mục bài viết'); ?><?php $__env->startSection('content'); ?>    <div id="content" class="container-fluid">        <div class="card">            <div class="card-header font-weight-bold">                Thêm danh mục bài viết            </div>            <div class="card-body">                <form action="<?php echo e(route('store.post_cat')); ?>" method="POST">                    <?php echo csrf_field(); ?>                    <div class="form-group">                        <label for="cat_title">Tên danh mục</label>                        <input class="form-control" type="text" name="cat_title" id="cat_title"                            value="<?php echo e(request()->old('cat_title')); ?>">                        <?php $__errorArgs = ['cat_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                            <small class="form-text text-danger">                                <?php echo e($message); ?>                            </small>                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    </div>                    <div class="form-group">                        <label for="slug">Slug ( Friendly_url )</label>                        <input type="text" class="form-control" name="slug" id="slug"                            value="">                        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                            <small class="form-text text-danger">                                <?php echo e($message); ?>                            </small>                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    </div>                    <div class="form-group">                        <label for="list_cat">Danh mục cha</label>                        <select class="form-control" name="list_cat" id="">                            <option value="0">Chọn danh mục</option>                            <?php $__currentLoopData = $list_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                <option value="<?php echo e($v->id); ?>"><?php echo e(str_repeat('--', $v->level) . $v->cat_title); ?>                                </option>                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        </select>                        <?php $__errorArgs = ['list_cat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                            <small class="form-text text-danger">                                <?php echo e($message); ?>                            </small>                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    </div>                    <div class="form-check">                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="passive"                            checked>                        <label class="form-check-label" for="exampleRadios1">                            Chờ duyệt                        </label>                    </div>                    <div class="form-check">                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="active">                        <label class="form-check-label" for="exampleRadios2">                            Công khai                        </label>                    </div>                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>                        <small class="form-text text-danger">                            <?php echo e($message); ?>                        </small>                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                    <button type="submit" name="btn_add" class="btn btn-primary">Thêm mới</button>                            </div>        </div>    </div><?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/admin/post_cat/add.blade.php ENDPATH**/ ?>