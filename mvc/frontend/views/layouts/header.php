<?php
?>
<style>
    /*@-webkit-keyframes my {*/
        /*0% { color: #F8CD0A; }*/
        /*50% { color: #fff; }*/
        /*100% { color: #F8CD0A; }*/
    /*}*/
    /*@-moz-keyframes my {*/
        /*0% { color: #F8CD0A; }*/
        /*50% { color: #fff; }*/
        /*100% { color: #F8CD0A; }*/
    /*}*/
    /*@-o-keyframes my {*/
        /*0% { color: #F8CD0A; }*/
        /*50% { color: #fff; }*/
        /*100% { color: #F8CD0A; }*/
    /*}*/
    @keyframes my {
        0% { color: black; }
        50% { color: #fff; }
        100% { color: #7fad39; }
    }
    .fa-phone:before {
        color: white;
        content: "\f095";
    }
    .test {
        /*background:#3d3d3d;*/
        font-size:24px;
        font-weight:bold;
        -webkit-animation: my 1000ms infinite;
        -moz-animation: my 1000ms infinite;
        -o-animation: my 1000ms infinite;
        animation: my 1000ms infinite;
    }
</style>
<div id="preloder">
    <div class="loader"></div>
</div>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <marquee><b class="test">Siêu Sale 24/10, Nhanh tay Nhanh tay</b></marquee>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <?php if (!isset($_SESSION['user'])) : ?>
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/Gnoul.tran99"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.instagram.com/td_gnoul_88"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="header__top__right__auth">
                           <ul style="list-style-type: none">
                               <li>
                                   <ul style="list-style-type: none">
                                       <li> <a href="../backend/index.php?controller=login&action=login"><i class="fa fa-user"></i> Đăng Nhập</a></li>
                                       <li> <a href="../backend/index.php?controller=login&action=register"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng Ký</a></li>
                                   </ul>
                               </li>
                           </ul>

                        </div>
                        <?php else :?>
                            <?php if ($_SESSION['user']['role'] >1 ) :?>
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/Gnoul.tran99"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.instagram.com/td_gnoul_88"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <ul style="list-style-type: none">
                                    <li>
                                        <ul style="list-style-type: none">
                                            <li><a href="../backend/index.php?controller=product"><i class="fa fa-paper-plane" aria-hidden="true"></i>Vào Admin </a></li>
                                            <li><a href="../backend/index.php?controller=user&action=logout"><i class="fa fa-paper-plane" aria-hidden="true"></i>Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <?php elseif ($_SESSION['user']['role'] == '') :?>
                            <div class="header__top__right__social" style="    top: 8px;">
                                <a href="https://www.facebook.com/Gnoul.tran99"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.instagram.com/td_gnoul_88"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <ul style="list-style-type: none">
                                    <li>
                                        <ul style="list-style-type: none">
                                            <li><?php echo 'Xin Chào ' .$_SESSION['user']['username']?></li>
                                            <li><a href="../backend/index.php?controller=user&action=logout"><i class="fa fa-paper-plane" aria-hidden="true"></i>Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="trang-chu.html"><img src="assets/images/logoleoloe.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="trang-chu.html">Trang chủ</a></li>
                        <li><a href="cua-hang.html">Cửa hàng</a></li>
                        <li><a href="gio-hang-cua-ban.html">Giỏ Hàng</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="gio-hang-cua-ban.html">Giỏ Hàng</a></li>
                                <li><a href="thanh-toan.html">Thanh Toán</a></li>
                            </ul>
                        </li>
                        <li><a href="tin-tuc.html">Tin tức</a></li>
                        <li><a href="lien-he.html">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li> <b>Giỏ Hàng: </b>
                            <a href="gio-hang-cua-ban.html"><i class="fa fa-shopping-bag"></i>
                                <?php
                                    $cart_total = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] AS $cart) {
                                            $cart_total += $cart['quantity'];
                                        }
                                    }
                                ?>
                                <span>
                                    <?php echo $cart_total; ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

