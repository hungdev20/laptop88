
<?php $__env->startSection('title', 'Tin tức công nghệ'); ?>
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="container"> 
        <div class="wp-inner">
            <div id="main-content">
                <?php echo $__env->make('layouts.breadcrumb', compact('post_vertical'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                <div class="section images-related-tech row no-gutters">
                    <a class="main-img col-md-8 d-block" style="position: relative"
                        href="<?php echo e(route('post_detail', [$post_newest1->slug, $post_newest1->id])); ?>">
                        <img src="<?php echo e(url('uploads/posts/' . $post_newest1->thumbnail)); ?>" alt="" class="d-block">
                        <div class="inner-text">
                            <div class="contain-text1">
                                <h1 style="font-size: 40px; line-height:67px"><?php echo e($post_newest1->post_title); ?></h1>
                            </div>
                        </div>
                    </a>
                    <div class="col-md-4 sub-images">
                        <?php $__currentLoopData = $post_newest2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="sub-1">
                                <a href="<?php echo e(route('post_detail', [$post_new->slug, $post_new->id])); ?>"
                                    class="d-block" style="width: 100%; position: relative">
                                    <img src="<?php echo e(url('uploads/posts/' . $post_new->thumbnail)); ?>" class="d-block"
                                        alt="">
                                        <div class="inner-text">
                                            <div class="contain-text">
                                                <h1 style="font-size: 24px; line-height:42px"><?php echo e($post_new->post_title); ?></h1>
                                            </div>
                                        </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="section post-about-pro">
                    <h2 class="box-title">
                        Tin về sản phẩm
                    </h2>
                    <ul class="post-container row my-3">
                        <?php $__currentLoopData = $post_vertical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class=" col-lg-3 col-md-4 col-sm-6">
                                <div class="card-post">
                                    <a href="<?php echo e(route('post_detail', [$post->slug, $post->id])); ?>"
                                        class="pro-thumb d-block">
                                        <img src="<?php echo e(url('uploads/posts/' . $post->thumbnail)); ?>" alt=""
                                            class="d-block">
                                    </a>
                                    <div class="cp-body">
                                        <a href="<?php echo e(route('post_detail', [$post->slug, $post->id])); ?>"
                                            class="post-name d-block"> <?php echo e(Str::of($post->post_title)->limit(52)); ?>

                                        </a>
                                        <div class="other-info">
                                            <small class="date text-muted"> <i
                                                    class="fa fa-clock-o"></i><?php echo e($post->created_at); ?></small>
                                            <div class="excerpt">
                                                <?php echo Str::words($post->content, 14); ?>

                                            </div>
                                        </div>
                                    </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div id="post-horizon">
                        <?php $__currentLoopData = $list_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item row mb-4">
                                <div class="post-thumb col-md-4">
                                    <a href="<?php echo e(route('post_detail', [$item->slug, $item->id])); ?>"
                                        class="d-block">
                                        <img src="<?php echo e(url('uploads/posts/' . $item->thumbnail)); ?>" alt=""
                                            class="d-block">
                                    </a>
                                </div>
                                <div class="post-content col-md-8">
                                    <a href="<?php echo e(route('post_detail', [$item->slug, $item->id])); ?>"
                                        class="post-title"><?php echo e($item->post_title); ?></a>
                                    <div class="other-info">
                                        <small class="date text-muted"> <i
                                                class="fa fa-clock-o"></i><?php echo e($item->created_at); ?></small>
                                        <div class="author">
                                            By <span><?php echo e($item->user->name); ?></span>
                                        </div>
                                        <div class="post-excerpt">
                                            <?php echo Str::words($item->content, 10); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div id="pagination" class="text-center" data_id = "<?php echo e($id); ?>">
                            <?php
                                echo get_pagging($num_page, $page, route('posts', [$slug, $id]));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/client/posts/index.blade.php ENDPATH**/ ?>