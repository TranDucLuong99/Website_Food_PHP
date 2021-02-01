<?php
require_once 'helpers/Helper.php';
?>
<section class="breadcrumb-section set-bg" data-setbg="assets/images/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh Toán</h2>
                    <div class="breadcrumb__option">
                        <a href="trang-chu.html">Trang Chủ</a>
                        <span>Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container" style="margin-top: 36px; margin-bottom: 0px">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h5 class="center-align" style="font-weight: bold; font-size: 36px; margin-bottom: 16px">Thông tin khách hàng</h5>
                <div class="form-group">
                    <label>Họ tên khách hàng <span style="color: red">(*)</span></label>
                    <input type="text" name="fullname" value="<?php echo $_SESSION['user']['first_name'] ?><?php echo $_SESSION['user']['last_name'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Địa chỉ giao hàng <span style="color: red">(*)</span></label>
                    <input type="text" name="address" value="<?php echo $_SESSION['user']['address']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Số điện thoại <span style="color: red">(*)</span></label>
                    <input type="number" min="0" name="mobile" value="<?php echo $_SESSION['user']['phone']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Email <span style="color: red">(*)</span></label>
                    <input type="email" min="0" name="email" value="<?php echo $_SESSION['user']['email']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Ghi chú <span style="color: red">(*)</span></label>
                    <textarea name="note" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label><b>Chọn phương thức thanh toán</b></label> <br />
                    <input type="radio" name="method" value="0" /> Thanh toán trực tuyến <br />
                    <input type="radio" name="method" checked value="1" /> COD (dựa vào địa chỉ của bạn) <br />
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h5 class="center-align" style="font-weight: bold; font-size: 36px; margin-bottom: 16px">Đơn hàng của bạn</h5>
                <?php
                //biến lưu tổng giá trị đơn hàng
                $total = 0;
                if (isset($_SESSION['cart'])):
                    ?>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th width="40%">Tên sản phẩm</th>
                            <th width="12%">Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
                            $product_link = 'san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                            ?>
                            <tr>
                                <td>
                                    <?php if (!empty($cart['avatar'])): ?>
                                        <img class="product-avatar img-responsive"
                                             src="../backend/assets/uploads/<?php echo $cart['avatar']; ?>" width="60" alt=""/>
                                    <?php endif; ?>
                                    <div class="content-product">
                                        <a href="<?php echo $product_link; ?>" class="content-product-a">
                                            <?php echo $cart['name']; ?>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                  <span class="product-amount">
                                      <?php echo $cart['quantity']; ?>
                                  </span>
                                </td>
                                <td>
                                  <span class="product-price-payment">
                                     <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ
                                  </span>
                                </td>
                                <td>
                                  <span class="product-price-payment">
                                      <?php
                                      $price_total = $cart['price'] * $cart['quantity'];
                                      $total += $price_total;
                                      ?>
                                      <?php echo number_format($price_total, 0, '.', '.') ?> vnđ
                                  </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (isset($_SESSION['code'])):?>
                            <tr>
                                <td colspan="5  ">
                                    Bạn được giảm <?php echo $_SESSION['code']['discount']?>%
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="product-total">
                                    Tổng giá trị đơn hàng:
                                    <span class="product-price">
                                        <?php $total = $total - ($_SESSION['code']['discount']/ 100 * $total)?>
                                        <?php echo number_format($total, 0, '.', '.') ?> vnđ
                            </span>
                                </td>
                            </tr>
                        <?php else:;?>
                        <tr>
                            <td colspan="5" class="product-total">
                               <b>Tổng giá trị đơn hàng:
                                <span class="product-price">
                                <?php echo number_format($total, 0, '.', '.') ?> vnđ
                            </span>
                               </b>
                            </td>
                        </tr>
                        </tbody>
                        <?php endif;?>
                    </table>
                <?php endif; ?>

            </div>
        </div>
        <input type="submit" name="submit" value="Thanh toán" class="btn btn-primary" style="margin-bottom: 36px">
        <a href="gio-hang-cua-ban.html" class="btn btn-secondary" style="margin-bottom: 36px">Về trang giỏ hàng</a>
    </form>
</div>
