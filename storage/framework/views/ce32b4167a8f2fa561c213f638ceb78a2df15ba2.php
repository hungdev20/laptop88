
<?php $__env->startSection('title', 'Danh sách sản phẩm còn hàng'); ?>
<?php $__env->startSection('content'); ?>

    <div id="content" class="container-fluid">

        <div class="card">

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">

                <h5 class="m-0 ">Danh sách sản phẩm còn hàng</h5>

                <div class="form-search">

                    <form action="#" class="form-inline">

                        <input type="" class="form-control form-search mr-1" name="keyword"
                            value="<?php echo e(request()->input('keyword')); ?>" placeholder="Tìm kiếm">

                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">

                    </form>

                </div>

            </div>

            <div class="card-body">

                <table class="table table-striped table-checkall">

                    <thead>

                        <tr>

                            <th scope="col">

                                <input name="checkall" type="checkbox">

                            </th>

                            <th scope="col">#</th>

                            <th scope="col">Ảnh</th>

                            <th scope="col">Tên sản phẩm</th>

                            <th scope="col">Giá</th>
                            <th scope="col">Danh mục</th>

                            <th scope="col">Người tạo</th>

                            <th scope="col">Ngày tạo</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if($products->total() > 0): ?>

                            <?php
                                
                                $t = 0;
                                
                            ?>

                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    
                                    $t++;
                                    
                                ?>

                                <tr class="">

                                    <td>

                                        <input type="checkbox" name="checkItem[]" value="<?php echo e($product->id); ?>">

                                    </td>

                                    <td><?php echo e($t); ?></td>

                                    <td>

                                        <div class="tbody-thumb">

                                            <img src="<?php echo e(url($product->thumbnail)); ?>" alt="">

                                        </div>

                                    </td>

                                    <td class="title">

                                        <div>

                                            <a
                                                href="<?php echo e(route('product.detail', $product->id)); ?>"><?php echo e($product->product_title); ?></a>

                                        </div>

                                    </td>

                                    <td><?php echo e(number_format($product->price, 0, ',', '.')); ?>đ</td>

                                    <td><?php echo e($product->cats->first()->cat_title); ?></td>

                                    <td><?php echo e($product->name); ?></td>

                                    <td><?php echo e($product->created_at); ?></td>

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


                <?php echo e($products->links()); ?>


            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/admin/product/inventory.blade.php ENDPATH**/ ?>