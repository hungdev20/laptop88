$(document).ready(function () {

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    // AJAX SUB CATEGORY

    $('#parent_cat').change(function () {

        var URI_single = $(this).attr('data-uri');

        console.log(URI_single);

        var sub_cat = $(this).val();

        var data = {

            sub_cat: sub_cat

        };

        // console.log(data); 

        $.ajax({

            url: URI_single,

            method: "POST",

            data: data,

            dataType: "text",

            success: function (data) {

                // console.log(data);

                $('#product_sub_category').html(data);

            }

        })

    })

    //UPload nhieu anh

    // if (location.href == 'http://localhost/laravelpro/hunganh_shop/admin/product/add') {

    var URI = $('#multiple_files').attr('data-uri');

    function load_image_data() {

        $.ajax({

            url: URI,

            method: 'POST',

            dataType: 'text',

            success: function (data) {

                $('#image_table').html(data);

            }

        })

    }

    $("#bt_upload").on('click', function (event) {

        var error_images = '';

        event.preventDefault();

        var URI = $('#error_multiple_files').attr('data-uri');

        let image_upload = new FormData();

        let TotalImages = $('#multiple_files')[0].files.length;

        if (TotalImages > 10) {

            error_images += 'Ban không được upload quá 10 hình ảnh';

        } else if (TotalImages <= 0) {

            error_images += 'Ban cần chọn ít nhất 1 ảnh';

        } else {

            let images = $('#multiple_files')[0];

            for (let i = 0; i < TotalImages; i++) {

                var name = document.getElementById('multiple_files').files[i].name;

                var ext = name.split('.').pop().toLowerCase();

                if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {

                    error_images += '<p>Tập tin ' + i + ' không hiệu lực</p>'

                }

                var oFReader = new FileReader();

                oFReader.readAsDataURL(document.getElementById('multiple_files').files[i]);

                var f = document.getElementById('multiple_files').files[i];

                var fsize = f.size || f.fileSize;

                if (fsize > 2000000) {

                    error_images += '<p>' + i + ' File quá lớn</p>';

                } else {

                    image_upload.append('images' + i, images.files[i]);

                }

            }

            image_upload.append('TotalImages', TotalImages);

        }

        if (error_images == '') {

            $.ajax({

                url: URI,

                type: 'post',

                // data: formData,

                data: image_upload,

                contentType: false,

                processData: false,

                beforeSend: function () {

                    $('#error_multiple_files').html(

                        '<br/><label class="text-primary">Đang tải....</label>')

                },

                dataType: 'text',

                success: function (data) {

                    $('#error_multiple_files').html(

                        '<br/><label class="text-success">Đã tải thành công</label>'

                    );

                    // load_image_data();

                    $('#image_table').html(data);

                }
            });

        } else {

            $('#error_multiple_files').html('<label class="text-primary">' + error_images + '</label>');

        }

    })



    //Delete

    $(document).on('click', '.delete', function (event) {

        event.preventDefault();

        var URI_delete = $('button.delete').attr('data-uri');

        var image_id = $(this).attr('id');

        var image_path = $(this).data('image_name');

        var data = {

            'image_id': image_id,

            'image_path': image_path

        };

        if (confirm('Bạn muốn xóa hình ảnh này không?')) {

            $.ajax({

                url: URI_delete,

                type: 'POST',

                data: data,

                dataType: 'text',

                success: function (data) {

                    alert('Đã xóa thành công');

                    load_image_data();

                }
            })

        }

    })

    $('#list_proCat').change(function () {

        var id = $(this).val();

        var URI = $(this).attr('data-uri');

        var data = { 'id': id };

        $.ajax({

            url: URI,

            method: 'POST',

            data: data,

            dataType: 'json',

            success: function (data) {

                console.log(data);

                $('#paraProduct').html(data);

            }

        })

    })

    $('.list_para').click(function () {

        var checked = $(this).is(':checked');

        var idParaCat = $('#catReturnedInfo').attr('data-id');

        if (checked == true) {

            var id = $(this).val();

            var URI = $(this).attr('data-uri');

            var data = { 'id': id, idParaCat: idParaCat };

            $.ajax({

                url: URI,

                method: 'POST',

                data: data,

                dataType: 'json',

                success: function (data) {

                    $('#paraProductForCatPro').html(data);

                }
            })

        } else if (checked == false) {

            var id = $(this).val();

            var URI = $(this).attr('data-uri1');

            var data = { 'id': id, idParaCat: idParaCat };

            $.ajax({

                url: URI,

                method: 'POST',

                data: data,

                dataType: 'json',

                success: function (data) {

                    console.log(data);

                    $('#paraProductForCatPro').html(data);

                }

            })

        }



    })



    //ajaxOrderDetail

    // $(select.order_details).change(function(){

    //     ale

    // })

    $('input.update_qty_order').click(function () {

        var order_product_id = $(this).data('product_id');

        var order_qty = $('.order_qty_' + order_product_id).val();

        var total_qty = $("input[name = 'qty[]']").val();

        var order_id = $('.order_id').val();

        var order_code = $('.order_code').val();

        var URI = $(this).attr('data_uri');

        var data = { order_product_id: order_product_id, order_id: order_id, order_qty: order_qty, order_code: order_code }

        console.log(total_qty);

        $.ajax({

            url: URI,

            method: 'POST',

            data: data,

            dataType: 'json',

            success: function (data1) {

                $(this).parent('td.qty').children('input.order_qty_' + order_product_id).html(data.qty);

                $('.order_product_subtotal_' + order_product_id).html(data1.order_product_subtotal);

                $('strong.total_qty').html(data1.total_qty);

                $('strong.order_total_price').html(data1.order_total_price);

                alert('Đã cập nhật số lượng thành công')

                // location.reload();

                // $('#paraProductForCatPro').html(data);

            },

            error: function (xhr, ajaxOptions, thrownError) {

                alert(xhr.status);

                alert(thrownError);

            }

        })

    })

})