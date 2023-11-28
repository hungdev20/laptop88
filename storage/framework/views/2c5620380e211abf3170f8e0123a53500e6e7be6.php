<table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0"
    style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px"
    width="100%">
    <tbody>
        <tr>
            <td align="center"
                style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                valign="top">
                <table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
                    <tbody>
                        <tr style="background:#fff">
                            <td align="left" height="auto" style="padding:15px" width="600">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                        <tr>

                                                            <td><a href="<?php echo e(url('public/client/images/mail-order.jpg')); ?>"
                                                                    style="display:inline-block;margin-bottom:20px"
                                                                    rel="noreferrer" target="_blank"
                                                                    data-saferedirecturl="https://www.google.com/url?q=https://tiki.vn/chuong-trinh/du-lich-gia-re-tet-2019?src%3Dorder_confirmation_email&amp;source=gmail&amp;ust=1630999832863000&amp;usg=AFQjCNGI95Jdc_fzrGUvvKMvaNhg57J31w"><img
                                                                        alt="banner"
                                                                        src="https://ci6.googleusercontent.com/proxy/L27ewKXRtuTpAHKjq6ol6TH92QzCedpMXsXqd2NwfsG9U22pqaAdx6dsGpJI7FnlgYKd6NLqq3xbJIzaRq_IlxiE9jdihvkPQMre-e5bzNrR5nH66_e3qsOWlk_q5uHi6kaXIoRGHXs=s0-d-e1-ft#https://salt.tikicdn.com/media/upload/2018/12/21/f7d3f5d45561853c18e837ecbb7dea3d.jpg"
                                                                        width="275" class="CToWUd"> </a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h1
                                                    style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">
                                                    Cảm ơn quý khách <?php echo e($customer_name); ?> đã đặt hàng tại HUNGANH SHOP,
                                                </h1>

                                                <p
                                                    style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                    HA SHOP rất vui thông báo đơn hàng #<?php echo e($code); ?> của quý
                                                    khách đã được tiếp nhận và đang trong quá trình xử lý. HA SHOP sẽ
                                                    thông báo đến quý khách ngay khi hàng chuẩn bị được giao.</p>

                                                <h3
                                                    style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">
                                                    Thông tin đơn hàng #<?php echo e($code); ?> <span
                                                        style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(<?php echo e($time); ?>)</span>
                                                </h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th align="left"
                                                                style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                                                width="50%">Thông tin thanh toán</th>
                                                            <th align="left"
                                                                style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                                                width="50%"> Địa chỉ giao hàng </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                                                valign="top"><span
                                                                    style="text-transform:capitalize"><?php echo e($customer_name); ?></span><br>
                                                                <a href="mailto:congtrieu212280@gmail.com"
                                                                    rel="noreferrer"
                                                                    target="_blank"><?php echo e($email); ?></a><br>
                                                                <?php echo e($phone_number); ?>

                                                            </td>
                                                            <td style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                                                valign="top"><span
                                                                    style="text-transform:capitalize"><?php echo e($customer_name); ?></span><br>
                                                                <br>
                                                                <?php echo e($address); ?><br>
                                                                T: <?php echo e($phone_number); ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding:7px 9px 0px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444"
                                                                valign="top">
                                                                <p
                                                                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                                    <strong>Phương thức thanh toán: </strong>
                                                                    <?php if($payment_method == 'payment-home'): ?>
                                                                        Thanh toán khi nhận hàng tại nhà
                                                                    <?php else: ?>
                                                                        Thanh toán trực tiếp tại cửa hàng
                                                                    <?php endif; ?><br>
                                                                    
                                                                    <strong>Phí vận chuyển: </strong> 30.000đ<br>

                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p
                                                    style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                    <i>Lưu ý: Đối với đơn hàng đã được thanh toán trước, nhân viên giao
                                                        nhận có thể yêu cầu người nhận hàng cung cấp CMND / giấy phép
                                                        lái xe để chụp ảnh hoặc ghi lại thông tin.</i></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2
                                                    style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:#02acea">
                                                    CHI TIẾT ĐƠN HÀNG</h2>

                                                <table border="0" cellpadding="0" cellspacing="0"
                                                    style="background:#f5f5f5" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th align="left" bgcolor="#02acea"
                                                                style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                Sản phẩm</th>
                                                            <th align="left" bgcolor="#02acea"
                                                                style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                Đơn giá</th>
                                                            <th align="left" bgcolor="#02acea"
                                                                style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                Số lượng</th>
                                                            <th align="left" bgcolor="#02acea"
                                                                style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                Giảm giá</th>
                                                            <th align="right" bgcolor="#02acea"
                                                                style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                Tổng tạm</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody bgcolor="#eee"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                        <?php $__currentLoopData = $order_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td align="left" style="padding:3px 9px" valign="top">
                                                                <span><?php echo e($order_info->name); ?></span><br>
                                                            </td>
                                                            <td align="left" style="padding:3px 9px" valign="top">
                                                                <span> <?php echo e(number_format($order_info->price, 0, ',', '.')); ?>đ</span></td>
                                                            <td align="left" style="padding:3px 9px" valign="top"><?php echo e($order_info->qty); ?></td>
                                                            <td align="left" style="padding:3px 9px" valign="top">
                                                                <span>0đ</span></td>
                                                            <td align="right" style="padding:3px 9px" valign="top">
                                                                <span><?php echo e(number_format($order_info->total, 0, ',', '.')); ?>đ</span></td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                    </tbody>
                                                    <tfoot
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                        <tr>
                                                            <td align="right" colspan="4" style="padding:5px 9px">Tạm
                                                                tính</td>
                                                            <td align="right" style="padding:5px 9px">
                                                                <span><?php echo e(number_format($total_price, 0, ',', '.')); ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" colspan="4" style="padding:5px 9px">Phí
                                                                vận chuyển</td>
                                                            <td align="right" style="padding:5px 9px">
                                                                <span>30.000đ</span></td>
                                                        </tr>
                                                        <tr bgcolor="#eee">
                                                            <td align="right" colspan="4" style="padding:7px 9px">
                                                                <strong><big>Tổng giá trị đơn hàng</big> </strong></td>
                                                            <td align="right" style="padding:7px 9px">
                                                                <strong><big><span><?php echo e(number_format($total_price + 30000, 0, ',', '.')); ?>đ</span> </big> </strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                                <div style="margin:auto"><a
                                                        href="https://tiki.vn/sales/order/view/703506295"
                                                        style="display:inline-block;text-decoration:none;background-color:#00b7f1!important;margin-right:30px;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-left:35%;margin-top:5px"
                                                        rel="noreferrer" target="_blank"
                                                        data-saferedirecturl="https://www.google.com/url?q=https://tiki.vn/sales/order/view/703506295&amp;source=gmail&amp;ust=1630999832863000&amp;usg=AFQjCNFSzz7wGWBCsvtjiahLVtL5JGeBrQ">Chi
                                                        tiết đơn hàng tại HA SHOP</a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;


                                                <p
                                                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px #14ade5 dashed;padding:5px;list-style-type:none">
                                                    Từ ngày 14/2/2020, HA SHOP sẽ không gởi tin nhắn SMS khi đơn hàng
                                                    của bạn được xác nhận thành công. Chúng tôi chỉ liên hệ trong trường
                                                    hợp đơn hàng có thể bị trễ hoặc không liên hệ giao hàng được.</p>

                                                <p
                                                    style="margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                    Mọi thắc mắc và góp ý, quý khách vui lòng liên hệ với HA SHOP qua số
                                                    điện thoại <strong>0399809781</strong>. Nhân viên HA SHOP luôn sẵn
                                                    sàng hỗ trợ bạn.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;
                                                <p
                                                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">
                                                    Một lần nữa HA SHOP cảm ơn quý khách.</p>

                                                <p
                                                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right">
                                                    <strong><a
                                                            href="http://tiki.vn?utm_source=transactional+email&amp;utm_medium=email&amp;utm_term=logo&amp;utm_campaign=new+order"
                                                            style="color:#00a3dd;text-decoration:none;font-size:14px"
                                                            rel="noreferrer" target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=http://tiki.vn?utm_source%3Dtransactional%2Bemail%26utm_medium%3Demail%26utm_term%3Dlogo%26utm_campaign%3Dnew%2Border&amp;source=gmail&amp;ust=1630999832863000&amp;usg=AFQjCNHdDKbeHxXYDC-jEmIjwe4ikLjgWA">HA
                                                            SHOP</a> </strong></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center">
                <table width="600">
                    <tbody>
                        <tr>
                            <td>
                                <p align="left"
                                    style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:18px;color:#4b8da5;padding:10px 0;margin:0px;font-weight:normal">
                                    Quý khách nhận được email này vì đã mua hàng tại HA SHOP.<br>
                                    Để chắc chắn luôn nhận được email thông báo, xác nhận mua hàng từ HA SHOP, quý khách
                                    vui lòng thêm địa chỉ <strong><a href="mailto:hungmanh201102@gmail.com"
                                            rel="noreferrer" target="_blank">hungmanh201102@gmail.com</a></strong> vào
                                    số địa chỉ (Address Book, Contacts) của hộp email.<br>
                                    <b>Văn phòng HA SHOP:</b> 52 Út Tịch, phường 4, quận Tân Bình, thành phố Hồ Chí
                                    Minh, Việt Nam<br>
                                    Bạn không muốn nhận email từ HA SHOP? Hủy đăng ký tại <a rel="noreferrer">đây</a>.
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<?php /**PATH D:\xampp-1\htdocs\laravelpro\hunganh_shop\resources\views/client/mails/orderSuccess.blade.php ENDPATH**/ ?>