<?php
require_once 'helpers/Helper.php';
?>
<style>
    .hotline-phone-ring-wrap {
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 999999;
    }
    .hotline-phone-ring {
        position: relative;
        visibility: visible;
        background-color: transparent;
        width: 110px;
        height: 110px;
        cursor: pointer;
        z-index: 11;
        -webkit-backface-visibility: hidden;
        -webkit-transform: translateZ(0);
        transition: visibility .5s;
        left: 0;
        bottom: 0;
        display: block;
    }
    .hotline-phone-ring-circle {
        width: 85px;
        height: 85px;
        top: 10px;
        left: 10px;
        position: absolute;
        background-color: transparent;
        border-radius: 100%;
        border: 2px solid #7fad39;
        -webkit-animation: phonering-alo-circle-anim 1.2s infinite ease-in-out;
        animation: phonering-alo-circle-anim 1.2s infinite ease-in-out;
        transition: all .5s;
        -webkit-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        opacity: 0.5;
    }
    .hotline-phone-ring-circle-fill {
        width: 55px;
        height: 55px;
        top: 25px;
        left: 25px;
        position: absolute;
        background-color: #7fad39;
        border-radius: 100%;
        border: 2px solid transparent;
        -webkit-animation: phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
        animation: phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
        transition: all .5s;
        -webkit-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
    }
    .hotline-phone-ring-img-circle {
        background-color: #7fad39;
        width: 33px;
        height: 33px;
        top: 37px;
        left: 37px;
        position: absolute;
        background-size: 20px;
        border-radius: 100%;
        border: 2px solid transparent;
        -webkit-animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
        animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
        -webkit-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .hotline-phone-ring-img-circle .pps-btn-img {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .hotline-phone-ring-img-circle .pps-btn-img img {
        width: 20px;
        height: 20px;
    }
    .hotline-bar {
        position: absolute;
        background: #7fad39;
        height: 40px;
        width: 180px;
        line-height: 40px;
        border-radius: 3px;
        padding: 0 10px;
        background-size: 100%;
        cursor: pointer;
        transition: all 0.8s;
        -webkit-transition: all 0.8s;
        z-index: 9;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.1);
        border-radius: 50px !important;
        /* width: 175px !important; */
        left: 33px;
        bottom: 37px;
    }
    .hotline-bar > a {
        color: #fff;
        text-decoration: none;
        font-size: 15px;
        font-weight: bold;
        text-indent: 50px;
        display: block;
        letter-spacing: 1px;
        line-height: 40px;
        font-family: Arial;
    }
    .hotline-bar > a:hover,
    .hotline-bar > a:active {
        color: #fff;
    }
    @-webkit-keyframes phonering-alo-circle-anim {
        0% {
            -webkit-transform: rotate(0) scale(0.5) skew(1deg);
            -webkit-opacity: 0.1;
        }
        30% {
            -webkit-transform: rotate(0) scale(0.7) skew(1deg);
            -webkit-opacity: 0.5;
        }
        100% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
            -webkit-opacity: 0.1;
        }
    }
    @-webkit-keyframes phonering-alo-circle-fill-anim {
        0% {
            -webkit-transform: rotate(0) scale(0.7) skew(1deg);
            opacity: 0.6;
        }
        50% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
            opacity: 0.6;
        }
        100% {
            -webkit-transform: rotate(0) scale(0.7) skew(1deg);
            opacity: 0.6;
        }
    }
    @-webkit-keyframes phonering-alo-circle-img-anim {
        0% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
        }
        10% {
            -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
        }
        20% {
            -webkit-transform: rotate(25deg) scale(1) skew(1deg);
        }
        30% {
            -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
        }
        40% {
            -webkit-transform: rotate(25deg) scale(1) skew(1deg);
        }
        50% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
        }
        100% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
        }
    }
    @media (max-width: 768px) {
        .hotline-bar {
            display: none;
        }
    }
</style>
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <span>Danh Mục Sản Phẩm</span>
                    </div>
                    <ul>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <?php if ($category['id'] == 5 || $category['id'] == 8) : continue; ?>
                                <?php else: ?>
                                    <?php
                                    $url_detail = "index.php?controller=home&action=getNameProduct&id=" . $category['id'];
                                    ?>
                                    <li><a href="<?php echo $url_detail ?>"><?php echo $category['name']; ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#" method="get">
                            <div class="hero__search__categories">
                                Tất cả sản phẩm
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="hidden" name="controller" value="home"/>
                            <input type="hidden" name="action" value="searchData"/>
                            <!--                         <input type="text" placeholder="Bạn cần gì?">-->
                            <input type="text" name="title" id="title"
                                   value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>"/>
                            <button type="submit" name="search" class="site-btn" value="Tìm Kiếm">Tìm Kiếm</button>

                        </form>
                    </div>

                    <div class="hotline-phone-ring-wrap">
                        <div class="hotline-phone-ring">
                            <div class="hotline-phone-ring-circle"></div>
                            <div class="hotline-phone-ring-circle-fill"></div>
                            <div class="hotline-phone-ring-img-circle">
                                <a href="tel:0987654321" class="pps-btn-img">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="hotline-bar">
                            <a href="tel:0327018797">
                                <span class="text-hotline">032.701.8797</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="assets/images/hero/banner.jpg">
                    <div class="hero__text">
                        <span>Thực Phẩm Tươi</span>
                        <h2>Rau Sạch <br />100% Organic</h2>
                        <a href="index.php?controller=shop&action=index" class="primary-btn">Cửa Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section Begin -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <?php if (!empty($categories)): ?>
                <div class="categories__slider owl-carousel">
                    <?php foreach ($categories AS $category):
                        ?>
                        <?php if ($category['id'] == 5) : continue; ?>
                    <?php else: ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="../backend/assets/uploads/<?php echo $category['avatar'] ?>">
                                <h5><a href="#" style="border-radius: 20px; opacity: 75%;"><?php echo $category['name'] ?></a></h5>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Nổi Bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li><a href="index.php?controller=home&action=index" style="color: black">Tất cả</a></li>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category):?>
                                <?php if ($category['id'] == 5 || $category['id'] == 8) : continue; ?>
                                <?php else: ?>
                                    <?php
                                    $url_detail = "index.php?controller=home&action=getNameProduct&id=" . $category['id'];
                                    ?>
                                    <li><a href="<?php echo $url_detail ?>" style="color: black"><?php echo $category['name'] ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </div>
        <!--        <div class="product__pagination">-->
        <!--            --><?php //echo $pages; ?>
        <!--        </div>-->
        <?php if (!empty($productss)): ?>
            <div class="row featured__filter">
                <?php foreach ($productss AS $product):
                    $slug = Helper::getSlug($product['title']);
                    $product_link = "san-pham/$slug/" . $product['id'] . ".html";
                    $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
                    ?>
                    <?php if ($product['category_id'] == 8) :
                    continue;
                    ?>
                <?php else :?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="../backend/assets/uploads/<?php echo $product['avatar'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="<?php echo $product_link ?>"><i class="fa fa-retweet"></i></a></li>
                                    <li data-id="<?php echo $product['id'] ?>"
                                        class="add-to-cart">
                                        <a href="#"><i class="fa fa-shopping-cart "></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#"><?php echo $product['title'] ?></a></h6>
                                <h5><?php echo number_format($product['price'])?> đ</h5>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
<!--        <div class="product__pagination">-->
<!--            --><?php //echo $pages; ?>
<!--        </div>-->
    </div>

</section>


