<?php
require_once 'helpers/Helper.php';
?>
<h1>Chi tiết code</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $codes['id']; ?></td>
    </tr>
    <tr>
        <th>Tên code</th>
        <td><?php echo $codes['code_name']; ?></td>
    </tr>

    <tr>
        <th>Mã code</th>
        <td><?php echo $codes['code_title']; ?></td>
    </tr>
    <tr>
        <th>Giảm giá (%)</th>
        <td><?php echo $codes['discount']; ?></td>
    </tr>
    <tr>
        <th>Ngày bắt đầu</th>
        <td><?php echo $codes['start_day']; ?></td>
    </tr>
    <tr>
        <th>Ngày hết hạn</th>
        <td><?php echo $codes['expiration_day']; ?></td>
    </tr>
    <tr>
        <th>Trạng thái</th>
        <td>
            <?php
            $status_text = 'Active';
            if ($codes['status'] == 0) {
                $status_text = 'Disabled';
            }
            echo $status_text;
            ?>
        </td>
    </tr>
    <tr>
        <th>Ngày tạo</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($codes['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <th>Ngày cập nhật</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($codes['updated_at'])); ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=code">Back</a>
