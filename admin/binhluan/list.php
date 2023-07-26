<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #6095F0;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
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
                                                    <th scope="col">ID</th>
                                                    <th scope="col">NỘI DUNG BÌNH LUẬN</th>
                                                    <th scope="col">IDuser</th>
                                                    <th scope="col">IDproduct</th>
                                                    <th scope="col">Ngày bình luận</th>
                                                    
                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <?php
                                           foreach($listbinhluan as $binhluan){
                                            extract($binhluan);
                                            $suabl="index.php?act=suabl&id=".$id;
                                            $xoabl="index.php?act=xoabl&id=".$id;
                                            
                                                echo '<tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                
                                                                </th>
                                                                <td>'.$id.'</td>
                                                                <td>'.$noidung.'</td>
                                                                <td>'.$iduser.'</td>
                                                                <td>'.$idpro.'</td>
                                                                <td>'.$ngaybinhluan.'</td>
                                                                
                                                                <td>
                                                                                    
                                                                                    <a href="' . $xoabl . '">
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