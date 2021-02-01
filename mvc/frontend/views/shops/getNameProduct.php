<?php
require_once 'helpers/Helper.php';
require_once 'models/Product.php';
?>
<section class="breadcrumb-section set-bg" data-setbg="assets/images/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Cửa Hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php?controller=home&action=index">Trang chủ</a>
                        <span>Cửa hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product spad">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục sản phẩm</h4>
                        <ul>
                            <li><a href="cua-hang.html" style="color: black">Tất cả</a></li>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <?php if ($category['id'] == 5) : continue; ?>
                                    <?php else: ?>
                                        <?php
                                        $url_detail = "index.php?controller=shop&action=getNameProduct&id=" . $category['id'];
                                        ?>
                                        <li><a href="<?php echo $url_detail ?>"><?php echo $category['name']; ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <form action="#" method="get">
                            <input type="hidden" name="controller" value="shop"/>
                            <input type="hidden" name="action" value="getPrice"/>
                            <h4>Giá sản phẩm</h4>
                            <div class="sidebar__item__size">
                                <input type="checkbox" name="price" id="large" value="1">
                                <label for="large"style="border: none; border-radius: 8px;">
                                    0 đ - 20,000 đ
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <input type="checkbox"  name="price" id="medium" value="2">
                                <label for="medium"style="border: none; border-radius: 8px;">
                                    20,000 đ - 50,000 đ
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <input type="checkbox" id="small" name="price" value="3">
                                <label for="small"style="border: none; border-radius: 8px;">
                                    50,000 đ - 200,000 đ
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <input type="checkbox" id="tiny" name="price" value="4">
                                <label for="tiny" style="border: none; border-radius: 8px;">
                                    200,000 đ - 1,000,000 đ
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <input type="submit" name="submit" value="Tìm Kiếm" style="border: none; border-radius: 8px; height: 36px; width: 80px; color: #6f6f6f">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar__item">

                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Khuyến mại</h2>
                    </div>
                    <div class="row">
                        <?php if (!empty($product_names)): ?>
                            <div class="product__discount__slider owl-carousel">
                                <?php foreach ($product_names AS $product):
                                    $slug = Helper::getSlug($product['title']);
                                    $product_link = "san-pham/$slug/" . $product['id'] . ".html";
                                    $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
                                    ?>
                                    <?php if ($product['discount'] <=0) :
                                    continue;
                                    ?>
                                <?php else: ?>
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                 data-setbg="../backend/assets/uploads/<?php echo $product['avatar'] ?>">
                                                <div class="product__discount__percent">- <?php echo $product['discount'] ; ?>%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li data-id="<?php echo $product['id'] ?>"
                                                        class="add-to-cart">
                                                        <a href="#"><i class="fa fa-shopping-cart "></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span><?php echo $product['category_name'] ?></span>
                                                <h5><a href="#"><?php echo $product['title'] ?></a></h5>
                                                <div class="product__item__price"><?php echo number_format($product['price'])?> đ <span><?php echo number_format($product['new_price'])?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <form action="#" method="get">
                                    <input type="hidden" name="controller" value="shop"/>
                                    <input type="hidden" name="action" value="getPricee"/>
                                    <span><input type="submit" name="submit" value="Giá" style="background: white; border: none"></span>
                                    <select name="price_asc">
                                        <option value="0">--Chọn--</option>
                                        <option value="1">Thấp lên cao</option>
                                        <option value="2">Cao xuống thấp</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6>Sản phẩm được tìm thấy</h6>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <?php if (!empty($product_names)): ?>
                        <?php foreach ($product_names AS $product):
                            $slug = Helper::getSlug($product['title']);
                            $product_link = "san-pham/$slug/" . $product['id'] . ".html";
                            $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
                            ?>
                            <?php if ($product['discount'] > 0) :
                            continue;
                            ?>
                        <?php else: ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="../backend/assets/uploads/<?php echo $product['avatar'] ?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="<?php echo $product_link; ?>"><i class="fa fa-retweet"></i></a></li>
                                            <li data-id="<?php echo $product['id'] ?>"
                                                class="add-to-cart">
                                                <a href="#"><i class="fa fa-shopping-cart "></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="<?php echo $product_link ?>"><?php echo $product['title'] ?></a></h6>
                                        <h5><?php echo number_format($product['price'])?> đ</h5>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<!--        <h2 style="text-align: center; margin: 32px 0px 24px 0px">Sản Phẩm Bán Chạy Nhất</h2>-->
<!--        <div class="row">-->
<!--            --><?php //if (!empty($getproducts)): ?>
<!--                <div class="product__discount__slider owl-carousel">-->
<!--                    --><?php //foreach ($getproducts AS $product):
//                        $slug = Helper::getSlug($product['title']);
//                        $product_link = "san-pham/$slug/" . $product['id'] . ".html";
//                        $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
//                        ?>
<!--                        --><?php //if (($product['discount'] > 0) || ($product['tong'] < 20)) :
//                        continue;
//                        ?>
<!--                    --><?php //else: ?>
<!--                        <div class="col-lg-4">-->
<!--                            <div class="product__discount__item">-->
<!--                                <div class="product__discount__item__pic set-bg"-->
<!--                                     data-setbg="../backend/assets/uploads/--><?php //echo $product['avatar'] ?><!--">-->
<!--                                    <ul class="product__item__pic__hover">-->
<!--                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                        <li><a href="--><?php //echo $product_link ?><!--"><i class="fa fa-retweet"></i></a></li>-->
<!--                                        <li data-id="--><?php //echo $product['id'] ?><!--"-->
<!--                                            class="add-to-cart">-->
<!--                                            <a href="#"><i class="fa fa-shopping-cart "></i></a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                                <div class="product__discount__item__text">-->
<!--                                    <h5><a href="--><?php //echo $product_link ?><!--">--><?php //echo $product['title'] ?><!--</a></h5>-->
<!--                                    <div class="product__item__price">--><?php //echo number_format($product['price'])?><!-- đ</span></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endif; ?>
<!--                    --><?php //endforeach; ?>
<!--                </div>-->
<!--            --><?php //endif; ?>
<!--        </div>-->
    </div>
</section>
