

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Ký</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style_register.css">
</head>
<body>
<div class="main">

    <section class="signup">
<!--         <img src="assets/images/signup-bg.jpg" alt="">-->
        <div class="container" style="max-width: 500px">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form">
                    <h2 class="form-title">Đăng Ký Tài Khoản</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="username" id="username" placeholder="Tên đăng nhập"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="first-name" id="first-name" placeholder="Tên của bạn"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="last-name" id="last-name" placeholder="Họ của bạn"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Mật khẩu"/>
                        <span toggle="password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password_confirm" id="password_confirm" placeholder="Nhập lại mật khẩu"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Nhập email"/>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />-->
<!--                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>-->
<!--                    </div>-->
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Đăng Ký"/>
                    </div>
                </form>
                <p class="loginhere">
                    Bạn đã có tài khoản <a href="index.php?controller=login&action=login" class="loginhere-link">Đăng nhập</a> ngay
                </p>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
