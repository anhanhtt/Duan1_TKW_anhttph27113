<div class="px-4 px-lg-0">


    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Sản phẩm</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Giá</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Số lượng</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Thành tiền</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Thao tác</div>
                                    </th>
                                </tr>
                            </thead>
                            <?php
                            $tong = 0;
                            $i = 0;
                            foreach ($_SESSION['mycart'] as $cart) {
                                $hinh = $image_path . $cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                                $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a>';
                                echo '<tr>
                                
                                        <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="' . $hinh . '" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">' . $cart[1] . '</a></h5><span class="text-muted font-weight-normal font-italic d-block"></span>
                                            </div>
                                        </div>
                                        </th>
                                        <td class="border-0 align-middle"><strong>' . $cart[3] . '</strong></td>
                                        <td class="border-0 align-middle"><strong>' . $cart[4] . '</strong></td>
                                        <td class="border-0 align-middle"><strong>' . $ttien . '</strong></td>
                                        <td class="border-0 align-middle"><i class="fa fa-trash">' . $xoasp . '</i></td>
                                     </tr>';
                                $i += 1;
                            }
                            echo '<tr>
                                <td colspan="4">Tổng đơn hàng</td>
                                <td class="border-0 align-middle"><strong>' . $tong . '</strong></td>
                                
                                <td></td>
                                
                            </tr>';
                            ?>
                            <tbody>
                                <tr>

                                </tr>

                            </tbody>
                        </table>
                        <div class="row mb bill">
                            <a href="index.php?act=bill"><input type="button" value="Tiếp Tục Đặt Hàng" style=""></a> <a
                                href="index.php?act=delcart"><input type="button" value="Xoá Giỏ Hàng"></a>
                        </div>
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</div>