<?php
$year = '';
$username = '';
$jobs = '';
$avatar = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    $jobs = $_SESSION['user']['jobs'];
    $avatar = $_SESSION['user']['avatar'];
    $year = date('Y', strtotime($_SESSION['user']['created_at']));
}

?>
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">

        <span class="logo-mini"><b>LL</b>F</span>

        <span class="logo-lg"><b>LeoLeo</b>Food</span>
    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <i class="fa fa-bars"></i>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/uploads/<?php echo $avatar; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $username; ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="user-header">
                            <img src="assets/uploads/<?php echo $avatar; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $username . ' - ' . $jobs; ?>

                                <small>Thành viên từ năm <?php echo $year; ?></small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Chi tiết</a>
                            </div>
                            <div class="pull-right">
                                <a href="index.php?controller=user&action=logout" class="btn btn-default btn-flat">Đăng
                                    xuất</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/uploads/<?php echo $avatar; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $username; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Quản Trị Viên</li>

            <li>
                <a href="index.php?controller=category&action=index">
                    <i class="fa fa-th"></i> <span>Quản lý danh mục</span>
                    <span class="pull-right-container">

            </span>
                </a>
            </li>
            <li>
                <a href="index.php?controller=product&action=index">
                    <i class="fa fa-code"></i> <span>Quản lý sản phẩm</span>
                    <span class="pull-right-container">

            </span>
                </a>
            </li>

            <li>
                <a href="index.php?controller=code&action=index">
                    <i class="fa fa-code" aria-hidden="true"></i> <span>Quản lý mã khuyến mãi</span>
                    <span class="pull-right-container">

            </span>
                </a>
            </li>

            <li>
                <a href="index.php?controller=new&action=index">
                    <i class="fa fa-code" aria-hidden="true"></i> <span>Quản lý tin tức</span>
                    <span class="pull-right-container">

            </span>
                </a>
            </li>
            <li>
                <a href="index.php?controller=order&action=index">
                    <i class="fa fa-code"></i><span>Quản lý đơn hàng</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li>
                <a href="index.php?controller=user&action=index">
                    <i class="fa fa-user"></i> <span>Quản lý người dùng</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>

            <li>
                <a href="index.php?controller=statistical&action=index">
                    <i class="fa fa-building" aria-hidden="true"></i><span>Thống kê</span>
                    <span class="pull-right-container">
                    </span>

                </a>
            </li>
        </ul>
    </section>

</aside>


<div class="breadcrumb-wrap content-wrap content-wrapper">

    <section class="content-header">
        <h1>
            Bảng điều khiển
            <small>Điều khiển</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Bảng điều khiển</li>
        </ol>
    </section>
</div>


<div class="message-wrap content-wrap content-wrapper">

    <section class="content-header">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php
                echo $this->error;
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>

    </section>
</div>