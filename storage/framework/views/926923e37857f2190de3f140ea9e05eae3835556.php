<?php
use App\Parameter_pro;
use App\Parameterpro_cat;
?>

<?php $__env->startSection('title', $productCatTitle); ?>
<?php $__env->startSection('content'); ?>
    <div id="main-content-wp" class="wp-homepage">
        <div id="wp-inner" class="container">
            <?php echo $__env->make('layouts.breadcrumb', compact('slugLastCat', 'id'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="js_banner_category" class="owl-carousel owl-loaded">
                
                <img style="cursor: pointer;" src="<?php echo e(asset('client/images/js-banner-product-1.jpg')); ?>"
                    class="" />
                    <img style=" cursor: pointer;"
                    src="<?php echo e(asset('client/images/js-banner-product-1.jpg')); ?>" class="" />
                    <img style="
                    cursor: pointer;" src="<?php echo e(asset('client/images/js-banner-product-1.jpg')); ?>"
                    class="" />
                
            </div>
            <div id=" main-content">
                <div id="wp-list" class="row">

                    <div id="wp-left-list" class="col-md-9">
                        <div id="head-list">
                            <div class="cat-name"><?php echo e($productCatTitle); ?></div>
                        </div>
                        <ul class="wp-product row">
                            <?php $__currentLoopData = $productChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="col-6 col-sm-4 col-lg-3 prHA" style="position: relative;">
                                    <div class="card-prd">
                                        <a href="<?php echo e(route('productDetail', [$product->slug, $product->id])); ?>"
                                            class="pro-thumb d-block">
                                            <img src="<?php echo e(url($product->thumbnail)); ?>" alt="" class="d-block">
                                        </a>
                                        <div class="cprd-body">
                                            <a href="<?php echo e(route('productDetail', [$product->slug, $product->id])); ?>"
                                                class="pro-name d-block">
                                                <?php echo e(Str::of($product->product_title)->limit(50)); ?>

                                            </a>
                                            <span
                                                class="pro-price text-center"><?php echo e(number_format($product->price, 0, ',', '.')); ?>đ</span>

                                            <div class="btn_of_prd">
                                                <a href="" data_id="<?php echo e($product->id); ?>"
                                                    data_uri="<?php echo e(route('cart.add')); ?>"
                                                    uri_cart_show="<?php echo e(route('cart.show')); ?>"
                                                    class="add-cart mt-2 mb-3 btn btn-outline-dark">Thêm giỏ
                                                    hàng</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div id="pagination_product" class="text-center" data_uri="<?php echo e(route('pagging_products')); ?>"
                            cat_id="<?php echo e($id); ?>">
                            <?php echo e($productChildren->links()); ?>

                        </div>
                    </div>
                    <div id="sort" class="col-md-3">
                        <div class="right-head-list">
                            <p class="desc">Hiển thị 8 trên 20 sản phẩm</p>
                            <div class="form-filter">
                                <form action="" method="GET">
                                    <div class="form-group">
                                        <select name="sort" class="form-control" id="sort">
                                            <option value="price-asc">Từ thấp đến cao</option>
                                            <option value="price-desc">Từ cao đến thấp</option>
                                        </select>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="right-wp-filter">

                            <div class="section-body">
                                <div id="reset_filter" style="margin-bottom: 20px">
                                    <button type="submit" class="btn btn-dark form-control">Reset</button>
                                </div>
                                <div class="wp-filter-price">
                                    <h1>Mức giá</h1>
                                    <form action="" id="filter-range" method="GET" data_uri="<?php echo e(route('show_prd')); ?>"
                                        data_id="<?php echo e($id); ?>">
                                        <p class="price-show mb-3">
                                            đ<span><?php echo e(number_format($min_price_range, 0 , '.', ',')); ?> -</span>
                                            đ<span><?php echo e(number_format($max_price_range, 0 , '.', ',')); ?></span>
                                
                                        </p>
                                        

                                        <input type="hidden" id="save_min" value="<?php echo e($min_price); ?>">
                                        <input type="hidden" id="save_max" value="<?php echo e($max_price); ?>">
                                        <input type="hidden" name="start_price" id="start_price"
                                            value="<?php echo e($min_price); ?>">
                                        <input type="hidden" name="end_price" id="end_price" value="<?php echo e($max_price); ?>">

                                        <div id="slider-range">

                                        </div>
                                        

                                    </form>
                                </div>
                                
                                <div class="wp-other-filter">
                                    <?php if(!empty($groupIdParent3)): ?>
                                        <?php echo $__env->make('layouts.client-sidebar-3', compact('groupIdParent3', 'id'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php elseif(!empty($groupIdParent2)): ?>
                                        <?php echo $__env->make('layouts.client-sidebar-2', compact('groupIdParent2', 'groupCatId'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php else: ?>

                                        <?php echo $__env->make('layouts.client-sidebar-1', compact('result', 'groupCatId1'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        // $("div.right-wp-filter div.section-body input").click(function() {
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function a(a) {
                var b = [];
                return $("." + a + ":checked").each(function() {
                    b.push($(this).val())
                }), b
            }

            function b() {
                const url = new URL(window.location);
                var URI = $("#filter-range").attr('data_uri'),
                    id = $("#filter-range").attr('data_id'),
                    op1 = a("op1"),
                    op2 = a("op2"),
                    op3 = a("op3"),
                    op4 = a("op4"),
                    save_min = $("#save_min").val(),
                    save_max = $("#save_max").val(),
                    start_price = $("input#start_price").val(),
                    end_price = $("input#end_price").val(),
                    sort = $("select[name='sort']").val(),
                    page = 1,
                    groupOp = [],
                    price_range = [],
                    e = url.searchParams;
                price_range.push(start_price);
                price_range.push(end_price);
                var groupOp = op1.concat(op2, op3, op4);
                if (0 == op1.length) e.delete("op1");
                else {
                    var t = op1.toString();
                    // sessionStorage.setItem("op1", t);
                    // alert(sessionStorage.getItem('op1'));
                    e.set("op1", t)
                }
                if (0 == op2.length) e.delete("op2");
                else {
                    var r = op2.toString();
                    e.set("op2", r)
                }
                if (0 == op3.length) e.delete("op3");
                else {
                    var s = op3.toString();
                    e.set("op3", s)
                }
                if (0 == op4.length) e.delete("op4");
                else {
                    var u = op4.toString();
                    e.set("op4", u)
                }
                start_price == save_min && end_price == save_max ? e.delete('price') : e.set('price', price_range),
                    e.set('sort', sort), e.set('page', page);
                let A = url.toString();
                history.replaceState("", "", A);
                $.ajax({
                    type: "post",
                    url: URI,
                    data: {
                        id: id,
                        start_price: start_price,
                        end_price: end_price,
                        price_range: price_range,
                        page: page,
                        sort: sort,
                        groupOp: groupOp,
                        save_min: save_min,
                        save_max: save_max,
                        op1: op1,
                        op2: op2,
                        op3: op3,
                        op4: op4
                    },
                    dataType: "json",
                    success: function(data) {

                        $("div#wp-left-list").html(data);
                        // $("#wp_mw_row_prd").html(a.html), $("#current").text(a.curr), $("#on").text(a
                        //     .total)
                    }
                })
            };
            $("div.right-wp-filter div.section-body input").click(function() {
                b();
            });
            $(document).on("change", "select#sort", function() {
                b();
            });

            $("#slider-range").slider({
                orientation: "horizontal",
                range: true,
                min: <?php echo e($min_price_range); ?>,
                max: <?php echo e($max_price_range); ?>,
                step: 1e3,
                values: [<?php echo e($min_price); ?>, <?php echo e($max_price); ?>],
                stop: function(a, ui) {
                    $("p.price-show").html(new Intl.NumberFormat("en-US", {
                        style: "currency",
                        currency: "VND"
                    }).format(ui.values[0]) + " - " + new Intl.NumberFormat("en-US", {
                        style: "currency",
                        currency: "VND"
                    }).format(ui.values[1])), $("#start_price").val(ui.values[0]), $(
                        "#end_price").val(ui.values[1]), b()

                }
            });
            $(document).on('click', 'div#paginationForFilterProduct li a.page-link', function(e) {
                e.preventDefault();
                var page_id = $(this).attr('href').split('page=')[1];
                const url = new URL(window.location);
                var URI = $("#filter-range").attr('data_uri'),
                    id = $("#filter-range").attr('data_id'),
                    op1 = a("op1"),
                    op2 = a("op2"),
                    op3 = a("op3"),
                    op4 = a("op4"),
                    save_min = $("#save_min").val(),
                    save_max = $("#save_max").val(),
                    start_price = $("input#start_price").val(),
                    end_price = $("input#end_price").val(),
                    sort = $("select[name='sort']").val(),
                    groupOp = [],
                    price_range = [],
                    e = url.searchParams;
                price_range.push(start_price);
                price_range.push(end_price);
                var groupOp = op1.concat(op2, op3, op4);
                if (0 == op1.length) e.delete("op1");
                else {
                    var t = op1.toString();
                    e.set("op1", t)
                }
                if (0 == op2.length) e.delete("op2");
                else {
                    var r = op2.toString();
                    e.set("op2", r)
                }
                if (0 == op3.length) e.delete("op3");
                else {
                    var s = op3.toString();
                    e.set("op3", s)
                }
                if (0 == op4.length) e.delete("op4");
                else {
                    var u = op4.toString();
                    e.set("op4", u)
                }
                start_price == save_min && end_price == save_max ? e.delete('price') : e.set('price',
                        price_range),
                    e.set('sort', sort), e.set('page', page_id);
                let A = url.toString();
                history.replaceState("", "", A);
                $.ajax({
                    type: "post",
                    url: URI,
                    data: {
                        id: id,
                        start_price: start_price,
                        end_price: end_price,
                        price_range: price_range,
                        page: page_id,
                        sort: sort,
                        groupOp: groupOp,
                        save_min: save_min,
                        save_max: save_max,
                        op1: op1,
                        op2: op2,
                        op3: op3,
                        op4: op4
                    },
                    dataType: "json",
                    success: function(data) {

                        $("div#wp-left-list").html(data);

                    }
                })
            });
            // sessionStorage.setItem("op1", a('op1'));

            // window.onload = function() {

            //     //     // If sessionStorage is storing default values (ex. name), exit the function and do not restore data
            //     //     // if (sessionStorage.getItem('') == "name") {
            //     //     //     return;
            //     //     // }

            //     //     // If values are not blank, restore them to the fields
            //     var op1 = sessionStorage.getItem('op1');
            //     console.log(op1);
            //     if (op1 != null) {
            //         document.getElementById(op1).checked = true;
            //         b();
            //     }
            //     //     // var email = sessionStorage.getItem('email');
            //     //     // if (email !== null) $('#inputEmail').val(email);

            //     //     // var subject = sessionStorage.getItem('subject');
            //     //     // if (subject !== null) $('#inputSubject').val(subject);

            //     //     // var message = sessionStorage.getItem('message');
            //     //     // if (message !== null) $('#inputMessage').val(message);
            // };

            // // Before refreshing the page, save the form data to sessionStorage
            // window.onbeforeunload = function() {
            //     sessionStorage.setItem("op1", a("op1"));
            //     // sessionStorage.setItem("email", $('#inputEmail').val());
            //     // sessionStorage.setItem("subject", $('#inputSubject').val());
            //     // sessionStorage.setItem("message", $('#inputMessage').val());
            // };
        })
    </script>


    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/client/product-cat/index.blade.php ENDPATH**/ ?>