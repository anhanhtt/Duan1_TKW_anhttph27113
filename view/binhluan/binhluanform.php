<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";

$idpro = $_REQUEST['idpro'];

$dsbl = loadall_binhluan($idpro);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/css/style.css">
    <style>
        .binhluan table {
            width: 90%;
            margin-left: 5%;
        }

        .binhluan table td:nth-child(1) {
            width: 50%;
        }

        .binhluan table td:nth-child(2) {
            width: 20%;
        }

        .binhluan table td:nth-child(3) {
            width: 30%;
        }
    </style>
</head>

<body>
    <div class="row mb">
        <div class="boxtitle"> BÌNH LUẬN</div>
        <div class="boxcontent2 menudoc binhluan">
            <ul>
                <table>
                    <?php

                    foreach ($dsbl as $bl) {
                        extract($bl);
                        echo ' <section class="mt-4" style="background-color: #eee; ">
                        <div class="container my-5 py-5 mt-4">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 col-lg-10 col-xl-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-start align-items-center">
                                                <div>
                                                    <h6 class="fw-bold text-primary mb-1">' . $iduser . '</h6>
                                                    <p class="text-muted small mb-0">' . $ngaybinhluan . '
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-4 pb-2">' . $noidung . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>';
                        
                    }
                    ?>
                </table>

            </ul>
        </div>
        <div class="boxfooter searchbox">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                
                <input type="text" name="noidung" >
                <input type="submit" name="guibinhluan" value="Gửi Bình Luận">
            </form>
        </div>
        <?php
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }


        ?>
    </div>
</body>

</html>