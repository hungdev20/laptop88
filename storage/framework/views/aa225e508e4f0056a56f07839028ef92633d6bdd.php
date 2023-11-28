
<?php $__env->startSection('title', 'Thống kê'); ?>
<?php $__env->startSection('content'); ?>
    <div id="content" class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home" style="font-size: 16px">Doanh thu theo ngày</a></li>
            <li><a data-toggle="tab" href="#menu1" style="font-size: 16px">Doanh thu theo tuần</a></li>
            <li><a data-toggle="tab" href="#menu2" style="font-size: 16px">Doanh thu theo tháng</a></li>
            <li><a data-toggle="tab" href="#menu3" style="font-size: 16px">Doanh thu theo năm</a></li>
            <li><a data-toggle="tab" href="#menu4" style="font-size: 16px">Sản phẩm đã hết</a></li>
            <li><a data-toggle="tab" href="#menu5" style="font-size: 16px">Sản phẩm còn hàng</a></li>
        </ul>

        <?php
        function cmp($a, $b)
        {
            if ($a->count == $b->count) {
                return 0;
            }
            return $a->count > $b->count ? -1 : 1;
        }
        ?>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Doanh thu theo ngày</h3>
                <?php
                
                $countDay = 0;
                $data = $this->modelSalesDay();
                usort($data, 'cmp');
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="font-size: 16px;width:150px;">Mã sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Tên sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Hình ảnh</th>
                            <th scope="col" style="font-size: 16px;">Số lượng đã bán</th>
                            <th scope="col" style="font-size: 16px;">Tiền nhận được</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                        <?php
                        $product = $this->getProduct($value->product_id);
                        $countDay += $value->count * ($value->price - ($value->price * $product->discount) / 100);
                        ?>
                        <tr>
                            <th scope="row" style="font-size: 16px;">#<?php echo $value->product_id; ?></th>
                            <td style="font-size: 16px;"><?php echo $product->name; ?></td>
                            <td><?php if ($product->photo != "" && file_exists("../assets/upload/products/" . $product->photo)) : ?>
                                <img src="../assets/upload/products/<?php echo $product->photo; ?>" style="width:100px;">
                                <?php endif; ?>
                            </td>
                            <td style="font-size: 16px;"><?php echo $value->count; ?></td>
                            <td style="font-size: 16px;"><?php echo number_format($value->count * ($value->price - ($value->price * $product->discount) / 100)); ?>đ</td>
                        </tr>
                        <?php } ?>
                    </tbody>


                </table>
                <div>
                    <h2>Tổng doanh thu : <?php echo number_format($countDay); ?>đ</h2>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Doanh thu theo tuần</h3>
                <?php
                $countWeek = 0;
                $data2 = $this->modelSalesWeek();
                usort($data2, 'cmp');
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="font-size: 16px;width:150px;">Mã sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Tên sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Hình ảnh</th>
                            <th scope="col" style="font-size: 16px;">Số lượng đã bán</th>
                            <th scope="col" style="font-size: 16px;">Tiền nhận được</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data2 as $key => $value) { ?>
                        <?php
                        $product = $this->getProduct($value->product_id);
                        $countWeek += $value->count * ($value->price - ($value->price * $product->discount) / 100);
                        ?>
                        <tr>
                            <th scope="row" style="font-size: 16px;">#<?php echo $value->product_id; ?></th>
                            <td style="font-size: 16px;"><?php echo $product->name; ?></td>
                            <td><?php if ($product->photo != "" && file_exists("../assets/upload/products/" . $product->photo)) : ?>
                                <img src="../assets/upload/products/<?php echo $product->photo; ?>" style="width:100px;">
                                <?php endif; ?>
                            </td>
                            <td style="font-size: 16px;"><?php echo $value->count; ?></td>
                            <td style="font-size: 16px;"><?php echo number_format($value->count * ($value->price - ($value->price * $product->discount) / 100)); ?>đ</td>
                        </tr>
                        <?php } ?>
                    </tbody>


                </table>
                <div>
                    <h2>Tổng doanh thu : <?php echo number_format($countWeek); ?>đ</h2>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Doanh thu theo tháng</h3>
                <?php
                $countMonth = 0;
                $data3 = $this->modelSalesMonth();
                usort($data3, 'cmp');
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="font-size: 16px;width:150px;">Mã sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Tên sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Hình ảnh</th>
                            <th scope="col" style="font-size: 16px;">Số lượng đã bán</th>
                            <th scope="col" style="font-size: 16px;">Tiền nhận được</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data3 as $key => $value) { ?>
                        <?php
                        $product = $this->getProduct($value->product_id);
                        $countMonth += $value->count * ($value->price - ($value->price * $product->discount) / 100);
                        ?>
                        <tr>
                            <th scope="row" style="font-size: 16px;">#<?php echo $value->product_id; ?></th>
                            <td style="font-size: 16px;"><?php echo $product->name; ?></td>
                            <td><?php if ($product->photo != "" && file_exists("../assets/upload/products/" . $product->photo)) : ?>
                                <img src="../assets/upload/products/<?php echo $product->photo; ?>" style="width:100px;">
                                <?php endif; ?>
                            </td>
                            <td style="font-size: 16px;"><?php echo $value->count; ?></td>
                            <td style="font-size: 16px;"><?php echo number_format($value->count * ($value->price - ($value->price * $product->discount) / 100)); ?>đ</td>
                        </tr>
                        <?php } ?>
                    </tbody>


                </table>
                <div>
                    <h2>Tổng doanh thu : <?php echo number_format($countMonth); ?>đ</h2>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>Doanh thu theo năm</h3>
                <?php
                $countYear = 0;
                $data4 = $this->modelSalesYear();
                usort($data4, 'cmp');
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="font-size: 16px;width:150px;">Mã sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Tên sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Hình ảnh</th>
                            <th scope="col" style="font-size: 16px;">Số lượng đã bán</th>
                            <th scope="col" style="font-size: 16px;">Tiền nhận được</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data4 as $key => $value) { ?>
                        <?php
                        $product = $this->getProduct($value->product_id);
                        $countYear += $value->count * ($value->price - ($value->price * $product->discount) / 100);
                        ?>
                        <tr>
                            <th scope="row" style="font-size: 16px;">#<?php echo $value->product_id; ?></th>
                            <td style="font-size: 16px;"><?php echo $product->name; ?></td>
                            <td><?php if ($product->photo != "" && file_exists("../assets/upload/products/" . $product->photo)) : ?>
                                <img src="../assets/upload/products/<?php echo $product->photo; ?>" style="width:100px;">
                                <?php endif; ?>
                            </td>
                            <td style="font-size: 16px;"><?php echo $value->count; ?></td>
                            <td style="font-size: 16px;"><?php echo number_format($value->count * ($value->price - ($value->price * $product->discount) / 100)); ?>đ</td>
                        </tr>
                        <?php } ?>
                    </tbody>


                </table>
                <div>
                    <h2>Tổng doanh thu : <?php echo number_format($countYear); ?>đ</h2>
                </div>
            </div>

            <div id="menu4" class="tab-pane fade">
                <h3>Sản phẩm đã hết</h3>
                <?php
                $data5 = $this->getProductCountZero();
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="font-size: 16px;width:150px;">Mã sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Tên sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Hình ảnh</th>
                            <th scope="col" style="font-size: 16px;">Danh mục</th>
                            <th scope="col" style="font-size: 16px;">Gía</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data5 as $value) { ?>
                        <?php $category = $this->getCategory($value->category_id); ?>
                        <tr>
                            <th scope="row" style="font-size: 16px;">#<?php echo $value->id; ?></th>
                            <td style="font-size: 16px;"><?php echo $value->name; ?></td>
                            <td><?php if ($value->photo != "" && file_exists("../assets/upload/products/" . $value->photo)) : ?>
                                <img src="../assets/upload/products/<?php echo $value->photo; ?>" style="width:100px;">
                                <?php endif; ?>
                            </td>
                            <td style="font-size: 16px;"><?php echo $category->name; ?></td>
                            <td style="font-size: 16px;"><?php echo number_format($value->price); ?>đ</td>
                        </tr>
                        <?php } ?>
                    </tbody>


                </table>
            </div>

            <div id="menu5" class="tab-pane fade">
                <h3>Sản phẩm còn hàng</h3>
                <?php
                $data5 = $this->getProductCount();
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="font-size: 16px;width:150px;">Mã sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Tên sản phẩm</th>
                            <th scope="col" style="font-size: 16px;">Hình ảnh</th>
                            <th scope="col" style="font-size: 16px;">Danh mục</th>
                            <th scope="col" style="font-size: 16px;">Giá</th>
                            <th scope="col" style="font-size: 16px;">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data5 as $value) { ?>
                        <?php $category = $this->getCategory($value->category_id); ?>
                        <tr>
                            <th scope="row" style="font-size: 16px;">#<?php echo $value->id; ?></th>
                            <td style="font-size: 16px;"><?php echo $value->name; ?></td>
                            <td><?php if ($value->photo != "" && file_exists("../assets/upload/products/" . $value->photo)) : ?>
                                <img src="../assets/upload/products/<?php echo $value->photo; ?>" style="width:100px;">
                                <?php endif; ?>
                            </td>
                            <td style="font-size: 16px;"><?php echo $category->name; ?></td>
                            <td style="font-size: 16px;"><?php echo number_format($value->price); ?>đ</td>
                            <td style="font-size: 16px;"><?php echo $value->count; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-1\htdocs\Laptop88\resources\views/admin/statistics/index.blade.php ENDPATH**/ ?>