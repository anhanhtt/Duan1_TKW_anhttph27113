<?php
include 'conect/conect.php';
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SNEAKER</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="view/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="view/css/home.css">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php"><strong>
                    <span>S</span>
                    <span>N</span>
                    <span>E</span>
                    <span>A</span>
                    <span>K</span>
                    <span>E</span>
                    <span>R</span>


                </strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Trang Chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Sản Phẩm</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $dsdm = loadall_danhmuc();
                            foreach ($dsdm as $dm) {
                                extract($dm);
                                $linkdm = "index.php?act=sanpham&id_type=" . $type_id;
                                echo '<li><a class="dropdown-item" href="' . $linkdm . '">' . $type_name . '</a></li>';
                            }
                            ?>
                        </ul>
                        <!-- 
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="'.$linkdm.'">'.$type_name.'</a></li>
                             -->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php?act=gioithieu">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Tin tức</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?act=lienhe">Liên hệ</a></li>


                </ul>
                <form class="d-flex ">
                    <form action="index.php?act=sanpham" method="post">

                        <input type="text " placeholder="Search" class="input" name="kyw">
                        <input class="xyz px-4" type="submit" name="timkiem" value="Tìm Kiếm ">

                    </form>

                    <button class="btn btn-outline-dark px-4 nav-item dropdown" type="submit">
                        <i class="fas fa-user nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <div class="boxcontent formtaikhoan dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (isset($_SESSION['user'])) {
                                extract($_SESSION['user']);
                                ?>
                                <div class="row mb10 dropdown-item">
                                    Xin chào: <br>
                                    <?= $username ?>
                                </div>
                                <div class="row mb10">
                                    <li>
                                        <a class="dropdown-item" href="index.php?act=quenmk"> Quên mật khẩu</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index.php?act=edit_taikhoan"> Cập nhật tài khoản</a>
                                    </li>
                                    <?php
                                    if ($role == 1) {
                                        ?>
                                        <li>
                                            <a class="dropdown-item" href="admin/index.php"> Vào trang Admin</a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                       
                                            <a class="btn btn-outline-dark  dropdown-item" type="submit">
                                                <i class="bi-cart-fill me-1"></i>
                                                Cart
                                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                                            </a>
                                       
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a class="dropdown-item" href="index.php?act=thoat"> Thoát</a>
                                    </li>

                                </div>
                                <?php
                            } else {


                                ?>
                                <form action="index.php?act=dangnhap" method="post">
                                    <div class="row mb10 dropdown-item">
                                        Tên đăng nhập <br>
                                        <input type="text" name="username">
                                    </div>
                                    <div class="row mb10 dropdown-item">
                                        Mật khẩu <br>
                                        <input type="password" name="pass">
                                    </div>
                                    <div class="row mb10 dropdown-item">
                                        <input type="checkbox" name="">Ghi nhớ tài khoản?<br>

                                    </div>
                                    <div class="row mb10 dropdown-item">
                                        <input type="submit" value="Đăng nhập" name="dangnhap">
                                    </div>


                                </form>
                                <li>
                                    <a class="dropdown-item" href="index.php?act=quenmk"> Quên mật khẩu</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?act=dangky"> Đăng kí thành viên</a>
                                </li>
                                <?php
                            }
                            ?>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </nav>