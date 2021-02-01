<?php
require_once 'helpers/Helper.php';
?>
<div class="container">
    <h2 style="text-align: center;color: #0f136c;">Cám ơn bạn đã đặt hàng tại LeoLeo Food!</h2>
    <p><b>Xin chào <?php echo $_POST['fullname'] ; ?></b></p>
    <p>LeoLeo Food đã nhận được đơn hàng của bạn, đơn hàng của bạn đang được xử lý và sẽ giao cho bạn từ 5 - 7 ngày tới
        vui lòng để ý điện thoại, để được giao hàng đúng thời gian. Cảm ơn bạn đã quan tâm và ủng hộ sản phẩm của shop!</p>
    <table>
        <table border="1" cellpadding="8px" cellspacing="0px" style="width: 1000px; margin-bottom: 24px;">
            <tr>
                <td style="color: #0f136c; font-weight: bold">Tên: </td>
                <td><?php echo $_POST['fullname'] ; ?></td>
            </tr>
            <tr>
                <td  style="color: #0f136c; font-weight: bold">Địa chỉ giao hàng: </td>
                <td><?php echo $_POST['address'] ; ?></td>
            </tr>
            <tr >
                <td style="color: #0f136c; font-weight: bold">Điện thoại: </td>
                <td><?php echo $_POST['mobile'] ; ?></td>
            </tr>
            <tr>
                <td style="color: #0f136c; font-weight: bold">Email: </td>
                <td><?php echo $_POST['email'] ; ?></td>
            </tr>
            <tr>
                <td  style="color: #0f136c; font-weight: bold">Ghi Chú: </td>
                <td>
                    <?php echo $_POST['note'] ; ?>
                </td>
            </tr>
        </table >
        <?php
        $total = 0;
        if (!empty($_SESSION['cart'])):
            ?>
        <table border="1" cellpadding="8px" cellspacing="0" style="width: 1000px; margin-bottom: 24px;">
            <?php foreach ($_SESSION['cart'] AS $cart): ?>
            <tr>
                <td colspan="2">Sản Phẩm</td>
            </tr>
            <tr>
                <td>
                    <?php if (!empty($cart['avatar'])): ?>
                        <img class="product-avatar img-responsive"
                             src="../backend/assets/uploads/<?php echo $cart['avatar']; ?>" width="60"/>
                    <?php endif; ?>
                </td>
                <td>
                    <p>
                       Tên Sản Phẩm:  <?php echo $cart['name']  ?>
                    </p>
                    <p>
                        Giá Tiền: <?php echo $cart['price']  ?>
                    </p>
                    <p>
                        Số Lượng: <?php echo $cart['quantity']  ?>
                    </p>
                    <p style="color: red; font-weight: bold">
                        Thành Tiền:
                        <?php
                        $price_total = $cart['price'] * $cart['quantity'];
                        $total += $price_total;
                        ?>
                        <?php echo number_format($price_total, 0, '.', '.') ?> vnđ
                    </p>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <table border="1" cellpadding="8px" cellspacing="0" style="width: 1000px">
            <tr>
                <td>Thành Tiền</td>
                <td style="text-align: center">VND</td>
                <td style="text-align: right">
                    <?php echo number_format($total, 0, '.', '.') ?> vnđ
                </td>
            </tr>
            <tr>
                <td>Phí vận chuyển</td>
                <td style="text-align: center">VND</td>
                <td style="text-align: right">35,000 vnđ</td>
            </tr>
            <tr style="color: chocolate; font-weight: bold">
                <td>Tổng Cộng: </td>
                <td style="text-align: center">VND</td>
                <td style="text-align: right">
                    <?php
                    $tong = $total + 35000;
                    echo number_format($tong, 0, '.', '.')
                    ?>
                    vnđ
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>
                    Hình thức vận chuyển
                </td>
                <td colspan="2" style="text-align: right">
                    Giao hàng tiêu chuẩn
                </td>
            </tr>
            <tr>
                <td>Hình thức thanh toán</td>
                <td style="text-align: right" colspan="2">
                    <?php
                    if ($_POST['method'] == 1){
                        echo "Thanh toán khi nhận hàng";
                    }
                    else{
                        echo "Thanh toán trực tuyến";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <?php endif; ?>
    </table>
</div>

