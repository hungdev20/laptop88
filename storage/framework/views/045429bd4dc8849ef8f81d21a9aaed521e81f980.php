
<?php $__env->startSection('title', 'Edit quyền'); ?>
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
                        Cập nhật quyền
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('permission.update', $permission_info->id)); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="<?php echo e($permission_info->name); ?>">
                                <?php $__errorArgs = ['name'];
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
                                <label for="display_name">Display Name</label>
                                <input class="form-control" type="text" name="display_name" id="display_name"
                                    value="<?php echo e($permission_info->display_name); ?>">
                                <?php $__errorArgs = ['display_name'];
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
                                <label for="module_parent">Chọn tên module</label>
                                <select name="module_parent" class="custom-select">
                                    <option value="">Chọn tên module</option>
                                    <?php $__currentLoopData = $permissionParent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moduleItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($moduleItem->id); ?>" <?php if($permission_info->parent_id == $moduleItem->id): ?>
                                            selected
                                        <?php endif; ?>><?php echo e($moduleItem->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['module_parent'];
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
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold d-flex justify-content-between">
                        <h5 class="m-0 ">Danh sách quyền</h5>
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
                    <a href="<?php echo e(Request::url()); ?>?status=active" class="text-primary">Đã
                        đăng<span class="text-muted">(<?php echo e($data[1]); ?>)</span></a>
                  
                    <a href="<?php echo e(Request::url()); ?>?status=trash" class="text-primary">Thùng
                        rác<span class="text-muted">(<?php echo e($data[0]); ?>)</span></a>
            
                        </div>
                        <form action="<?php echo e(route('permission.action')); ?>" method="POST">
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
                                        <th scope="col">Tên</th>
                                        <th scope="col">Display name</th>
                                        <th scope="col">Key code</th>
                                        <th scope="col">Người tạo</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($listpermission->total() > 0): ?>
                                        <?php
                                            
                                            $t = 0;
                                            
                                        ?>
                                        <?php $__currentLoopData = $listpermission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                
                                                $t++;
                                                
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="checkItem[]" value="<?php echo e($item->id); ?>">
                                                </td>
                                                <td scope="row"><?php echo e($t); ?></td>
                                                <td class="name"><a href="#"><?php echo e($item->name); ?></a></td>
                                                <td class="display_name"><a href="#"><?php echo e($item->display_name); ?></a></td>
                                                <td class="keycode"><a href="#"><?php echo e($item->key_code); ?></a></td>
                                                <td class="creator"><a href="#"><?php echo e($item->user->name); ?></a></td>
                                                <td><?php echo e($item->created_at); ?></td>
                                                <?php if(Auth::id() == $item->user_id): ?>
                                                    <td>
                                                        <a href="<?php echo e(route('edit.permission', $item->id)); ?>"
                                                            class="btn btn-success btn-sm rounded-0 text-white"
                                                            type="button" data-toggle="tooltip" data-placement="top"
                                                            title="Edit"><i class="fa fa-edit"></i></a>
                                                        <?php if($status != 'trash'): ?>
                                                            <a href="<?php echo e(route('delete.permission', $item->id)); ?>"
                                                                class="btn btn-danger btn-sm rounded-0 text-white"
                                                                type="button" data-toggle="tooltip" data-placement="top"
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
                        <?php echo e($listpermission->appends($append)->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/admin/permission/edit.blade.php ENDPATH**/ ?>