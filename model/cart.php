<?php

function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }
    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
        </tr>';

    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
        } else {
            $xoasp_td = '';
        }
        echo '
            
            <tr>
                    <td><img src="' . $hinh . '" alt="" height="80px"></td>
                    <td>' . $cart[1] . '</td>
                    <td>' . $cart[3] . '</td>
                    <td>' . $cart[4] . '</td>
                    <td>' . $ttien . '</td>
                    ' . $xoasp_td . '
                </tr>';
        $i += 1;
    }
    echo '<tr>
                <td colspan="4">Tổng Đơn Hàng</td>
                        
                <td>' . $tong . '</td>
                ' . $xoasp_td2 . '
            </tr>';
}

function bill_chitiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;


    echo '<tr>
    <th scope="col" class="border-0 bg-light">Hình</th>
    <th scope="col" class="border-0 bg-light">Sản Phẩm</th>
    <th scope="col" class="border-0 bg-light">Đơn Giá</th>
    <th scope="col" class="border-0 bg-light">Số Lượng</th>
    <th scope="col" class="border-0 bg-light">Thành Tiền</th>
    </tr>';
    foreach ($listbill as $cart) {
        $img = $img_path . $cart['img'];
        $tong += $cart['ttien'];
        echo '
        <tr>
        <td class="border-0 align-middle"><img src="' . $img . '" alt="" height="80px"></td>
        <td class="border-0 align-middle">' . $cart['name'] . '</td>
        <td class="border-0 align-middle">' . $cart['gia'] . '</td>
        <td class="border-0 align-middle">' . $cart['soluong'] . '</td>
        <td class="border-0 align-middle">' . $cart['ttien'] . '</td>
        </tr>';
        $i += 1;
    }
    echo '<tr>
    <td colspan="4">Tổng Đơn Hàng</td>
    <td>' . $tong . '</td>
    </tr> ';
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;

    }
    return $tong;
}

function insert_bill($iduser,$name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO bill (iduser, bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, total) VALUES('$iduser','$name','$email','$address','$tel','$pttt', '$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($iduser, $idpro, $img, $name, $gia, $soluong, $ttien, $idbill)
{
    $sql = "INSERT INTO cart(iduser, idpro, img, name, gia, soluong, ttien, idbill) VALUES('$iduser', '$idpro', '$img', '$name', '$gia', '$soluong', '$ttien', '$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}


function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}


function loadall_bill($kyw="", $iduser=0)
{
    $sql = "select * from bill where 1";
    if($iduser>0) $sql.=" AND iduser=" . $iduser;
    if($kyw!="") $sql.=" AND id like '%".$kyw."%'";
    $sql.=" order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($n) {
    switch ($n) {
        case '0':
            $tt="Đơn hàng mới";
            break;
        case '1':
            $tt="Đang xử lý";
            break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Hoàn tất";
        break;
        
        default:
            $tt="Đơn hàng mới";
            break;
    }
    return $tt;
}


function loadall_thongke() {

    $sql=" select types.type_id as madm, types.type_name as tendm, count(products.product_ID) as countsp, min(products.price) as mingia, max(products.price) as maxgia, avg(products.price) as avggia ";
    $sql.=" from products left join types on types.type_id = products.id_type";
    $sql.=" group by types.type_id order by types.type_id desc ";
    $listtk=pdo_query($sql);
    return $listtk;

}


?>