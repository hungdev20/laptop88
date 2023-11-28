
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-header font-weight-bold">
                        Thêm mới
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('store.menu')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="menu_title">Tên menu</label>
                                <input class="form-control" type="text" name="menu_title" id="menu_title" value="<?php echo e(request()->old('menu_title')); ?>">
                                <?php $__errorArgs = ['menu_title'];
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
                                <label for="slug">Đường dẫn tĩnh</label>
                                <input class="form-control" type="text" name="slug" id="slug" value="<?php echo e(request()->old('slug')); ?>">
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
                                <small class="text-muted">Chuỗi đường dẫn tĩnh cho menu</small>
                            </div>
                            <div class="form-group">
                                <label for="menu_title">Class icon</label>
                                <input class="form-control" type="text" name="icon" id="icon" value="<?php echo e(request()->old('icon')); ?>">
                                <?php $__errorArgs = ['icon'];
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
                                <label for="page">Trang</label>
                                <select class="form-control" name="pages" id="">
                                    <option value="">Chọn danh mục</option>
                                    <?php $__currentLoopData = $list_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($v->id); ?>" <?php if(request()->old('pages') == $v->id): ?>
                                            selected
                                        <?php endif; ?>><?php echo e($v->page_title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <small class="text-muted">Trang liên kết đến menu</small>
                            </div>
                            <div class="form-group">
                                <label for="product_cats">Danh mục sản phẩm</label>
                                <select class="form-control" name="product_cats" id="product_cats">
                                    <option value="">Chọn danh mục</option>
                                    <?php $__currentLoopData = $list_procats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($v->id); ?>" <?php if(request()->old('product_cats') == $v->id): ?>
                                            selected
                                        <?php endif; ?>>
                                            <?php echo e(str_repeat('--', $v->level) . $v->cat_title); ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <small class="text-muted">Danh mục sản phẩm liên kết đến menu</small>
                            </div>
                            <div class="form-group">
                                <label for="post_cats">Danh mục bài viết</label>
                                <select class="form-control" name="post_cats" id="post_cats">
                                    <option value="">Chọn danh mục</option>
                                    <?php $__currentLoopData = $list_postcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($v->id); ?>"  <?php if(request()->old('post_cats') == $v->id): ?>
                                            selected
                                        <?php endif; ?>>
                                            <?php echo e(str_repeat('--', $v->level) . $v->cat_title); ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small class="text-muted">Danh mục bài viết liên kết đến menu</small>

                            </div>
                            <div class="form-group">
                                <label for="order" class="d-block">Thứ tự</label>
                                <input type="text" class="" name="order" id="order"
                                    value="<?php echo e(request()->old('order')); ?>">
                                <?php $__errorArgs = ['order'];
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                    value="passive" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Chờ duyệt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2"
                                    value="active">
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

                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold d-flex justify-content-between">
                        <h5 class="m-0 ">Danh sách Menu</h5>
                        <div class="form-search form-inline">
                            <form action="#">
                                <?php if($status): ?>
                                    <input type="hidden" name="status" value="<?php echo e($status); ?>">
                                <?php endif; ?>
                                <input type="" class="form-control form-search" name="keyword"
                                    value="<?php echo e(request()->input('keyword')); ?>" placeholder="Tìm kiếm">
                                <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="analytic">
                            <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'active'])); ?>" class="text-primary">Đã
                                đăng<span class="text-muted">(<?php echo e($data[1]); ?>)</span></a>
                            <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'passive'])); ?>" class="text-primary">Chờ
                                duyệt<span class="text-muted">(<?php echo e($data[2]); ?>)</span></a>
                            <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'trash'])); ?>" class="text-primary">Thùng
                                rác<span class="text-muted">(<?php echo e($data[0]); ?>)</span></a>
                        </div>
                        <form action="<?php echo e(route('menu.action')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-action form-inline py-3">
                                <select class="form-control mr-1" name="act" id="">
                                    <option>Chọn</option>
                                    <?php $__currentLoopData = $act; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="submit" name="btn-search"
                                    onclick="return confirm('Bạn có chắc chắn muốn thực hiện thao tác này?')"
                                    value="Áp dụng" class="btn btn-primary">
                            </div>
                            <table class="table table-striped table-responsive table-checkall">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <input name="checkall" type="checkbox">
                                        </th>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên menu</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Thứ tự</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($menu->total() > 0): ?>
                                        <?php
                                            $t = 0;
                                        ?>
                                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $t++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="checkItem[]" value="<?php echo e($item->id); ?>">
                                                </td>
                                                <td scope="row"><?php echo e($t); ?></td>
                                                <td class="menu_title"><a href="#"><?php echo e($item->menu_title); ?></a></td>
                                                <td class="slug"><a href="#"><?php echo e($item->slug); ?></a></td>
                                                <td class="order"><a href="#"><?php echo e($item->order); ?></a></td>

                                                <td <?php if($item->status == 'passive'): ?>
                                                    style="color:red"
                                                <?php else: ?>
                                                    style="color:green"
                                        <?php endif; ?>>
                                        <?php echo e($item->status); ?>
                                        </td>
                                       
                                  
                                        <?php if(Auth::id() == $item->user_id): ?>
                                            <td>
                                                <a href="<?php echo e(route('edit.menu', $item->id)); ?>"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <?php if($status != 'trash'): ?>
                                                    <a href="<?php echo e(route('delete.menu', $item->id)); ?>"
                                                        class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                        data-toggle="tooltip" data-placement="top"
                                                        onclick="return confirm('Bạn có chắc muốn xóa danh mục này ?')"
                                                        title="Delete"><i class="fa fa-trash"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="bg-white">
                                            Không tìm thấy bản ghi
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </form>
                        <?php echo e($menu->appends($append)->links()); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh\resources\views/admin/menu/menu.blade.php ENDPATH**/ ?>