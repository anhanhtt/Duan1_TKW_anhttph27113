<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row ">


                            <div class="col-lg-5">

                                <div class="card bg-primary text-white rounded-3">
                                    <form class="card-body" action="index.php?act=billconfirm" method="post">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Thông tin đặt hàng</h5>
                                        </div>
                                        <div class="mt-4">
                                            <?php

                                            if (isset($_SESSION['user'])) {
                                                $name = $_SESSION['user']['username'];
                                                $address = $_SESSION['user']['address'];
                                                $email = $_SESSION['user']['email'];
                                                $tel = $_SESSION['user']['tel'];
                                            } else {
                                                $name = "";
                                                $address = "";
                                                $email = "";
                                                $tel = "";
                                            }

                                            ?>
                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeName" class="form-control form-control-lg"
                                                    siez="17" value="<?= $name ?>" />
                                                <label class="form-label" for="typeName"> Name</label>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeText" class="form-control form-control-lg"
                                                    siez="17" minlength="19" maxlength="19" value="<?= $address ?>"/>
                                                <label class="form-label" for="typeText">Address</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="typeExp"
                                                            class="form-control form-control-lg" value="<?= $email ?>"
                                                            size="7" id="exp" minlength="7" maxlength="7" />
                                                        <label class="form-label" for="typeExp">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="password" id="typeText"
                                                            class="form-control form-control-lg"
                                                            value="<?= $tel ?>" size="1" minlength="3"
                                                            maxlength="3" />
                                                        <label class="form-label" for="typeText">Tel</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                          <input class="mb-2 mr-4" type="radio" name="pttt" checked>PAY TO CARD

                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <input class="mb-2 mr-4" type="radio" name="pttt" checked>Thanh toán khi nhận hàng

                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <input class="mb-2 mr-4" type="radio" name="pttt" checked>Chuyển tiền Online

                                        </div>
                                            <input type="submit" class="btn btn-info btn-block btn-lg dongy" value="Đồng ý đặt hàng" name="dongydathang">
                                        

                                    </form>
                                </div>

                            </div>
                            <div class=" my-6 col-lg-7 d-flex">
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

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>