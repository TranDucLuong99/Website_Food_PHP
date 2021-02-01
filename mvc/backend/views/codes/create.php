<h2>Thêm mới code</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên Code</label>
        <input type="text" name="code_name" value="<?php echo isset($_POST['code_name']) ? $_POST['code_name'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Mã Code</label>
        <input type="text" name="code_title" value="<?php echo isset($_POST['code_title']) ? $_POST['code_title'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Giảm giá</label>
        <input type="text" name="discount" value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Ngày bắt đầu</label>
        <input type="date" name="start_day" value="<?php echo isset($_POST['start_day']) ? $_POST['start_day'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Ngày hết hạn</label>
        <input type="date" name="expiration_day" value="<?php echo isset($_POST['expiration_day']) ? $_POST['expiration_day'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <?php
        $selected_active = '';
        $selected_disabled = '';
        if (isset($_POST['status'])) {
            switch ($_POST['status']) {
                case 0:
                    $selected_disabled = 'selected';
                    break;
                case 1:
                    $selected_active = 'selected';
                    break;
            }
        }
        ?>
        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="0" <?php echo $selected_disabled ?> >Active</option>
            <option value="1" <?php echo $selected_active ?> >Disabled</option>
        </select>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>