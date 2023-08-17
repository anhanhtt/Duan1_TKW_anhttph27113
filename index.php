<?php
    session_start();
    include "model/pdo.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/taikhoan.php";
    include "view/header.php";
    include "global.php";
    include "model/cart.php";
    
    

    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

    $spnew=loadall_sanpham_home();
    $dsdm=loadall_danhmuc();
    $dstop10=loadall_sanpham_top10();

    if((isset($_GET['act']))&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch ($act) {

            
             case 'sanpham':    
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                }else{
                    $kyw="";
                }
                if(isset($_GET['id_type'])&&($_GET['id_type']>0)){
                    $id_type=$_GET['id_type'];
                    
    
                }else{
                    $id_type=0;
                }
                $dssp=loadall_sanpham($kyw,$id_type);
                $tendm=load_ten_dm($id_type);
                include "view/sanpham.php";
                break;

            case 'sanphamct':    
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $id=$_GET['idsp'];
                    $onesp=loadone_sanpham($id);
                    extract($onesp);
                    $sp_cung_loai=load_sanpham_cungloai($product_ID,$id_type);
                    include "view/sanphamct.php";

                }else{
                    include "view/home.php";
                }
                break;
            
           
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $pass=$_POST['pass'];
                    insert_taikhoan($email,$username,$pass);
                    $thongbao="Đã đăng ký thành công. Vui lòng đăng ngập để thực hiện chức năng bình luận, đặt hàng";
                    
                }
                include "./view/register.php";
                break;

            case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $username=$_POST['username'];
                    $pass=$_POST['pass'];
                    $checkuser=checkuser($username,$pass);
                    if(is_array($checkuser)){
                        $_SESSION['user']=$checkuser;
                        // $thongbao="Bạn đã đăng nhập thành công";
                        // header('location:index.php');
                    }else{
                        $thongbao="Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng kí!";
                    }
                    
                }
                include "./view/login.php";
                break;
            
            case 'edit_taikhoan':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $username=$_POST['username'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $id=$_POST['id'];
                    update_taikhoan($id,$username,$pass,$email,$address,$tel);
                    $_SESSION['user']=checkuser($username,$pass);
                    // header('Location: index.php?act=edit_taikhoan');  
                }
                include "view/edit_taikhoan.php";
                break;
               
            case 'quenmk':
                if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                    $email=$_POST['email'];
                    
                    $checkemail=checkemail($email);
                    if(is_array( $checkemail)){
                        $thongbao="Mật khẩu của bạn là: ".$checkemail['pass'];
                    }else{
                        $thongbao="Email này không tồn tại!";
                    }                      
                     
                }
                include "view/quenmk.php";
                break;

            case 'thoat':
                session_unset();
                include "view/home.php";
                break;

            case 'addtocart':
                if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                    $id = $_POST['product_ID'];
                    $name = $_POST['product_name'];
                    $img = $_POST['image'];
                    $gia = $_POST['price'];
                    $soluong = 1;
                    $ttien = $soluong * $gia;
                    $spadd = [$id, $name, $img, $gia, $soluong, $ttien];
                    array_push($_SESSION['mycart'], $spadd);
                }
                include "view/cart/viewcart.php";
                break;
            case 'delcart':
                if (isset($_GET['idcart'])) {
                    array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
                } else {
                    $_SESSION['mycart'] = [];
                }
                include "view/cart/viewcart.php";
                
                break;
        
            case 'viewcart':
                
                include "view/cart/viewcart.php";
                break;
            
            case 'bill':
                
                include "view/cart/bill.php";
                break;
                
            case 'billconfirm':
                if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                    if(isset($_SESSION['user'])) $iduser=$_SESSION['user']['id'];
                    else $iduser=0;
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt'];
                    $ngaydathang = date('h:i:sa d/m/Y');
                    $tongdonhang = tongdonhang();
    
                    // tạo bill
                    $idbill = insert_bill($iduser,$name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
    
                    // insert into cart : $session['my cart'] & idbill
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    }
                    // xóa session
                    $_SESSION['cart'] = [];
    
                }
                $bill = loadone_bill($idbill);
                $billct = loadall_cart($idbill);
                include "view/cart/billconfirm.php";
                break;
                    
            case 'mybill':
                $listbill=loadall_bill($_SESSION['user']['id']);
                include "view/cart/mybill.php";
                break;
                        
                                        
                  
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
    
        
            case 'lienhe':
                include "view/lienhe.php";
                break;
                
            default:
                include "view/home.php";
                break;
        }
    }else{
            include "view/home.php";

    }
    include "view/footer.php";
?>