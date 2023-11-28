<?php

use App\Product_cat;

?>

<nav aria-label="breadcrumb" style="padding-top: 20px">

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>

        <?php if(!empty($slugLastCat)): ?>

            <?php
                
                $parent_id = Product_cat::find($id)->parent_id;
                
                $all = Product_cat::all();
                
                $groupId = array_reverse(find_parentId($all, $parent_id));
                
            ?>

            <?php if(!empty($groupId)): ?>

                <?php $__currentLoopData = $groupId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                        
                        $productCat = Product_cat::find($id1);
                        
                        $parentTitle = $productCat->cat_title;
                        
                        $slug = $productCat->slug;
                        
                    ?>

                    <li class="breadcrumb-item"><a
                            href="<?php echo e(route('productCat', [$slug, $id1])); ?>"><?php echo e($parentTitle); ?></a>

                    </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

            <li class="breadcrumb-item"><a
                    href="<?php echo e(route('productCat', [$slugLastCat, $id])); ?>"><?php echo e($productCatTitle); ?></a></li>

            <?php if(!empty($productDetail)): ?>

                <li class="breadcrumb-item"><a
                        href="<?php echo e(route('productDetail', [$productDetail->slug, $productDetail->id])); ?>"><?php echo e($productDetail->product_title); ?></a>

                </li>

            <?php endif; ?>

        <?php elseif(!empty($page_info)): ?>

            <li class="breadcrumb-item"><a
                    href="<?php echo e(route('pages', [$page_info->slug, $id])); ?>"><?php echo e($page_info->page_title); ?></a>

            </li>

        <?php elseif(!empty($post_vertical)): ?>

            <li class="breadcrumb-item"><a href="">Tin tức công nghệ</a>

            </li>

            <?php if(!empty($post_info)): ?>

                <li class="breadcrumb-item"><a
                        href="<?php echo e(route('post_detail', [$post_info->slug, $post_info->id])); ?>"><?php echo e($post_info->post_title); ?></a>

                </li>

            <?php endif; ?>
        <?php elseif(!empty($provinces)): ?>
            <li class="breadcrumb-item"><a href="thanh-toan">Thanh toán</a>
        <?php endif; ?>



    </ol>

</nav>
<?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh2\resources\views/layouts/breadcrumb.blade.php ENDPATH**/ ?>