<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $image;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "no photo";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="../view/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">CẬP NHẬT SẢN PHẨM</h3>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control" id="inputFirstName" name="id_type">
                                                        <option value="0" selected>Tất cả</option>
                                                        <?php
                                                        foreach ($listdanhmuc as $types) {
                                                            extract($types);
                                                            if ($id_type == $type_id)
                                                                $s = "selected";
                                                            else
                                                                $s = "";
                                                            echo '<option value="' . $type_id . '" ' . $s . '>' . $type_name . '</option>';

                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="inputFirstName">Loại</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" type="text"
                                                        name="product_name" value="<?= $product_name ?>" />
                                                    <label for="inputLastName">Tên sản phẩm</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="file"
                                                name="image" /><?= $hinh ?>
                                            <label for="inputPassword">Hình</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputEmail" type="text" name="price"
                                                        value="<?= $price ?>" />
                                                    <label for="inputEmail">Giá</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <textarea class="form-control" id="inputPasswordConfirm"
                                                        name="description" cols="30"
                                                        rows="10"><?= $description ?></textarea>
                                                    <label for="inputPasswordConfirm">Mô tả</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 mb-0">

                                            <div class="d-grid">
                                                <input type="hidden" name="product_ID" value="<?= $product_ID ?>">
                                                <input class="btn btn-primary btn-block" type="submit" name="capnhat"
                                                    value="CẬP NHẬT">
                                                <input class="btn btn-warning btn-block" type="reset" value="Nhập lại">
                                                <a class="btn btn-primary btn-block" href="index.php?act=listsp">DANH
                                                    SÁCH></a>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($thongbao) && ($thongbao != ""))
                                            echo $thongbao;
                                        ?>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>