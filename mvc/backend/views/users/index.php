<?php
require_once 'helpers/Helper.php';
?>
<form method="GET" action="">
    <div class="form-group">
        <label for="username">Nhập tên</label>
        <input type="text" name="username" id="username"
               value="<?php echo isset($_GET['username']) ? $_GET['username'] : '' ?>" class="form-control"/>
        <input type="hidden" name="controller" value="user"/>
        <input type="hidden" name="action" value="index"/>
    </div>
    <div class="form-group">
        <input type="submit" value="Tìm kiếm" name="search" class="btn btn-primary"/>
        <a href="index.php?controller=user" class="btn btn-default">Trở lại</a>
    </div>
</form>
<h2>Danh Sách Người Dùng</h2>
<?php if ($_SESSION['user']['role']==3): ?>
<a href="index.php?controller=user&action=create" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<?php endif; ?>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên đăng nhập</th>
        <th>Tên chính</th>
        <th>Họ</th>
        <th>Địa chỉ email</th>
        <th>Ảnh đại diện</th>
        <th>Vai trò</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th></th>
    </tr>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td>
                    <?php if (!empty($user['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php
                    switch ($user['role']){
                        case 0:
                            echo "Member";
                            break;
                        case 1:
                            echo "Admin";
                            break;
                        case 2:
                            echo "Supper Admin";
                            break;
                    }
                    ?>
                </td>
                <td><?php
                    switch ($user['status']){
                        case 0:
                            echo "Disabled";
                            break;
                        case 1:
                            echo "Active";
                            break;
                    }
                    ?>
                </td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=user&action=detail&id=" . $user['id'];
                    $url_update = "index.php?controller=user&action=update&id=" . $user['id'];
                    $url_delete = "index.php?controller=user&action=delete&id=" . $user['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a>
                    <?php if ($_SESSION['user']['role'] == 2) : ?>
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
</table>
<?php echo $pages; ?>