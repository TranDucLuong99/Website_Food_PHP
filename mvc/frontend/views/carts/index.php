<?php
require_once 'helpers/Helper.php';
/**
 * views/carts/index.php
 * Trang Giỏ hàng của bạn
 */
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['discount']['discount']);
//echo "</pre>";
?>
<section class="breadcrumb-section set-bg" data-setbg="assets/images/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ Hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="trang-chu.html">Trang Chủ</a>
                        <span>Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="timeline-items container" style="margin-bottom: 32px; margin-top: 32px">
    <h2 style="margin-bottom: 16px">Giỏ hàng của bạn  <i class="fa fa-cart-plus" aria-hidden="true"></i></h2>
    <?php if (isset($_SESSION['cart'])): ?>
        <form action="" method="post">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th width="40%">Tên Sản Phẩm</th>
                    <th width="12%">Số Lượng</th>
                    <th>Giá Sản Phẩm</th>
                    <th>Thành Tiền</th>
                    <th></th>
                </tr>

                <?php
                $total_cart = 0;
                foreach($_SESSION['cart'] AS $product_id => $cart):

                    $slug = Helper::getSlug($cart['name']);
                    $product_link = "chi-tiet-san-pham/$slug/$product_id";
                    ?>
                    <tr>
                        <td>
                            <img class="product-avatar img-responsive"
                                 src="../backend/assets/uploads/<?php echo $cart['avatar'] ?>"
                                 width="80">
                            <div class="content-product">
                                <a href="<?php echo $product_link; ?>"
                                   class="content-product-a">
                                    <?php echo $cart['name']?>
                                </a>
                            </div>
                        </td>
                        <td>

                            <input type="number" min="0"
                                   name="<?php echo $product_id?>"
                                   class="product-amount form-control"
                                   value="<?php echo $cart['quantity']; ?>">
                        </td>
                        <td>
                            <?php
                            echo number_format($cart['price']);
                            ?>
                        </td>
                        <td>
                            <?php
                            $total_item = $cart['quantity'] * $cart['price'];
                            $total_cart += $total_item;
                            echo number_format($total_item);
                            ?>
                        </td>
                        <td>
                            <a class="content-product-a"
                               href="xoa-san-pham/<?php echo $product_id; ?>.html">
                                <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
<!--                <tr>-->
<!--                    <td colspan="5" style="text-align: right">-->
<!--                        Nhập mã giảm giá: <input type="text" name="sale" class="sale"> <br>-->
<!--                        <div class="sale-info"></div>-->
<!--                    </td>-->
<!--                </tr>-->
                <tr>
                    <td colspan="5" style="text-align: right">
                        <b>Tổng giá trị đơn hàng:</b>
                        <span class="product-price">
                        <b><?php
                            echo number_format($total_cart);
                            ?> đ</b>
                        </span>
                    </td>
                </tr>
<!--                --><?php //if (isset($_SESSION['discount'])){
//                    $discount_price = $total_cart - ($_SESSION['discount']['discount']/ 100 * $total_cart);
//                }?>
<!--                --><?php //if (isset($_SESSION['discount'])):?>
<!--                    <tr>-->
<!--                        <td colspan="5" style="text-align: right">-->
<!--                            Tổng giá trị đơn hàng sau khi được giảm giá:-->
<!--                            <span class="product-price">-->
<!--                           --><?php //echo number_format($discount_price)?>
<!--                                </span>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                --><?php //endif;?>
                <tr>
                    <td colspan="5" class="product-payment">
                        <input type="submit" name="submit" value="Cập nhật lại giá" class="btn btn-primary">
                        <a href="thanh-toan.html" class="btn btn-success">Đến trang thanh toán</a>
                        <a href="cua-hang.html" class="btn btn-primary" style="float: right">Tiếp tục mua hàng</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    <?php else: ?>
        <h2>Giỏ hàng trống</h2>
        <a href="index.php" class="btn btn-primary">
            Tiếp tục mua hàng
        </a>
    <?php endif; ?>
</div>