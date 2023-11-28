
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="wp-homepage">
        <div id="wp-inner" class="container">
            <?php echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="main-content">
                <div id="wp-list" class="row">

                    <div id="wp-left-list" class="col-md-9"> 
                        <div id="head-list">
                            <div class="cat-name">Laptop</div>
                        </div>
                        <ul class="wp-product row">
                            <li class="col-md-3">
                                <div class="card-prd">
                                    <a href="" class="pro-thumb d-block">
                                        <img src="<?php echo e(url('public/client/images/best-seller-1.png')); ?>" alt=""
                                            class="d-block">
                                    </a>
                                    <div class="cprd-body">
                                        <a href="" class="pro-name d-block"> PC Gaming-Máy tính chơi game PCAP Mini Pro </a>

                                        <span class="pro-price text-center">49.990.000</span>

                                        <div class="clearfix">
                                            <a href="" class="add-cart fl-left mt-2 mb-3 btn btn-outline-dark">Thêm giỏ
                                                hàng</a>
                                            <a href="" class="buy-now fl-right mt-2 mb-3 btn btn-outline-danger">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <div class="card-prd">
                                    <a href="" class="pro-thumb d-block">
                                        <img src="<?php echo e(url('public/client/images/best-seller-1.png')); ?>" alt=""
                                            class="d-block">
                                    </a>
                                    <div class="cprd-body">
                                        <a href="" class="pro-name d-block"> PC Gaming-Máy tính chơi game PCAP Mini Pro </a>
                                        <span class="pro-price text-center">49.990.000</span>
                                        <div class="clearfix">
                                            <a href="" class="add-cart fl-left mt-2 mb-3 btn btn-outline-dark">Thêm giỏ
                                                hàng</a>
                                            <a href="" class="buy-now fl-right mt-2 mb-3 btn btn-outline-danger">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <div class="card-prd">
                                    <a href="" class="pro-thumb d-block">
                                        <img src="<?php echo e(url('public/client/images/best-seller-1.png')); ?>" alt=""
                                            class="d-block">
                                    </a>
                                    <div class="cprd-body">
                                        <a href="" class="pro-name d-block"> PC Gaming-Máy tính chơi game PCAP Mini Pro </a>
                                        <span class="pro-price text-center">49.990.000</span>
                                        <div class="clearfix">
                                            <a href="" class="add-cart fl-left mt-2 mb-3 btn btn-outline-dark">Thêm giỏ
                                                hàng</a>
                                            <a href="" class="buy-now fl-right mt-2 mb-3 btn btn-outline-danger">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <div class="card-prd">
                                    <a href="" class="pro-thumb d-block">
                                        <img src="<?php echo e(url('public/client/images/best-seller-1.png')); ?>" alt=""
                                            class="d-block">
                                    </a>
                                    <div class="cprd-body">
                                        <a href="" class="pro-name d-block"> PC Gaming-Máy tính chơi game PCAP Mini Pro </a>
                                        <span class="pro-price text-center">49.990.000</span>
                                        <div class="clearfix">
                                            <a href="" class="add-cart fl-left mt-2 mb-3 btn btn-outline-dark">Thêm giỏ
                                                hàng</a>
                                            <a href="" class="buy-now fl-right mt-2 mb-3 btn btn-outline-danger">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <div class="card-prd">
                                    <a href="" class="pro-thumb d-block">
                                        <img src="<?php echo e(url('public/client/images/best-seller-1.png')); ?>" alt=""
                                            class="d-block">
                                    </a>
                                    <div class="cprd-body">
                                        <a href="" class="pro-name d-block"> PC Gaming-Máy tính chơi game PCAP Mini Pro </a>
                                        <span class="pro-price text-center">49.990.000</span>
                                        <div class="clearfix">
                                            <a href="" class="add-cart fl-left mt-2 mb-3 btn btn-outline-dark">Thêm giỏ
                                                hàng</a>
                                            <a href="" class="buy-now fl-right mt-2 mb-3 btn btn-outline-danger">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="section" id="paging-wp">
                            <div class="section-detail">
                                <ul class="list-item clearfix">
                                    <li>
                                        <a href="" title="">1</a>
                                    </li>
                                    <li>
                                        <a href="" title="">2</a>
                                    </li>
                                    <li>
                                        <a href="" title="">3</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="sort" class="col-md-3">
                        <div class="right-head-list">
                            <p class="desc">Hiển thị 8 trên 20 sản phẩm</p>
                            <div class="form-filter">
                                <form action="" method="GET">
                                    <div class="form-group">
                                        <select name="sort" class="form-control" id="sort">
                                            <option value="0">Lọc theo giá</option>
                                            <option value="1">Từ thấp đến cao</option>
                                            <option value="2">Từ cao đến thấp</option>
                                        </select>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="right-wp-filter">

                            <div class="section-body">
                                <div class="wp-filter-price">
                                    <h1>Mức giá</h1>
                                    <form action="" id="filter-range" method="GET">
                                        <p class="price-show mb-3">
                                            đ4.000.000 - đ100.000.000
                                        </p>
                                        <div class="form-group">
                                            <input type="range" name="filter-range" class="form-control-range">
                                        </div>
                                    </form>
                                </div>
                                <div class="wp-filter-brand">
                                    <h1 class="filter-head">Hãng</h1>
                                    <div class="filter-body row">
                                        <div class="item form-group col-md-6 mb-1">
                                            <input type="checkbox" class="form-check-input" id="acer" name="brand"
                                                value="Acer">
                                            <label for="acer" class="form-check-label">ACER</label>
                                        </div>
                                        <div class="item form-group col-md-6 mb-1">
                                            <input type="checkbox" class="form-check-input" id="dell" name="brand"
                                                value="Dell">
                                            <label for="dell" class="form-check-label">DELL</label>
                                        </div>
                                        <div class="item form-group col-md-6 mb-1">
                                            <input type="checkbox" class="form-check-input" id="msi" name="brand"
                                                value="Msi">
                                            <label for="msi" class="form-check-label">MSI</label>
                                        </div>
                                        <div class="item form-group col-md-6 mb-1">
                                            <input type="checkbox" class="form-check-input" id="hp" name="brand" value="HP">
                                            <label for="hp" class="form-check-label">HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="wp-filter-ram">
                                    <h1 class="filter-head">RAM</h1>
                                    <div class="filter-body row">
                                        <div class="item col-md-6 mb-1">
                                            <input type="checkbox" class="form-check-input" id="8gb" name="ram" value="8GB">
                                            <label for="8gb" class="form-check-label">8GB</label>
                                        </div>
                                        <div class="item col-md-6 mb-1">
                                            <input type="checkbox" class="form-check-input" id="16gb" name="ram"
                                                value="16GB">
                                            <label for="16gb" class="form-check-label">16GB</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header-ver2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/client/home/product-cat.blade.php ENDPATH**/ ?>