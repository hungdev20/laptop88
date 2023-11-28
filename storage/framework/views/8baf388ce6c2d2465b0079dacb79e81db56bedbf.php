<?php
use App\Product_cat;
?>
<!DOCTYPE html>
<html>

<head>
    <title>ISMART STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?php echo e(asset('client/reset.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('client/css/carousel/owl.carousel.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('client/css/carousel/owl.theme.css')); ?>" rel="stylesheet" type="text/css" />
    
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="<?php echo e(asset('client/style.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('client/responsive.css')); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo e(asset('client/js/jquery-2.2.4.min.js')); ?>" type="text/javascript"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="<?php echo e(asset('client/js/bootstrap/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/js/carousel/owl.carousel.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/js/main.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('client/js/ajax.js')); ?>" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner container">
                        <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="?page=home" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?page=blog" title="">Blog</a>
                                </li>
                                <li>
                                    <a href="?page=detail_blog" title="">Đăng nhập</a>
                                </li>
                                <li>
                                    <a href="?page=detail_blog" title="">Đăng ký</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner container">
                        <a href="<?php echo e(url('/')); ?>" title="" id="logo" class="fl-left"><img
                                src="<?php echo e(url('public/client/images/logo.png')); ?>" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="POST" action="">
                                <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <i class="fas fa-phone-alt fl-left"></i>
                                <div class="advisory-after fl-right">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>

                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars"
                                    aria-hidden="true"></i></div>
                            <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </div>
                                <div id="dropdown">
                                    <p class="desc">Có <span>2 sản phẩm</span> trong giỏ hàng</p>
                                    <ul class="list-cart">
                                        <li class="clearfix">
                                            <a href="" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-11.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="" title="" class="product-name">Sony Express X6</a>
                                                <p class="price">6.250.000đ</p>
                                                <p class="qty">Số lượng: <span>1</span></p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-23.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="" title="" class="product-name">Laptop Lenovo 10</a>
                                                <p class="price">16.250.000đ</p>
                                                <p class="qty">Số lượng: <span>1</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="total-price clearfix">
                                        <p class="title fl-left">Tổng:</p>
                                        <p class="price fl-right">18.500.000đ</p>
                                    </div>
                                    <div class="action-cart clearfix">
                                        <a href="?page=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                        <a href="?page=checkout" title="Thanh toán" class="checkout fl-right">Thanh
                                            toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear-fix"></div>
                <div id="head-menu">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="head-menu-container">
                                <a href="" class="d-block font-weight-light text-white menu-title">
                                    <i class="fa fa-bars mr-1"></i><span>DANH MỤC SẢN PHẨM</span>
                                </a>

                                <div class="header-menu-holder pt-1" id="wp-hide">
                                    <?php $__currentLoopData = $cat1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item py-2">
                                            <a href="<?php echo e(route('productCat', [$cat->slug, $cat->id])); ?>"
                                                class="pro-cat-1">
                                                <span class="cat-thumb-item">
                                                    <img src="<?php echo e(url('uploads/product-cat/' . $cat->file)); ?>"
                                                        alt="Máy tính xách tay - Laptop">
                                                </span>
                                                <span class="title" title=""><?php echo e($cat->cat_title); ?></span>
                                            </a>
                                            <div class="sub-menu">
                                                <div class="cat-child-holder">
                                                    <?php
                                                        $cat2 = Product_cat::where([['status', 'active'], ['parent_id', $cat->id]])->get();
                                                    ?>
                                                    <?php $__currentLoopData = $cat2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $catlast = Product_cat::where([['status', 'active'], ['parent_id', $cat2->id]])->get();
                                                        ?>
                                                        <div class="cat-child-items">
                                                            <a href="<?php echo e(route('productCat', [$cat2->slug, $cat2->id])); ?>"
                                                                title=""
                                                                class="cat-2"><?php echo e($cat2->cat_title); ?></a>
                                                            <?php $__currentLoopData = $catlast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="cat-child-last">
                                                                    <a href="<?php echo e(route('productCat', [$item->slug, $item->id])); ?>"
                                                                        title=""><?php echo e($item->cat_title); ?></a>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <ul class="menu-text-right align-items-center justify-content-between font-weight-light">
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="menu-item-down d-flex align-items-center">
                                        <i class="<?php echo e($menu->icon); ?>"></i>
                                        <a
                                            href="<?php echo e(route('pages', [$menu->slug, $menu->id])); ?>"><?php echo e($menu->menu_title); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="menu-item-down d-flex align-items-center">
                                    <i class="<?php echo e($menu_blog->icon); ?>"></i>
                                    <a href="<?php echo e(route('posts')); ?>"><?php echo e($menu_blog->menu_title); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="wp-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div id="footer-wp">
                <div id="foot-body">
                    <div class="wp-inner container clearfix">
                        <div class="block" id="info-company">
                            <h3 class="title">HUNGANH</h3>
                            <p class="desc">HUNGANH luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ
                                ràng,
                                chính
                                sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                            <div id="payment">
                                <div class="thumb">
                                    <img src="public/images/img-foot.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="block menu-ft" id="info-shop">
                            <h3 class="title">Thông tin cửa hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <p>106 - Trần Bình - Cầu Giấy - Hà Nội</p>
                                </li>
                                <li>
                                    <p>0987.654.321 - 0989.989.989</p>
                                </li>
                                <li>
                                    <p>vshop@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="block menu-ft policy" id="info-shop">
                            <h3 class="title">Chính sách mua hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <a href="" title="">Quy định - chính sách</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách bảo hành - đổi trả</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách hội viện</a>
                                </li>
                                <li>
                                    <a href="" title="">Giao hàng - lắp đặt</a>
                                </li>
                            </ul>
                        </div>
                        <div class="block" id="newfeed">
                            <h3 class="title">Bảng tin</h3>
                            <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                            <div id="form-reg">
                                <form method="POST" action="">
                                    <input type="email" name="email" id="email" placeholder="Nhập email tại đây">
                                    <button type="submit" id="sm-reg">Đăng ký</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="foot-bot">
                    <div class="wp-inner">
                        <p id="copyright">© Bản quyền thuộc về unitop.vn | Php Master</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-respon">
            <a href="?page=home" title="" class="logo">VSHOP</a>
            <div id="menu-respon-wp">
                <ul class="___class_+?77___" id="main-menu-respon">
                    <li>
                        <a href="?page=home" title>Trang chủ</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Điện thoại</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Samsung</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone X</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Iphone 8</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Nokia</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Máy tính bảng</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Laptop</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Đồ dùng sinh hoạt</a>
                    </li>
                    <li>
                        <a href="?page=blog" title>Blog</a>
                    </li>
                    <li>
                        <a href="#" title>Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="btn-top"><img src="<?php echo e(url('public/client/images/icon-to-top.png')); ?>" alt="" /></div>
        <div id="fb-root"></div>

        <script>
            $('div.header-menu-holder div.item').hover(
                function() {
                    $(this).addClass('sub-appear');
                },
                function() {
                    $('.header-menu-holder .item').removeClass('sub-appear')
                });
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
</body>

</html>
<?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/layouts/header-ver2.blade.php ENDPATH**/ ?>