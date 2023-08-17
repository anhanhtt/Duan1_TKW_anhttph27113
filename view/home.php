<header class=" py-5 h-100 container">
    <div class="container px-4 px-lg-5 my-5 h-100">
        <div class="text-center text-white">
            <div class="img-slider">
                <!-- <div class="slide active">
            <img src="./imgTaiNguyen/slidershow-1.jpg" alt="">
            <div class="info sl1">
                <p id="text1_sl1">Chào mừng bạn đến với</p>
                <h4 id="h4_sl1">PENGUIN</h4>
                <p id="text2_sl1">Mang đến trải nghiệm sản phẩm tốt nhất</p>
                <a href="#">Trải nghiệm ngay</a>
            </div>
            </div> -->
                <div class="slide">
                    <img src="https://daotaonganhan.hcmute.edu.vn/wp-content/uploads/2017/02/nike-banner.png"
                      width="100%"  height=100%>
                    <div class="info sl2">
                        <h4 id="h4_sl2">SNEAKER </h4>
                        <p id="text2_sl2">Mang đến trải nghiệm sản phẩm tốt nhất</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="https://file.hstatic.net/200000097517/collection/banner1_9287ef0eb8744148a4e775f2c79ba245.jpg"
                    width="90%" height=100%>
                    <div class="info sl3">
                        <h4 id="h4_sl3">SNEAKER</h4>
                        <p id="text2_sl3">Mang đến trải nghiệm sản phẩm tốt nhất</p>
                    </div>
                </div>
                <div class="navigation">
                    <!-- <div class="btn active"></div> -->
                    <div class="btn"></div>
                    <div class="btn"></div>
                </div>
            </div>

            <script type="text/javascript">
                var slides = document.querySelectorAll('.slide');
                var btns = document.querySelectorAll('.btn');
                let currentSlide = 1;

                // Javascript for image slider manual navigation
                var manualNav = function (manual) {
                    slides.forEach((slide) => {
                        slide.classList.remove('active');

                        btns.forEach((btn) => {
                            btn.classList.remove('active');
                        });
                    });

                    slides[manual].classList.add('active');
                    btns[manual].classList.add('active');
                }

                btns.forEach((btn, i) => {
                    btn.addEventListener("click", () => {
                        manualNav(i);
                        currentSlide = i;
                    });
                });

                // Javascript for image slider autoplay navigation
                var repeat = function (activeClass) {
                    let active = document.getElementsByClassName('active');
                    let i = 1;

                    var repeater = () => {
                        setTimeout(function () {
                            [...active].forEach((activeSlide) => {
                                activeSlide.classList.remove('active');
                            });

                            slides[i].classList.add('active');
                            btns[i].classList.add('active');
                            i++;

                            if (slides.length == i) {
                                i = 0;
                            }
                            if (i >= slides.length) {
                                return;
                            }
                            repeater();
                        }, 4000);
                    }
                    repeater();
                }
                repeat();
            </script>
        </div>


    </div>

</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
        <?php
            $i = 0;
            foreach ($spnew as $sp) {
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
                    
                    <a href="' . $linksp . '"><img class="card-img-top h-70" src="' . $hinh . '" style="width:300px height:300px" /></a>
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

<section class="py-5">
    <h3>Top 10 yêu thích</h3>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
        <?php
            $i = 0;
            foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp="index.php?act=sanphamct&idsp=".$product_ID;
                $image=$image_path.$image;
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }

                echo '<div class="col mb-5 ">
                
                <div class="card h-100">
                    
                    <a href="' . $linksp . '"><img class="card-img-top" src="' . $image . '" style="width:100%" /></a>
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