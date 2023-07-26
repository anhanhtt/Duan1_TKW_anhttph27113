<!-- Product section-->


<div class="container px-4 px-lg-5 my-5">
  <?php
  extract($onesp);
  ?>
  <div class="row gx-4 gx-lg-5 align-items-center">
    <?php
    $image = $image_path . $image;
    echo '<div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                src="' . $image . '" style="width:100%" /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder">' . $product_name . '</h1>
                    <div class="fs-5 mb-5">
                        
                        <span>' . $price . '</span>
                    </div>
                    <p class="lead">' . $description . '</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                            style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>';
    ?>


    <!-- Related items section-->
    <section class="py-5 bg-light">
      <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          <?php
          foreach ($sp_cung_loai as $sp_cung_loai) {

            extract($sp_cung_loai);
            $hinh = $image_path . $image;

            $linksp = "index.php?act=sanphamct&idsp=" . $product_ID;
            echo '<div class="col mb-5">
              <div class="card h-100">
              <a href="' . $linksp . '">
              <img class="card-img-top" src="' . $hinh . '" style="width:100%" /></a>
                
                <div class="card-body p-4">
                  <div class="text-center">
                  <a class="fw-bolder" href="' . $linksp . '">' . $product_name . '</a>
                    <!-- Product reviews-->
                    <div class="d-flex justify-content-center small text-warning mb-2">
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                    </div>
                    <!-- Product price-->
                    <p class="text-muted ">' . $price . ' VNĐ</p>
                  </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                  <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                </div>
              </div>
            </div>';
          }
          ?>
          

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
          <script>
            $(document).ready(function () {
              $("#binhluan").load("view/binhluan/binhluanform.php", { idpro: <?= $product_ID ?> });
            });
          </script>
      </div>
    </section>