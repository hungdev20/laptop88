$(document).ready(function () {

    $('.nav-link.active .sub-menu').slideDown();

    // $("p").slideUp();


    $('#sidebar-menu .arrow').click(function () {

        $(this).parents('li').children('.sub-menu').slideToggle();

        $(this).toggleClass('fa-angle-right fa-angle-down');

    });


    $("input[name='checkall']").click(function () {

        var checked = $(this).is(':checked');

        $('.table-checkall tbody tr td input:checkbox').prop('checked', checked);

    });

    

    $("input.checkbox_wrapper").click(function () {

        var checked = $(this).is(':checked');

        $(this).parents('.card-item').find('.checkbox_children').prop('checked', checked);

    });

    $("input.checkall").click(function () {

        var checked = $(this).is(':checked');

        $(this).parents().find('.checkbox_children').prop('checked', checked);

        $(this).parents().find('.checkbox_wrapper').prop('checked', checked);

   

    });

});