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
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <section class="intro">
        <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="table-responsive bg-white">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">IDUSER</th>
                                            <th scope="col">Nội dung </th>
                                            <th scope="col">Ngày</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($dsbl as $bl) {
                                            extract($bl);
                                            echo '<tr><th scope="row" style="color: #666666;">' . $noidung . '</th>';
                                            echo '<td>' . $iduser . '</td></td>';
                                            echo '<td>' . $ngaybinhluan . '</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="boxfooter searchbox">
                                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input type="hidden" name="idpro" value="<?= $idpro ?>">

                                    <input type="text" name="noidung">
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
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    

</body>

</html>