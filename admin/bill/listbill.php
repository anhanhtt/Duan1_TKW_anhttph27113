<div class="row">
    <div class="row formtitle">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #6095F0;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                <form action="index.php?act=listbill" method="post">
                    <input type="text" name="kyw">
                    <input type="submit" name="listok" value="OK">
                    </select>
                </form>
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
                                                    <th scope="col">Mã Đơn Hàng</th>
                                                    <th scope="col">Khách Hàng</th>
                                                    <th scope="col">Số Lượng Hàng</th>
                                                    <th scope="col">Giá Trị Đơn Hàng</th>
                                                    <th scope="col">Tình Trạng Đơn Hàng</th>
                                                    <th scope="col">Ngày Đặt Hàng</th>

                                                </tr>
                                            </thead>
                                            <?php
                                           foreach($listbill as $bill) {
                  
                                            extract($bill);
                                            $kh=$bill["bill_name"].'
                                            <br>'.$bill["bill_email"].'
                                            <br>'.$bill["bill_address"].'
                                            <br>'.$bill["bill_tel"];
                                            $ttdh=get_ttdh($bill["bill_status"]);
                                            $countsp=loadall_cart_count($id);
                                            
                                                echo '<tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                
                                                                </th>
                                                                <td>' .$bill['id']. '</td>
                                                                <td>' .$kh.'</td>
                                                                <td>' .$countsp.'</td>
                                                                <td> <strong>' .$bill["total"]. '</strong> VND</td>
                                                                <td>'.$ttdh.'</td>
                                                                <td> '.$bill["ngaydathang"].'</td>
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
                    <script>
                        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                        const selectAll = document.querySelector('#select-all');
                        const deselectAll = document.querySelector('#deselect-all');

                        selectAll.addEventListener('click', () => {
                            checkboxes.forEach(checkbox => {
                                checkbox.checked = true;
                            });
                        });

                        deselectAll.addEventListener('click', () => {
                            checkboxes.forEach(checkbox => {
                                checkbox.checked = false;
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>

</div>