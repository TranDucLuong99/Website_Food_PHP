<?php
require_once 'helpers/Helper.php';

?>
    <form method="GET" action="">
        <div class="form-group">
            <label for="username">Nhập Tên Tin Tức</label>
            <input type="text" name="title" id="title"
                   value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" class="form-control"/>
            <input type="hidden" name="controller" value="new"/>
            <input type="hidden" name="action" value="index"/>
        </div>
        <div class="form-group">
            <input type="submit" value="Tìm kiếm" name="search" class="btn btn-primary"/>
            <a href="index.php?controller=new" class="btn btn-default">Trở lại</a>
        </div>
    </form>
    <h2>Danh sách tin tức</h2>
    <a href="index.php?controller=new&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Tên tin tức</th>
            <th>Mô tả ngắn</th>
            <th>Ảnh tin tức</th>
<!--            <th>Nội dung</th>-->
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
<!--            <th>Ngày cập nhật</th>-->
            <th></th>
        </tr>
        <?php if (!empty($news)): ?>
            <?php foreach ($news as $new): ?>
                <tr>
                    <td><?php echo $new['id'] ?></td>
                    <td><?php echo $new['category_name'] ?></td>
                    <td><?php echo $new['title'] ?></td>
                    <td><?php echo $new['summary'] ?></td>
                    <td>
                        <?php if (!empty($new['avatar'])): ?>
                            <img height="80" src="assets/uploads/<?php echo $new['avatar'] ?>"/>
                        <?php endif; ?>
                    </td>
<!--                    <td>--><?php //echo $new['content'] ?><!--</td>-->
                    <td><?php echo Helper::getStatusText($new['status']) ?></td>
                    <td><?php echo date('d-m-Y H:i:s', strtotime($new['created_at'])) ?></td>
<!--                    <td>--><?php //echo !empty($new['updated_at']) ? date('d-m-Y H:i:s', strtotime($new['updated_at'])) : '--' ?><!--</td>-->
                    <td>
                        <?php
                        $url_detail = "index.php?controller=new&action=detail&id=" . $new['id'];
                        $url_update = "index.php?controller=new&action=update&id=" . $new['id'];
                        $url_delete = "index.php?controller=new&action=delete&id=" . $new['id'];
                        ?>
                        <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                        <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                        <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn có chắc chắn xóa')"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="9">Không có bản ghi nào</td>
            </tr>
        <?php endif; ?>
    </table>
<?php echo $pages; ?>

<?php

