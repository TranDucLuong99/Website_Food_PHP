<?php
//SELECT product_id, MAX(SL) FROM (SELECT product_id, SUM(quantity) AS SL FROM order_details GROUP BY product_id) AS A
//SELECT product_id, SUM(quantity) FROM order_details GROUP BY product_id
//SELECT *, SUM(quantity) FROM products INNER JOIN order_details ON products.id = order_details.product_id GROUP BY order_details.product_id
require_once 'helpers/Helper.php';
//echo "<pre>";
//print_r($getproducts);
//echo "</pre>";
?>
<h2>Thống Kê Tình Hình Kinh Doanh Tháng 10</h2>
<table class="table table-bordered">
    <tr>
        <th>Số đơn hàng đã bán</th>
        <th>Tổng số sản phẩm bán được</th>
        <th>Tổng số tiền bán được</th>
    </tr>
    <tr>
        <td><?php echo $countOrder['tinh']?> Đơn Hàng</td>
        <td><?php echo $countQuantity['tinh']?> Sản Phẩm</td>
        <td><?php echo number_format($countPriceTotal['tinh'])?> VNĐ</td>
    </tr>
</table>
    <h2>Danh sách các sản phẩm đã bán được</h2>
    <table class="table table-bordered">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng sản phẩm bán được</th>
            <th>Số sản phẩm tồn Kho</th>
        </tr>
        <?php if (!empty($getproducts)): ?>
        <?php foreach ($getproducts AS $product):
        ?>
        <tr >
            <td><?php echo $product['title'] ?></td>
            <td><?php echo $product['tong'] ?></td>
            <td><?php echo 100-$product['tong'] ?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>




