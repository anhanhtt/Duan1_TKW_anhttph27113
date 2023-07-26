<div class="row mb ">
    <div class="boxtrai mr ">
        <div class="row mb">
            <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
            <div class=" row boxcontent formtaikhoan ">
                <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        extract($_SESSION['user']);

                    }
                ?>
               <form action="index.php?act=edit_taikhoan" method="post" class="formtaikhoan">
                    <div class="row mb10">
                        Email
                        <input type="email" name="email"style="width:100%" value="<?=$email?>">
                    </div>
                    <div class="row mb10">
                        Username
                        <input type="text" name="username"style="width:100%" value="<?=$username?>">
                    </div>
                    <div class="row mb10">
                        Password
                        <input type="password" name="pass"style="width:100%"value="<?=$pass?>">
                    </div>
                    <div class="row mb10">
                        Address
                        <input type="text" name="address"style="width:100%"value="<?=$address?>">
                    </div>
                    <div class="row mb10">
                        Tel
                        <input type="text" name="tel"style="width:100%"value="<?=$tel?>">
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" value="Cập nhật" name="capnhat">
                        <input type="reset" value="Nhập lại">
                    </div>
                 
                
               </form>
               <h2 class="thongbao">
                    <?php
                        
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }
                        
                    ?>
               </h2>
            </div>
        </div>
               
    </div>
    <div class="boxphai ">
        <?php
            include "view/boxright.php";
        ?>

    </div>
</div>
