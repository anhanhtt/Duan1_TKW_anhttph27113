<?php
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";


//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            //kiêm tra xem nguoi dung co click vào nut add hay khong
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $type_name = $_POST['type_name'];
                insert_danhmuc($type_name);
                $thongbao = "them thanh cong";
            }

            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['type_id']) && ($_GET['type_id'] > 0)) {
                delete_danhmuc($_GET['type_id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['type_id']) && ($_GET['type_id'] > 0)) {
                $dm = loadone_danhmuc($_GET['type_id']);
            }

            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $type_name = $_POST['type_name'];
                $type_id = $_POST['type_id'];
                update_danhmuc($type_id, $type_name);
                $thongbao = "cap nhat thanh cong";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        /* controller sản phẩm */

        case 'addsp':
            //kiêm tra xem nguoi dung co click vào nut add hay khong
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $id_type = $_POST['id_type'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded. ";
                } else {
                    // echo "Sorry, there was an error uploading your file. ";
                }

                insert_sanpham($product_name, $price, $hinh, $description, $id_type);
                $thongbao = "them thanh cong";
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $id_type = $_POST['id_type'];
            } else {
                $kyw = '';
                $id_type = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $id_type);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['product_ID']) && ($_GET['product_ID'] > 0)) {
                delete_sanpham($_GET['product_ID']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['product_ID']) && ($_GET['product_ID'] > 0)) {
                $sanpham = loadone_sanpham($_GET['product_ID']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $product_ID = $_POST['product_ID'];
                $id_type = $_POST['id_type'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded. ";
                } else {
                    // echo "Sorry, there was an error uploading your file. ";
                }
                update_sanpham($product_ID, $id_type, $product_name, $hinh, $price, $description);
                $thongbao = "cap nhat thanh cong";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'dskh':

            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/update.php";
            break;

        case 'updatetk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];


                update_taikhoan($id, $username, $pass, $email, $address, $tel, $role);
                $thongbao = "cap nhat thanh cong";
            }
            $listtaikhoan = loadall_taikhoan();

            include "taikhoan/update.php";
            break;

        case 'dsbl':

            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;


        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'addtocard':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'] > 0)) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                $soluong = 1;
                $ttien = $soluong * $gia;
                $spadd = [$id, $name, $img, $gia, $soluong, $ttien];
                array_push($_SESSION['mycart'], $spadd);
            }
            include "view/cart/viewcart.php";
            break;


        case 'listbill':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $listbill = loadall_bill($kyw, 0);
            include "bill/listbill.php";
            break;


        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;

        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;


        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}



include "footer.php";
?>