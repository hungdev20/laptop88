$(document).ready(function () {
    //  ZOOM PRODUCT DETAIL
    // $("#zoom").elevateZoom({ gallery: 'list-thumb', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif' });
    $(document).on('keyup', 'input#search', function () {
        var dataInputSearch = $(this).val();
        if(dataInputSearch == ""){
            $("button#sm-s").attr("disabled", "disabled");
        }else{
            $("button#sm-s").removeAttr("disabled");
        }
    })
   
    //  LIST THUMB
    var list_thumb = $('#list-thumb');
    list_thumb.owlCarousel({
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 5, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 5], // betweem 900px and 601px
        itemsTablet: [768, 5], //2 items between 600 and 0
        itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });
    var js_banner_category = $('#js_banner_category');
    js_banner_category.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 2, //10 items above 1000px browser width
        itemsDesktop: [1000, 2], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [768, 2], //2 items between 600 and 0
        itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });
    $('img.product_thumb').click(function () {
        var main = $(this).attr('src');
        $("img#main-thumb").attr('src', main);
    })
    //  NEWS
    var news = $('ul.owl-carousel');
    news.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [375, 1] // itemsMobile disabled - inherit from itemsTablet option
    });
    // same-category
    var same_category = $('#same-category-wp .list-item');
    same_category.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 5, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 4], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [375, 1] // itemsMobile disabled - inherit from itemsTablet option
    });
    //  SCROLL TOP
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#btn-top').stop().fadeIn(150);
        } else {
            $('#btn-top').stop().fadeOut(150);
        }
    });
    $('#btn-top').click(function () {
        $('body,html').stop().animate({ scrollTop: 0 }, 800);
    });
    // CHOOSE NUMBER ORDER
    var value = parseInt($('#num-order').attr('value'));
    $('#plus').click(function () {
        // Chọn đến phần tử cần lấy thuộc tính thông qua JS DOM
        var num_order = document.getElementById("num-order");
        // Lấy giá trị của thuộc tính
        var max_qty = num_order.getAttribute("data_qty");
        if (value < max_qty) {
            value++;
            $('#num-order').attr('value', value);
        } else {
            alert('Bạn không được phép nhập quá số lượng sản phẩm')
        }
        //  update_href(value);
    });
    $('#minus').click(function () {
        if (value > 1) {
            value--;
            $('#num-order').attr('value', value);
        }
        update_href(value);
    });
    //  MAIN MENU
    $('#category-product-wp .list-item > li').find('.sub-menu').after('<i class="fa fa-angle-right arrow" aria-hidden="true"></i>');
    //  TAB
    tab();
    //  EVEN MENU RESPON
    $('html').on('click', function (event) {
        var target = $(event.target);
        var site = $('#site');
        if (target.is('#btn-respon i')) {
            if (!site.hasClass('show-respon-menu')) {
                site.addClass('show-respon-menu');
            } else {
                site.removeClass('show-respon-menu');
            }
        } else {
            $('#container').click(function () {
                if (site.hasClass('show-respon-menu')) {
                    site.removeClass('show-respon-menu');
                    return false;
                }
            });
        }
    });
    //  MENU RESPON
    $('#main-menu-respon li .sub-menu').after('<span class="fa fa-angle-right arrow"></span>');
    $('#main-menu-respon li .arrow').click(function () {
        if ($(this).parent('li').hasClass('open')) {
            $(this).parent('li').removeClass('open');
        } else {
            //            $('.sub-menu').slideUp();
            //            $('#main-menu-respon li').removeClass('open');
            $(this).parent('li').addClass('open');
            //            $(this).parent('li').find('.sub-menu').slideDown();
        }
    });
    //SWEET ALERT
    $('a.del-product').click(function (event) {
        event.preventDefault();
        const href = $(this).attr('href')
        swal({
            title: "Bạn chắc chắn muốn xóa sản phẩm chứ?",
            text: "Sau khi xóa sản phẩm sẽ biến mất khỏi giỏ hàng của bạn",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                    // swal("Sản phẩm của bạn đã được xóa khỏi giỏ hàng", {
                    //     icon: "success",
                    // });
                } else {
                    swal({
                        title: 'Mình biết là bạn nhấn nhầm mà <3',
                        text: "Tiếp tục trải nghiệm mua hàng nhé",
                        icon: 'success',
                    });
                }
            });
    })
    //OPEN PASSWORD
    $('.eye').click(function () {
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('open')) {
            $(this).prev().attr('type', 'text');
        } else {
            $(this).prev().attr('type', 'password');
        }
    })
    function tab() {
        var tab_menu = $('#tab-menu li');
        tab_menu.stop().click(function () {
            $('#tab-menu li').removeClass('show');
            $(this).addClass('show');
            var id = $(this).find('a').attr('href');
            $('.tabItem').hide();
            $(id).show();
            return false;
        });
        $('#tab-menu li:first-child').addClass('show');
        $('.tabItem:first-child').show();
    }
    //CHANGE PAYMENT METHOD
    $(document).on('click', 'input#payment-home', function () {
        var checkStatus = $(this).parent('li').next('li').children('div.txt_555').hasClass('d-block');
        if (checkStatus == true) {
            $(this).parent('li').next('li').children('div.txt_555').removeClass('d-block');
        }
        $(this).parent('li').next('li').children('div.txt_555').addClass('d-none');
    })
    $(document).on('click', 'input#direct-payment', function () {
        var checkStatus = $(this).parent('li').children('div.txt_555').hasClass('d-none');
        if (checkStatus == true) {
            $(this).parent('li').children('div.txt_555').removeClass('d-none');
            $(this).parent('li').children('div.txt_555').addClass('d-block');
        }
    })
});
//SUB-MENU
// $('.mn-item').hover(
//     function () {
//         $(this).children('.mnnn').addClass('zcs-hover');
//     },
//     function () {
//         $('.mn-item').children('.mnnn').removeClass('zcs-hover');
//     }
// );
