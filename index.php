<?php
    session_start();
    include "model/pdo.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/taikhoan.php";
    include "view/header.php";
    include "global.php";

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
                        header('location:index.php');
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
                    header('Location: index.php?act=edit_taikhoan');  
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
                header('Location: index.php');
                break;

            case 'addtocart':
                if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                    $product_ID=$_POST['product_ID'];
                    $product_name=$_POST['product_name'];
                    $price=$_POST['price'];
                    $image=$_POST['image'];
                    $soluong=1;
                    $ttien=$soluong * $price;
                    $spadd=[$product_ID,$product_name,$image,$price,$soluong,$ttien];
                    array_push($_SESSION['mycart'],$spadd);
                   
                }

                include "view/cart/viewcart.php";
                break;
            case 'delcart':
                
                // include "view/gioithieu.php";
                header('Location:index.php?act=viewcart');
                break;
        
            case 'viewcart':
                
                include "view/cart/viewcart.php";
                break;
            
            case 'bill':
                
                include "view/cart/bill.php";
                break;
                
            case 'billconfirm':
                
                include "view/cart/billconfirm.php";
                break;
                    
            case 'mybill':
                
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