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
                                    <h3 class="text-center font-weight-light my-4">THÊM MỚI SẢN PHẨM</h3>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control" id="inputFirstName" name="id_type">
                                                        <?php
                                                        foreach ($listdanhmuc as $types) {
                                                            extract($types);
                                                            echo '<option value="' . $type_id . '">' . $type_name . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="inputFirstName">Loại</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" type="text"
                                                        name="product_name" />
                                                    <label for="inputLastName">Tên sản phẩm</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" input type="file"
                                                name="hinh" />
                                            <label for="inputPassword">Hình</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputEmail" type="text"
                                                        name="price" />
                                                    <label for="inputEmail">Giá</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" textarea
                                                        name="description" cols="30" rows="10" />
                                                    <label for="inputPasswordConfirm">Mô tả</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 mb-0">

                                            <div class="d-grid">
                                                <input class="btn btn-primary btn-block" type="submit" name="themmoi"
                                                    value="THÊM MỚI">
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