<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <script src="https://cdn.tiny.cloud/1/wgjzxmm8ja3gfwts64iqycy9gry16ehsya4453y70m8txlsl/tinymce/4/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        var editor_config = {
            path_absolute: "http://localhost/Laptop88/",
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
    <title>@yield('title')</title>
</head>

<body>

    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-0a97 d-flex">
            <div class="navbar-brand"><a href="?">LAPTOP88</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('admin/product/add') }}">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="{{ url('admin/order/list') }}">Thêm đơn hàng</a>
                    </div>
                </div>
                <div class="btn-group">

                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="color: #fff">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Tài khoản</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        @php
            $module_active = session('module_active');
        @endphp
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-gr00">
                <ul id="sidebar-menu">

                    <li class="nav-link {{ $module_active == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ url('dashboard') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            Dashboard
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>
                    <li class="nav-link {{ $module_active == 'page' ? 'active' : '' }}">
                        <a href="{{ url('admin/page/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-pager"></i>
                            </div>
                            Trang
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/page/add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/page/list') }}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{ $module_active == 'product' ? 'active' : '' }}">
                        <a href="{{ url('admin/product/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fab fa-product-hunt"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a id="start" href="{{ url('admin/product/add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/product/list') }}">Danh sách</a></li>
                            <li><a href="{{ url('admin/product/cat/add') }}">Thêm danh mục</a></li>
                            <li><a href="{{ url('admin/product/cat/list') }}">Danh mục</a></li>
                        </ul>
                    </li>

                    <li class="nav-link {{ $module_active == 'paraPro' ? 'active' : '' }}">
                        <a href="{{ url('admin/paraPro/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Thông số sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a id="start" href="{{ url('admin/paraPro/add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/paraPro/list') }}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{ $module_active == 'order' ? 'active' : '' }}">
                        <a href="{{ url('admin/order/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-store"></i>
                            </div>
                            Bán hàng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/order/list') }}">Đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{ $module_active == 'AdvancedOption' ? 'active' : '' }}">
                        <a href="{{ route('globalSetting.add') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-globe"></i>
                            </div>
                            Advanced
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ route('globalSetting.add') }}">Global Setting</a></li>

                        </ul>
                    </li>
                    <li class="nav-link {{ $module_active == 'user' ? 'active' : '' }}">
                        <a href="{{ url('admin/user/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            Users(quản trị)
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/user/add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/user/list') }}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{ $module_active == 'accounts' ? 'active' : '' }}">
                        <a href="{{ url('admin/accounts/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-user"></i>
                            </div>
                            Accounts
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/accounts/list') }}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{ $module_active == 'menu' ? 'active' : '' }}">
                        <a href="{{ url('admin/menu') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-bars"></i>
                            </div>
                            Menu
                        </a>
                    </li>
                    <li class="nav-link {{ $module_active == 'settings' ? 'active' : '' }}">
                        <a href="{{ route('list.settings') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-cog"></i>
                            </div>
                            Settings
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ route('list.settings') }}">Thêm mới</a>
                                <i class="arrow fas fa-angle-right"></i>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('add.settings') . '?type=Text' }}">Text</a></li>
                                    <li><a href="{{ route('add.settings') . '?type=Textarea' }}">Textarea</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('list.settings') }}">Danh sách Settings</a></li>
                        </ul>
                    </li>

                    <li class="nav-link {{ $module_active == 'roles' ? 'active' : '' }}">
                        <a href="{{ url('roles/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            Danh sách vai trò(Roles)
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('roles/list') }}">Danh sách</a></li>
                            <li><a href="{{ url('roles/add') }}">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{ $module_active == 'permissions' ? 'active' : '' }}">
                        <a href="{{ route('list_permission') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-eye"></i>
                            </div>
                            Quyền
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ route('list_permission') }}">Danh sách quyền</a></li>
                            <li><a href="{{ route('list_permissioncat') }}">Danh mục quyền</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="wp-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
    <script src="{{ asset('admin/js/ajax.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
