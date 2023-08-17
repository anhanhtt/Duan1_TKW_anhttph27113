<div class="row">
    <div class="row formtitle">
        <h1>THỐNG KÊ HÀNG HÓA</h1>
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
                                                    
                                                    <th scope="col">Mã Danh Mục</th>
                                                    <th scope="col">Tên Danh Mục</th>
                                                    <th scope="col">Số Lượng</th>
                                                    <th scope="col">Giá Cao Nhất</th>
                                                    <th scope="col">Giá Thấp Nhất</th>
                                                    <th scope="col">Giá Trung Bình</th>

                                                </tr>
                                            </thead>
                                            <?php
                                           foreach($listthongke as $thongke){
                                            extract($thongke); 
                                                echo '<tbody>
                                                            <tr>
                                                                <td>'.$madm.'</td>
                                                                <td>'.$tendm.'</td>
                                                                <td>'.$countsp.'</td>
                                                                <td>'.$maxgia.'</td>
                                                                <td>'.$mingia.'</td>
                                                                <td>'.$avggia.'</td>
                                                            </tr>
                                                            
                                                        </tbody>';
                                            }
                                            ?>

                                        </table>
                                        <a href="index.php?act=bieudo"  class="statistical"> <input type="submit" value="Biểu Đồ Thông Kê"></a>

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