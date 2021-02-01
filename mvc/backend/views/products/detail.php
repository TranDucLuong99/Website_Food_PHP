<?php
require_once 'helpers/Helper.php';
?>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $product['id']?></td>
    </tr>
    <tr>
        <th>Tên danh mục</th>
        <td><?php echo $product['category_name']?></td>
    </tr>
    <tr>
        <th>Tên sản phẩm</th>
        <td><?php echo $product['title']?></td>
    </tr>
    <tr>
        <th>Ảnh đại diện</th>
        <td>
            <?php if (!empty($product['avatar'])): ?>
                <img height="80" src="assets/uploads/<?php echo $product['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Giá</th>
        <td><?php echo number_format($product['price']) ?></td>
    </tr>
    <tr>
        <th>Giá Cũ</th>
        <td><?php echo number_format($product['new_price']) ?></td>
    </tr>
    <tr>
        <th>Giảm giá</th>
        <td><?php echo ($product['discount']) ?></td>
    </tr>
    <tr>
        <th>Seo Title</th>
        <td><?php echo $product['seo_title'] ?></td>
    </tr>
    <tr>
        <th>Seo description</th>
        <td><?php echo $product['seo_description'] ?></td>
    </tr>
    <tr>
        <th>Seo keywords</th>
        <td><?php echo $product['seo_keywords'] ?></td>
    </tr>
    <tr>
        <th>Trạng thái</th>
        <td><?php echo Helper::getStatusText($product['status']) ?></td>
    </tr>
    <tr>
        <th>Ngày tạo</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Ngày sửa</th>
        <td><?php echo !empty($product['updated_at']) ? date('d-m-Y H:i:s', strtotime($product['updated_at'])) : '--' ?></td>
    </tr>
</table>
<a href="index.php?controller=product&action=index" class="btn btn-default">Trở lại</a>