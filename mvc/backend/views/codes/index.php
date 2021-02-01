<?php
require_once 'helpers/Helper.php';
?>
<h1>Tìm kiếm</h1>
<form action="" method="get">
    <input type="hidden" name="controller" value="code"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label>Nhập tên code</label>
        <input type="text" name="name" value="<?php echo isset($_GET['code_name']) ? $_GET['code_name'] : '' ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success"/>
        <a href="index.php?controller=code" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách code</h1>
<a href="index.php?controller=code&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên code</th>
        <th>Mã code</th>
        <th>Giảm giá</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th></th>
    </tr>
    <?php if (!empty($codes)): ?>
        <?php foreach ($codes as $codes): ?>
            <tr>
                <td>
                    <?php echo $codes['id']; ?>
                </td>
                <td>
                    <?php echo $codes['code_name']; ?>
                </td>
                <td>
                    <?php echo $codes['code_title']; ?>
                </td>
                <td>
                    <?php echo $codes['discount']; ?>
                </td>
                <td>
                    <?php echo $codes['start_day']; ?>
                </td>
                <td>
                    <?php echo $codes['expiration_day']; ?>
                </td>
                <td>
                    <?php
                    $status_text = 'Active';
                    if ($codes['status'] == 1) {
                        $status_text = 'Disabled';
                    }
                    echo $status_text;
                    ?>
                </td>
                <td>
                    <?php echo date('d-m-Y H:i:s', strtotime($codes['created_at'])); ?>
                </td>
                <td>
                    <?php
                    if (!empty($codes['updated_at'])) {
                        echo date('d-m-Y H:i:s', strtotime($codes['updated_at']));
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?controller=code&action=detail&id=<?php echo $codes['id'] ?>"
                       title="Chi tiết">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="index.php?controller=code&action=update&id=<?php echo $codes['id'] ?>" title="Sửa">
                        <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a href="index.php?controller=code&action=delete&id=<?php echo $codes['id'] ?>" title="Xóa"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>


    <?php else: ?>
        <tr>
            <td colspan="7">Không có bản ghi nào</td>
        </tr>
    <?php endif; ?>
</table>
<?php echo $pages; ?>