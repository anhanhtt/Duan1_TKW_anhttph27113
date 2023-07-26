<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #6095F0;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="mx-4">
                                <a href="index.php?act=addsp"><input class="card bg-success text-white " type="button"
                                        value="Nhập thêm"></a>
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
                                                    <th scope="col">MÃ TK</th>
                                                    <th scope="col">USERNAME</th>
                                                    <th scope="col">PASS</th>
                                                    <th scope="col">EMAIL</th>
                                                    <th scope="col">ADDRESS</th>
                                                    <th scope="col">TEL</th>
                                                    <th scope="col">ROLE</th>

                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <?php
                                            foreach ($listtaikhoan as $user) {
                                                extract($user);
                                                $suatk = "index.php?act=suatk&id=" . $id;
                                                $xoatk = "index.php?act=xoatk&id=" . $id;

                                                echo '<tbody>
                                                            <tr>
                                                               
                                                                
                                                                </th>
                                                                <td>' . $id . '</td>
                                                                <td>' . $username . '</td>
                                                                <td>' . $pass . '</td>
                                                                <td>' . $email . '</td>
                                                                <td>' . $address . '</td>
                                                                <td>' . $tel . '</td>
                                                                <td>' . $role . '</td>

                                                                
                                                                <td>
                                                                                     
                                                                                    <a href="' . $xoatk . '">
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