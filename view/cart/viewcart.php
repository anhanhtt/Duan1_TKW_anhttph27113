<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">GIỎ HÀNG</div>
            <div class="row boxcontent cart" >
                <table>
                    <tr>
                        <th>HÌNH</th>
                        <th>SẢN PHẨM</th>
                        <th>ĐƠN GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>THÀNH TIỀN</th>
                        <th>THAO TÁC</th>
                        
                    </tr>

                    <?php
                        $tong=0;
                        foreach ($_SESSION['mycart'] as $cart) {
                            $hinh=$image_path.$cart[2];
                            $ttien=$cart[3] * $cart[4];
                            $tong+=$ttien;
                           echo '<tr>
                                
                                <td><img src="'.$hinh.'" alt="" height="80px"></td>
                                <td>'.$cart[1].'</td>
                                <td>'.$cart[3].'</td>
                                <td>'.$cart[4].'</td>
                                <td>'.$ttien.'</td>
                                <td><input type="button" value="Xóa"></td>
                            </tr>';
                        }
                        echo '<tr>
                                <td colspan="4">Tổng đơn hàng</td>
                                
                                <td>'.$tong.'</td>
                                <td></td>
                                
                            </tr>';
                        
                    ?>
                    <!-- <tr>
                        <th>1</th>
                        <th><img src="../images/Giày-Vans-Ward.jpg" alt="" height="80px"></th>
                        <th>Giày Vans Ward</th>
                        <th>50</th>
                        <th>2</th>
                        <th>100 vnd</th>
                        
                    </tr>

                    <tr>
                        <th>2</th>
                        <th><img src="../images/Nike-Air-Jordan-4-Retro-Off-White-sail-1.jpg" alt="" height="80px"></th>
                        <th>Nike-Air-Jordan-4-Retro-Off-White-sail</th>
                        <th>60</th>
                        <th>2</th>
                        <th>120 vnd</th>
                        
                    </tr> -->
                    
                </table>
            </div>
        </div>
        <div class="row mb bill">
            <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG"><a href="index.php?act=delcart"><input type="button" value="XÓA GIỎ HÀNG"></a>
        </div>
        
        
    </div>
    <div class="boxphai ">
               <?php
                include "view/boxright.php";
               ?>

            </div>
</div>