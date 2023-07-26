<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </div>
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #6095F0;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <form action="index.php?act=listsp" method="post">
                                <input type="text" name="kyw">
                                <select name="id_type">
                                    <option value="0" selected>Tất cả</option>
                                    <?php
                                    foreach ($listdanhmuc as $types) {
                                        extract($types);
                                        echo '<option value="' . $type_id . '">' . $type_name . '</option>';
                                    }
                                    ?>

                                </select>
                                <input class=" bg-warning text-white "type="submit" name="listok" value="GO">
                            </form>
                            <div class="mx-4">
                                <a href="index.php?act=addsp"><input class="card bg-success text-white " type="button" value="Nhập thêm"></a>
                            </div>
                            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" />
                                                        </div>
                                                    </th>
                                                    <th scope="col">MÃ SẢN PHẨM</th>
                                                    <th scope="col">TÊN SẢN PHẨM</th>
                                                    <th scope="col">GIÁ SẢN PHẨM</th>
                                                    <th scope="col">HÌNH ẢNH</th>
                                                    <th scope="col">LƯỢT XEM</th>
                                                    <th scope="col"></th>


                                                </tr>
                                            </thead>
                                            <?php
                                            foreach ($listsanpham as $products) {
                                                extract($products);
                                                $suasp = "index.php?act=suasp&product_ID=" . $product_ID;
                                                $xoasp = "index.php?act=xoasp&product_ID=" . $product_ID;
                                                $hinhpath = "../upload/" . $image;
                                                if (is_file($hinhpath)) {
                                                    $hinh = "<img src='" . $hinhpath . "' height='80'>";
                                                } else {
                                                    $hinh = "no photo";
                                                }
                                                echo '<tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                
                                                                </th>
                                                                <td>' . $product_ID . '</td>
                                                                <td>' . $product_name . '</td>
                                                                <td>' . $price . '</td>
                                                                <td>' . $hinh . '</td>
                                                                <td>' . $views . '</td>
                                                                
                                                                <td>
                                                                    <a href="' . $suasp . '">
                                                                        <input class="card bg-primary text-white " type="button" value="Sửa">
                                                                    </a>
                                                                    <a href="' . $xoasp . '">
                                                                        <input class="card bg-danger text-white " type="button" value="Xóa">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>';
                                            }
                                            ?>

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

</div>