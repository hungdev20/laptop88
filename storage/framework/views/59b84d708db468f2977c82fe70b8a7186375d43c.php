<?php
use App\Parameter_pro;
?>

<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật danh mục
            </div>
            <div class="card-body" id="catReturnedInfo" data-id="<?php echo e($id); ?>">
                <form action="<?php echo e(route('update.cat', $cat_info->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="cat_title">Tên danh mục</label>
                        <input class="form-control" type="text" name="cat_title" id="cat_title"
                            value="<?php echo e($cat_info->cat_title); ?>">
                        <?php $__errorArgs = ['cat_title'];
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
                        <label for="list_cat">Danh mục cha</label>
                        <select class="form-control" name="list_cat" id="">
                            <option value="0">Chọn danh mục</option>
                            <?php $__currentLoopData = $list_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->id); ?>" <?php if($cat_info->parent_id == $v->id): ?> selected <?php endif; ?>>
                                    <?php echo e(str_repeat('--', $v->level) . $v->cat_title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['list_cat'];
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
                        <label>Icon danh mục lớn</label>
                        <div id="uploadFile">
                            <input type="file" class="form-control-file" name="file">
                            <?php $__errorArgs = ['file'];
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
                            <div class="mt-1" id="productCat_image" style="width:200px">
                                <img src="<?php echo e(url('uploads/product-cat/' . $cat_info->file)); ?>" class="img img-responsive" alt="">
                            </div>
                        </div>
                    </div>
                    <?php $__currentLoopData = $groupParaParent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            session()->push('nameInputReturned', $item->paraEng);
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label for="parent_cat" class="text-danger">Danh mục thông số:</label>
                        <div class="form-group">
                            <?php $__currentLoopData = $parent_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check-inline">
                                    <input type="checkbox" name="parent_cat[]" id="<?php echo e($v->paraEng); ?>" value="<?php echo e($v->id); ?>"
                                        class="form-check-input list_para" data-uri="<?php echo e(route('fetchParaForProCat')); ?>"
                                        data-uri1="<?php echo e(route('deleteParaForProCat')); ?>" <?php if(!empty(session('nameInputReturned'))): ?>{
                                    <?php $__currentLoopData = session('nameInputReturned'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($name == $v->paraEng): ?>
                                            checked
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>}
                            >
                            <label for="<?php echo e($v->paraEng); ?>" class="form-check-label"><?php echo e($v->para_title); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <?php $__errorArgs = ['parent_cat'];
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
            <?php if(!empty($groupParaParent)): ?>


                <div id="paraProductForCatPro">
                    <div class="text-danger font-weight-bold mb-1">*Lựa chọn thông số sản phẩm</div>
                    <?php $__currentLoopData = $groupParaParent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            
                            $paraChildren = Parameter_pro::where('parent_id', $item->id)->get();
                        ?>
                        <span class="paraParentTitle font-weight-bold"><?php echo e($item->para_title); ?></span>
                        <div class="form-group">
                            <?php $__currentLoopData = $paraChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input type="checkbox" name="<?php echo e($item->paraEng); ?>[]"
                                        value="<?php echo e($itemChild->para_title); ?>" id="<?php echo e($itemChild->id); ?>"
                                        class="form-check-input" <?php $__currentLoopData = $paraOfCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemPara): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($itemPara->id == $itemChild->id): ?>
                                        checked
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                            <label for="<?php echo e($itemChild->id); ?>" class="form-check-label"><?php echo e($itemChild->para_title); ?></label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <?php endif; ?>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="passive"
                <?php if($cat_info->status == 'passive'): ?> checked <?php endif; ?>>
            <label class="form-check-label" for="exampleRadios1">
                Chờ duyệt
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="active"
                <?php if($cat_info->status == 'active'): ?> checked <?php endif; ?>>
            <label class="form-check-label" for="exampleRadios2">
                Công khai
            </label>
        </div>
        <?php $__errorArgs = ['status'];
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manhhungunitopcv/public_html/resources/views/admin/product_cat/edit.blade.php ENDPATH**/ ?>