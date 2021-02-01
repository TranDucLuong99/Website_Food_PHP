<?php
require_once 'helpers/Helper.php';
?>
<h2>Chi Tiết Người Dùng</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $user['id'] ?></td>
    </tr>
    <tr>
        <th>Tên đăng nhập</th>
        <td><?php echo $user['username'] ?></td>
    </tr>
    <tr>
        <th>Tên chính</th>
        <td><?php echo $user['first_name'] ?></td>
    </tr>
    <tr>
        <th>Họ</th>
        <td><?php echo $user['last_name'] ?></td>
    </tr>
    <tr>
        <th>Số điện thoại</th>
        <td><?php echo $user['phone'] ?></td>
    </tr>
    <tr>
        <th>Địa chỉ</th>
        <td><?php echo $user['address'] ?></td>
    </tr>
    <tr>
        <th>Địa chỉ Email</th>
        <td><?php echo $user['email'] ?></td>
    </tr>
    <tr>
        <th>Ảnh đại diện</th>
        <td>
            <?php if (!empty($user['avatar'])): ?>
                <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Nghề nghiệp</th>
        <td><?php echo $user['jobs'] ?></td>
    </tr>
    <tr>
        <th>Đăng nhập lần cuối</th>
        <td><?php echo !empty($user['last_login']) ? date('d-m-Y H:i:s', strtotime($user['last_login'])) : '' ?></td>
    </tr>
    <tr>
        <th>Trạng thái</th>
        <td><?php echo Helper::getStatusText($user['status']); ?></td>
    </tr>
    <tr>
        <th>Vai trò</th>
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
            ?></td>
    </tr>
    <tr>
        <th>Ngày tạo</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Ngày sửa</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['updated_at'])) ?></td>
    </tr>
</table>
<a href="index.php?controller=user&action=index" class="btn btn-default">Trở lại</a>