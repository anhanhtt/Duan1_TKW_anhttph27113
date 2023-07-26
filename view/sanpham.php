<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
            <div class="boxtitle"> <strong><?=$tendm?></strong></div>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
            $i = 0;
            foreach ($dssp as $sp) {
                extract($sp);
                $hinh = $image_path . $image;
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                $linksp = "index.php?act=sanphamct&idsp=" . $product_ID;

                echo '<div class="col mb-5 ">
                
                <div class="card h-100">
                    
                    <a href="' . $linksp . '"><img class="card-img-top" src="' . $hinh . '" style="width:100%" /></a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <a class="fw-bolder" href="' . $linksp . '">' . $product_name . '</a>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                           
                            <p class="text-muted ">' . $price . ' VNĐ</p>
                           
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="' . $linksp . '">View Detail</a></div>
                    </div>
                </div>
                
                </div>';
                $i += 1;
            }
            ?>
        </div>
    </div>
</section>