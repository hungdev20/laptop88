
<?php $__env->startSection('title', 'Danh sách role'); ?>
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <div class="card">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <div class="card-header font-weight-bold d-flex justify-content-between">
                <h5 class="m-0 ">Danh sách Quyền</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive table-checkall" id="table_role">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">STT</th>
                            <th scope="col">Name</th>
                            <th scope="col">Display Name</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($role->total() > 0): ?>
                            <?php
                                
                                $t = 0;
                                
                            ?>
                            <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    
                                    $t++;
                                    
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkItem[]" value="<?php echo e($item->id); ?>">
                                    </td>
                                    <td scope="row"><?php echo e($t); ?></td>
                                    <td class="menu_title"><a href="#"><?php echo e($item->name); ?></a></td>
                                    <td class="slug"><a href="#"><?php echo e($item->display_name); ?></a></td>
                                    <?php if(!empty($roleOfUser)): ?>
                                        <td>
                                            <a href="<?php echo e(route('role.edit', $item->id)); ?>"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <?php if(!$roleOfUser->contains($item->id)): ?>
                                                <a href="<?php echo e(route('role.delete', $item->id)); ?>"
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
                <?php echo e($role->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/admin/role/index.blade.php ENDPATH**/ ?>