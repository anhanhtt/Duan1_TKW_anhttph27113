<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #6095F0;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="mx-4">
                                <a   href="index.php?act=adddm"><input class="card bg-success text-white " type="button" value="Nhập thêm"></a>
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
                                                    <th scope="col">MÃ LOẠI</th>
                                                    <th scope="col">TÊN LOẠI</th>
                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <?php
                                            foreach ($listdanhmuc as $types) {
                                                extract($types);
                                                $suadm = "index.php?act=suadm&type_id=" . $type_id;
                                                $xoadm = "index.php?act=xoadm&type_id=" . $type_id;
                                                echo '<tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                
                                                                </th>
                                                                <td>' . $type_id . '</td>
                                                                <td>' . $type_name . '</td>
                                                                
                                                                <td>
                                                                                    <a href="' . $suadm . '">
                                                                                        <input class="card bg-primary text-white " type="button" value="Sửa">
                                                                                    </a>
                                                                                    <a href="' . $xoadm . '">
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