<?php
require_once 'helpers/Helper.php';
?>
<section class="breadcrumb-section set-bg" data-setbg="assets/images/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Liên Hệ</h2>
                    <div class="breadcrumb__option">
                        <a href="trang-chu.html">Trang Chủ</a>
                        <span>Liên Hệ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                    <h4>Số điện thoại</h4>
                    <p>+84 32 701 8797</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">

                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <h4>Địa chỉ</h4>
                    <p>141 Đường Chiến Thắng - Hà Đông - Hà Nội</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <i class="fas fa-clock"></i>
                    <h4>Giờ mở cửa</h4>
                    <p>7:00 am to 23:00 pm</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <h4>Địa chỉ Email</h4>
                    <p>Tranducluong8899@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.294809518515!2d105.79403981396506!3d20.980816394791365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc508f938fd%3A0x883e474806a2d1f2!2sAcademy%20of%20Cryptography%20Techniques!5e0!3m2!1sen!2s!4v1599743003171!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="fa fa-map-pin" aria-hidden="true"></i>
        <div class="inside-widget">
            <h4>Hà Nội</h4>
            <ul>
                <li>Phone: +84 032 701 8797</li>
                <li>Add: 141 Đường Chiến Thắng - Hà Đông - Hà Nội</li>
            </ul>
        </div>
    </div>
</div>

<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Phản Hồi</h2>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="title" placeholder="Tên của bạn">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="emails" placeholder="Email của bạn">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea  name="content" placeholder="Phản hồi của bạn"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Gửi Phản Hồi" style="color: whitesmoke; font-weight: bold">
            </div>
        </form>
    </div>
</div>