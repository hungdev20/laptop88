<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
   
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/style.css')); ?>">
    <script src="https://cdn.tiny.cloud/1/wgjzxmm8ja3gfwts64iqycy9gry16ehsya4453y70m8txlsl/tinymce/4/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        var editor_config = { 
            path_absolute: "http://localhost/hunganh_newest/",
            selector: "textarea:not(textarea.textarea, textarea.settings, textarea.globalSetting)",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | fontselect fontsizeselect formatselect | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>

<body>

    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-0a97 d-flex">
            <div class="navbar-brand"><a href="?">UNITOP ADMIN</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(url('admin/post/add')); ?>">Thêm bài viết</a>
                        <a class="dropdown-item" href="<?php echo e(url('admin/product/add')); ?>">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="<?php echo e(url('admin/order/list')); ?>">Thêm đơn hàng</a>
                    </div>
                </div>
                <div class="btn-group">

                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="color: #fff">
                        <?php echo e(Auth::user()->name); ?>

                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Tài khoản</a>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        <?php
            $module_active = session('module_active');
        ?>
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-gr00">
                <ul id="sidebar-menu">

                    <li class="nav-link <?php echo e($module_active == 'dashboard' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('dashboard')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            Dashboard
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'page' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/page/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-pager"></i>
                            </div>
                            Trang
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(url('admin/page/add')); ?>">Thêm mới</a></li>
                            <li><a href="<?php echo e(url('admin/page/list')); ?>">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'post' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/post/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-blog"></i>
                            </div>
                            Bài viết
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(url('admin/post/add')); ?>">Thêm mới</a></li>
                            <li><a href="<?php echo e(url('admin/post/list')); ?>">Danh sách</a></li>
                            <li><a href="<?php echo e(url('admin/post/cat/add')); ?>">Thêm mới danh mục</a></li>
                            <li><a href="<?php echo e(url('admin/post/cat/list')); ?>">Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'product' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/product/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fab fa-product-hunt"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a id="start" href="<?php echo e(url('admin/product/add')); ?>">Thêm mới</a></li>
                            <li><a href="<?php echo e(url('admin/product/list')); ?>">Danh sách</a></li>
                            <li><a href="<?php echo e(url('admin/product/cat/add')); ?>">Thêm danh mục</a></li>
                            <li><a href="<?php echo e(url('admin/product/cat/list')); ?>">Danh mục</a></li>
                        </ul>
                    </li>
                 
                    <li class="nav-link <?php echo e($module_active == 'paraPro' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/paraPro/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Thông số sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a id="start" href="<?php echo e(url('admin/paraPro/add')); ?>">Thêm mới</a></li>
                            <li><a href="<?php echo e(url('admin/paraPro/list')); ?>">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'order' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/order/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-store"></i>
                            </div>
                            Bán hàng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(url('admin/order/list')); ?>">Đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'AdvancedOption' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('globalSetting.add')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-globe"></i>
                            </div>
                            Advanced
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(route('globalSetting.add')); ?>">Global Setting</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'user' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/user/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-user"></i>
                            </div>
                            Users
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(url('admin/user/add')); ?>">Thêm mới</a></li>
                            <li><a href="<?php echo e(url('admin/user/list')); ?>">Danh sách</a></li>
                        </ul>
                    <li class="nav-link <?php echo e($module_active == 'slider' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/slider/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fab fa-slideshare"></i>
                            </div>
                            Sliders
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(url('admin/slider/add')); ?>">Thêm mới</a></li>
                            <li><a href="<?php echo e(url('admin/slider/list')); ?>">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'media' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/media/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-images"></i>
                            </div>
                            Media
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(url('admin/media/add')); ?>">Thêm mới</a></li>
                            <li><a href="<?php echo e(url('admin/media/list')); ?>">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'menu' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('admin/menu')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-bars"></i>
                            </div>
                            Menu
                        </a>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'settings' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('list.settings')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-cog"></i>
                            </div>
                            Settings
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(route('list.settings')); ?>">Thêm mới</a>
                                <i class="arrow fas fa-angle-right"></i>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo e(route('add.settings') . '?type=Text'); ?>">Text</a></li>
                                    <li><a href="<?php echo e(route('add.settings') . '?type=Textarea'); ?>">Textarea</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(route('list.settings')); ?>">Danh sách Settings</a></li>
                        </ul>
                    </li>

                    <li class="nav-link <?php echo e($module_active == 'roles' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('roles/list')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            Danh sách vai trò(Roles)
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(url('roles/list')); ?>">Danh sách</a></li>
                            <li><a href="<?php echo e(url('roles/add')); ?>">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="nav-link <?php echo e($module_active == 'permissions' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('list_permission')); ?>">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-eye"></i>
                            </div>
                            Quyền
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(route('list_permission')); ?>">Danh sách quyền</a></li>
                            <li><a href="<?php echo e(route('list_permissioncat')); ?>">Danh mục quyền</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="wp-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    
    <script src="<?php echo e(asset('admin/js/ajax.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/app.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH D:\xampp-1\htdocs\hunganh_newest\resources\views/layouts/admin.blade.php ENDPATH**/ ?>