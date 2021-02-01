<?php
require_once 'helpers/Helper.php';
?>
<section class="breadcrumb-section set-bg" data-setbg="assets/images/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Chi Tiết Sản Phẩm</h2>
                    <div class="breadcrumb__option">
                        <a href="trang-chu.html">Trang chủ</a>
                        <span>Chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-details spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">

                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                             src="../backend/assets/uploads/<?php echo $products['avatar'] ?>" alt="Lỗi ảnh">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">

                <div class="product__details__text">
                    <h3><?php echo $products['title'] ?></h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 lượt xem)</span>
                    </div>
                    <div class="product__details__price"></div>
                    <p><?php echo $products['summary'] ?></p>
                    <p><?php echo $products['content'] ?></p>
                    <a href="#" class="primary-btn add-to-cart"
                       data-id="<?php echo $products['id'] ?>"
                       >Thêm vào giỏ hàng</a>
                    <a href="#" class="heart-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></i>
                    </a>
                    <ul>
                        <li><b>Khối lượng</b> <span>1.0 kg</span></li>
                        <li><b>Giá tiền: </b> <span><?php echo number_format($products['price'])?> đ</span></li>
                        <li><b>Giao hàng: </b> <span><samp>24/24</samp></span></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

