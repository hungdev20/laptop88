$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.num-order').change(function () {
        var rowId = $(this).attr('row-id');
        var qty = $(this).val();
        var data = { rowId: rowId, qty: qty };
        var URI = $(this).attr('data-uri');
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#sub-total-" + rowId).html(data.sub_total);
                $("#total-price span").html(data.total);
            }
        })
    })
    $("select[name = 'provinces']").change(function () {
        var URI = $(this).attr('data-uri');
        var province_id = $("select#provinces option:checked").attr('data_id');
        var data = { 'province_id': province_id };
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                $("select#district").html(data);
            }
        })
    })
    $("select[name = 'district']").change(function () {
        var URI = $(this).attr('data-uri');
        var district_id = $("select#district option:checked").attr('data_id');
        var data = { 'district_id': district_id };
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                $("select#wards").html(data);
            }
        })
    })
    $(document).on('click', 'ul#pagging_posts li a', function (e) {
        e.preventDefault();
        var URI = $(this).parents('ul#pagging_posts').attr('data_uri');
        var page_id = $(this).attr('page-id');
        var id = $(this).parents('div#pagination').attr('data_id');
        var data = {
            'page_id': page_id,
            'id' : id
        };
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                $("div#post-horizon").html(data);
            }
        })
    })
    $(document).on('click', 'div#pagination_product li a.page-link', function (e) {
        e.preventDefault();
        var URI = $(this).parents('div#pagination_product').attr('data_uri');
        // var page_id = $(this).text();
        var page_id = $(this).attr('href').split('page=')[1];
        var cat_id = $(this).parents('div#pagination_product').attr('cat_id');
        var data = {
            'page_id': page_id,
            'cat_id': cat_id
        };
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                $("div#wp-left-list").html(data);
            }
        })
    })
    $(document).on('keyup', 'input#search', function () {
        var a = $(this).val();
        var URI = $(this).attr('data_uri');
        "" == a ? $("#show_prd").slideUp() : ($("#show_prd").slideDown(),
            $.ajax({
                url: URI,
                method: "POST",
                data: { q: a },
                dataType: "json",
                success: function (data) {
                   
                    $("ul.list-rs").html(data);
                }
            })
        );
    })
    $(document).on('click', 'button#cancel_order', function (e) {
        e.preventDefault();
        var order_id = $(this).attr('data_id');
        var data = { order_id: order_id };
        var URI = $(this).attr('data_uri');
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "text",
            success: function (data) {
                // console.log(data);
                // $("ul.list-rs").html(data);
                location.reload();
            }
        })
    })
    $("input[name = 'searchBill']").change(function () {
        var a = $(this).val();
        var URI = $(this).attr('data_uri');
        var type = $(this).attr('data_type');
        // "" == a ? $("#show_prd").slideUp() : ($("#show_prd").slideDown(),
        var data = { q: a, type: type };
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("div.inner_order").html(data);
            }
        })
    })
    // RATING
    function remove_background(product_id) {
        for (var count = 1; count <= 5; count++) {
            $('#' + product_id + '-' + count).css('color', '#707070');
        }
    }
    $(document).on('mouseenter', 'li.rating', function () {
        var index = $(this).attr('data_index');
        var product_id = $(this).attr('data_product_id');
        remove_background(product_id);
        for (var count = 1; count <= index; count++) {
            $('#' + product_id + '-' + count).css('color', '#F59E0B');
        }
    })
    $(document).on('mouseleave', '.rating', function () {
        const num_star_chosen = document.querySelector('input#num_star_chosen');
        if (num_star_chosen == null) {
            var product_id = $(this).attr('data_product_id');
            var rating = $(this).attr('data_rating');
            remove_background(product_id);
        }
    })
    $(document).on('click', 'li.rating', function () {
        var index = $(this).attr('data_index');
        var product_id = $(this).attr('data_product_id');
        var URI = $('ul.rating').attr('data_uri');
        var data = { index: index, product_id: product_id };
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                $('ul.rating').html(data);
              
            }
        })
    })
    $(document).on('click', 'button.add_rate', function (e) {
        // e.preventDefault();
        var num_star_chosen = $('input#num_star_chosen').val();
        var content_rate = $('textarea#content_rate').val();
        var name = $('div.inner-rating input#name').val();
        var product_id = $('ul.rating').attr('data_product_id');
        var data = { num_star_chosen: num_star_chosen, name: name, content_rate: content_rate, product_id: product_id }
        var URI = $(this).attr('data_uri');
        $.ajax({
            url: URI,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.status == 'false') {
                    var data_return = "";
                    if ((data.name) != null) {
                        data_return += data.name + "\n";
                    }
                    if ((data.content_rate) != null) {
                        data_return += data.content_rate + "\n";
                    }
                    if ((data.num_star_chosen) != null) {
                        data_return += data.num_star_chosen + "\n";
                    }
                    alert(data_return);
                } else if (data.status == 'true') {
                    console.log(data);
                    alert('Cảm ơn quý khách đã dành chút thời gian đánh giá sản phẩm của chúng tôi');
                    $('div.all_rating').html(data.dataReturn);
                    $('ul.real_rating').html(data.dataReturn1);
                    $('span.near_round_rating strong').html(data.near_round_rating);
                }
            }
        })
    })
    $(document).on('click', 'a.add-cart', function (event) {
        // $('div.cprd-body a.add-cart').click(function (event) {
        event.preventDefault();
        var uri_cart_show = $(this).attr('uri_cart_show');
        var URI = $(this).attr('data_uri');
        var id = $(this).attr('data_id');
        $.ajax({
            url: URI,
            method: "POST",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                $('span#num').html(data.num_order);
                $('div#dropdown').html(data.cart);
                // $('span#extra_num').html(data.num_order + " sản phẩm")
                swal({
                    title: "Thêm sản phẩm vào giỏ hàng thành công",
                    icon: "success",
                    buttons: {
                        cancel: "Đóng",
                        cart: {
                            text: "Đến giỏ hàng",
                            value: "cart",
                            button: 'green'
                        },
                    },
                })
                    .then((value) => {
                        switch (value) {
                            case "cart":
                                document.location.href = uri_cart_show;
                                break;
                        }
                    });
            }
        })
    });
})