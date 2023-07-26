<?php
    if(is_array($dm)){
        extract($dm);
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
                                    <h3 class="text-center font-weight-light my-4">CẬP NHẬT LOẠI HÀNG HÓA</h3>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?act=updatedm" method="post">

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputFirstName" name="type_id" disabled />
                                            <label for="inputFirstName">Mã loại</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputFirstName" name="type_name" value="<?php if(isset($type_name)&&($type_name!="")) echo $type_name;?>"/>
                                            <label for="inputFirstName">Tên loại</label>
                                        </div>
                                        
                                        <div class="mt-4 mb-0">
                                            <input type="hidden" name="type_id" value="<?php if(isset($type_id)&&($type_id>0)) echo $type_id;?>">
                                            <div class="d-grid">
                                                <input class="btn btn-success btn-block" type="submit" name="capnhat" value="CẬP NHẬT">
                                                <input class="btn btn-warning btn-block" type="reset" value="Nhập lại">
                                                <a class="btn btn-primary btn-block" href="index.php?act=listdm">DANH SÁCH></a>
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