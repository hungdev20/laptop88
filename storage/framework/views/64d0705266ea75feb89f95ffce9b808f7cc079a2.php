<?php

use App\Parameter_pro;

use App\Product_cat;

?>


<?php $__env->startSection('title', 'Edit sản phẩm'); ?>
<?php $__env->startSection('content'); ?>

    <div id="content" class="container-fluid">

        <div class="card"> 

            <?php if(session('status')): ?>

                <div class="alert alert-success">

                    <?php echo e(session('status')); ?>

                </div>

            <?php endif; ?>

            <div class="card-header font-weight-bold">

                Thêm sản phẩm

            </div>

            <div class="card-body" id="productReturnedInfo" data-id="<?php echo e($id); ?>">

                <form action="<?php echo e(route('update.product', $product_info->id)); ?>" method="POST"

                    enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="row">

                        <div class="col-6">

                            <div class="form-group">

                                <label for="product_title">Tên sản phẩm</label>

                                <input class="form-control" type="text" name="product_title" id="product_title"

                                    value="<?php echo e($product_info->product_title); ?>">

                                <?php $__errorArgs = ['product_title'];
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

                                <label for="title">Slug ( Friendly_url )</label>

                                <input type="text" class="form-control" name="slug" id="slug"

                                    value="<?php echo e($product_info->slug); ?>">

                                <?php $__errorArgs = ['slug'];
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

                                <label for="code">Mã sản phẩm</label>

                                <input class="form-control" type="text" name="code" id="code"

                                    value="<?php echo e($product_info->code); ?>">

                                <?php $__errorArgs = ['code'];
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

                                <label for="price">Giá sản phẩm</label>

                                <input class="form-control" type="text" name="price" id="price"

                                    value="<?php echo e($product_info->price); ?>">

                                <?php $__errorArgs = ['price'];
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

                                <label for="qty">Số lượng</label>

                                <input class="form-control" type="number" min="1" name="qty" id="qty"

                                    value="<?php echo e($product_info->qty); ?>">

                                <?php $__errorArgs = ['qty'];
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

                                <label for="special_offer">Khuyến mại</label>

                                <textarea name="special_offer" class="form-control" id="special_offer" cols="30"

                                    rows="5"><?php echo e($product_info->special_offer); ?></textarea>

                                <?php $__errorArgs = ['special_offer'];
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



                        </div>

                        <div class="col-6">

                            <div class="form-group">

                                <label for="intro">Mô tả ngắn</label>

                                <textarea name="intro" class="form-control" id="intro" cols="30"

                                    rows="5"><?php echo e($product_info->intro); ?></textarea>

                                <?php $__errorArgs = ['intro'];
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

                        </div>



                    </div>

                    <div class="form-group">

                        <label for="description">Chi tiết sản phẩm</label>

                        <textarea name="description" class="form-control" id="description" cols="30"

                            rows="8"><?php echo e($product_info->description); ?></textarea>

                        <?php $__errorArgs = ['description'];
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

                        <label>Hình ảnh</label>

                        <div id="uploadFile" class="___class_+?30___">

                            <input type="file" name="images[]" id="multiple_files" multiple=""

                                data-uri="<?php echo e(route('fetchData')); ?>">

                            <input type="submit" id="bt_upload" name="bt_upload" value="Upload">

                            <?php $__errorArgs = ['images.*'];
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

                            <div class="mt-1" id="product_image" style="width:200px">

                                <img src="<?php echo e(url($product_info->thumbnail)); ?>" class="img img-responsive" alt="">

                            </div>

                            <span class="d-block" data-uri="<?php echo e(route('ajaxUpload')); ?>"

                                id="error_multiple_files"></span>

                            <div class="table-responsive mt-2" id="image_table">

                                <?php if(count($image_data) > 0): ?>

                                    <?php

                                        $count = 0;

                                    ?>

                                    <table class="table table-bordered table-triped">

                                        <tr>

                                            <th>Thứ tự</th>

                                            <th>Hình ảnh</th>

                                            <th>Đường dẫn ảnh</th>

                                            <th>Delete</th>

                                        </tr>

                                        <?php

                                            session()->forget('imageIdReturned');

                                        ?>

                                        <?php $__currentLoopData = $image_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php

                                                $count++;

                                            ?>

                                            <tr>

                                                <td><?php echo e($count); ?></td>

                                                <td><img src=" <?php echo e(url("uploads/products/subImages/{$image->path_img}")); ?>"

                                                        class="img img-thumbnail" width="100" height="100"></td>

                                                <td><?php echo e($image->path_img); ?> </td>

                                                <td><button class="btn btn-danger delete"

                                                        data-image_name="<?php echo e($image->path_img); ?>"

                                                        id="<?php echo e($image->id); ?>"

                                                        data-uri="<?php echo e(route('delete.images')); ?>">Delete</button></td>

                                            </tr>

                                            <?php

                                                session()->push('imageIdReturned', $image->id);

                                            ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </table>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="list_cat">Danh mục cha</label>

                        <select class="form-control" name="list_cat" id="list_proCat"

                            data-uri="<?php echo e(route('fetchPara')); ?>">

                            <option value="0">Chọn danh mục</option>

                            <?php $__currentLoopData = $list_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($v->id); ?>" <?php if($product_info->cats->first()->id == $v->id): ?>

                                    selected

                            <?php endif; ?>><?php echo e(str_repeat('--', $v->level) . $v->cat_title); ?>

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

                    <div id="paraProduct">

                        <?php

                            if (session()->has('nameInput')) {

                                session()->forget('nameInput');

                            }

                            

                        ?>

                        <div class="text-danger font-weight-bold mb-1">*Lựa chọn thông số sản phẩm</div>



                        <?php $__currentLoopData = $paraParents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php

                                session()->push('nameInput', $item->paraEng);

                                // lấy tất cả các thông số con của acer trong bảng parameterpro_cats với điều kiện là parent_id phải bằng item->id

                                $groupParaChild = Product_cat::find($product_info->cats->first()->id)->paras->where('parent_id', $item->id);

                            ?>



                            <span class="paraParentTitle font-weight-bold"><?php echo e($item->para_title); ?></span>

                            <div class="form-group">

                                <?php $__currentLoopData = $groupParaChild; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-check">

                                        <input type="checkbox" name="<?php echo e($item->paraEng); ?>[]"

                                            value="<?php echo e($itemChild->para_title); ?>" id="<?php echo e($itemChild->id); ?>"

                                            class="form-check-input" <?php $__currentLoopData = $paraPro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemPro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($itemPro->id == $itemChild->id): ?>

                                            checked

                                        <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>

                                <label for="<?php echo e($itemChild->id); ?>" class="form-check-label"><?php echo e($itemChild->para_title); ?></label>

                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>



            <div class="form-check">

                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="passive"

                    <?php if($product_info->status == 'passive'): ?> checked <?php endif; ?>>

                <label class="form-check-label" for="exampleRadios1">

                    Chờ duyệt

                </label>

            </div>

            <div class="form-check">

                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="active"

                    <?php if($product_info->status == 'active'): ?> checked <?php endif; ?>>

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

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh2\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>