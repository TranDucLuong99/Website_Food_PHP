<?php
require_once 'helpers/Helper.php';
?>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $new['id']?></td>
    </tr>
    <tr>
        <th>Tên danh mục</th>
        <td><?php echo $new['category_id']?></td>
    </tr>
    <tr>
        <th>Tên tin tức</th>
        <td><?php echo $new['title']?></td>
    </tr>
    <tr>
        <th>Mô tả ngắn</th>
        <td><?php echo $new['summary']?></td>
    </tr>
    <tr>
        <th>Ảnh đại diện</th>
        <td>
            <?php if (!empty($new['avatar'])): ?>
                <img height="80" src="assets/uploads/<?php echo $new['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Nội dung tin tức</th>
        <td><?php echo $new['content']?></td>
    </tr>
    <tr>
        <th>Seo Title</th>
        <td><?php echo $new['seo_title'] ?></td>
    </tr>
    <tr>
        <th>Seo description</th>
        <td><?php echo $new['seo_description'] ?></td>
    </tr>
    <tr>
        <th>Seo keywords</th>
        <td><?php echo $new['seo_keywords'] ?></td>
    </tr>
    <tr>
        <th>Trạng thái</th>
        <td><?php echo Helper::getStatusText($new['status']) ?></td>
    </tr>
    <tr>
        <th>Ngày tạo</th>
        <td><?php echo date('d-m-Y', strtotime($new['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Ngày sửa</th>
        <td><?php echo !empty($new['updated_at']) ? date('d-m-Y', strtotime($new['updated_at'])) : '--' ?></td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=new">Back</a>