<!--<div class="container" style="max-width: 500px">-->
<!--    <form method="post" action="">-->
<!--        <h2 style="text-align: center">Login</h2>-->
<!--        <div style="background: red; height: 2px; width: 48px; margin: 0px auto"></div>-->
<!--        <div class="form-group">-->
<!--            <label for="username">Username</label>-->
<!--            <input type="text" name="username" value="" id="username" class="form-control"/>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="password">Password</label>-->
<!--            <input type="password" name="password" value="" id="password" class="form-control"/>-->
<!--        </div>-->
<!--        <div class="form-group" style="text-align: center">-->
<!--            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"/>-->
<!--            <p>-->
<!--                Chưa có tài khoản, <a href="index.php?controller=login&action=register">Đăng ký</a> ngay-->
<!--            </p>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->


<?php
require_once 'helpers/Helper.php';
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,body{
            /*background-image: url('https://lamtho.vn/resources/2018/12/Cach-trong-rau-huu-co-1.jpg');*/
            background-image: url('https://cdn.pixabay.com/photo/2014/11/12/21/18/strawberries-528791_960_720.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .container{
            height: 100%;
            align-content: center;
        }

        .card{
            height: 370px;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0,0,0,0.5) !important;
        }

        .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        .social_icon span:hover{
            color: white;
            cursor: pointer;
        }

        .card-header h3{
            color: white;
        }

        .social_icon{
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: #FFC312;
            color: black;
            border:0 !important;
        }
        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
        }

        /*.remember{*/
            /*color: white;*/
        /*}*/

        .remember input
        {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn{
            color: black;
            background-color: #FFC312;
            width: 100px;
        }

        .login_btn:hover{
            color: black;
            background-color: white;
        }

        .links{
            color: white;
        }

        .links a{
            margin-left: 4px;
        }
        .justify-content-center {
            margin-top: 100px;
            -ms-flex-pack: center!important;
            justify-content: center!important;
        }
    </style>
    <!--    <link rel="stylesheet" type="text/css" href="styles.css">-->
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Đăng Nhập</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user" style="font-size: 16px;"></i></span>
                        </div>
                        <input type="text" name="username"  id="username" class="form-control" placeholder="Nhập Tên" style="height: 48px;font-size: 16px;">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"style="font-size: 16px;" ></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mật Khẩu" style="height: 48px;font-size: 16px;">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Đăng nhập" class="btn float-right login_btn" style="height: 48px;font-size: 16px;">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    <span style="font-size: 14px">Chưa có tài khoản<a href="index.php?controller=login&action=register">Đăng ký </a> ngay</span>
                </div>
                <!--                <div class="d-flex justify-content-center">-->
                <!--                    <a href="#">Forgot your password?</a>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
</div>
</body>
</html>
