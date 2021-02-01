<?php
require_once 'helpers/Helper.php';
?>
    <h2>Danh sách đơn hàng</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Tên người đặt</th>
<!--            <th>Địa chỉ</th>-->
<!--            <th>Số điện thoại</th>-->
<!--            <th>Email</th>-->
<!--            <th>Ghi chú</th>-->
            <th>Tổng Tiền</th>
            <th>Trạng thái</th>
            <th>Ngày đặt hàng</th>
            <th>Ngày Cập Nhật</th>
            <th></th>
        </tr>
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['id'] ?></td>
                    <td><?php echo $order['fullname'] ?></td>
<!--                    <td>--><?php //echo $order['address'] ?><!--</td>-->
<!--                    <td>--><?php //echo $order['mobile'] ?><!--</td>-->
<!--                    <td>--><?php //echo $order['email'] ?><!--</td>-->
<!--                    <td>--><?php //echo $order['note'] ?><!--</td>-->
                    <td><?php echo number_format($order['price_total']) ?></td>
                    <td>
                        <?php
                        $status_text = 'Đã Thanh Toán';
                        if ($order['payment_status'] == 0) {
                            $status_text = 'Chưa Thanh Toán';
                        }
                        echo $status_text;
                        ?>
                    </td>
                    <td><?php echo date('d-m-Y H:i:s', strtotime($order['created_at'])) ?></td>
                    <td>
                        <?php
                        if (!empty($order['updated_at'])) {
                            echo date('d-m-Y H:i:s', strtotime($order['updated_at']));
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $url_detail = "index.php?controller=order&action=detail&id=" . $order['id'];
                        $url_update = "index.php?controller=order&action=update&id=" . $order['id'];
//                        $url_delete = "index.php?controller=order&action=delete&id=" . $order['id'];
                        ?>
                        <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                        <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a>
<!--                        <a title="Xóa" href="--><?php //echo $url_delete ?><!--" onclick="return confirm('Are you sure delete?')"><i-->
<!--                                class="fa fa-trash"></i></a>-->
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="9">Không có bản ghi</td>
            </tr>
        <?php endif; ?>
    </table>
<?php echo $pages; ?>