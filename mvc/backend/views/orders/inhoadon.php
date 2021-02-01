
<?php
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
?>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tohoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 21cm;
        overflow:hidden;
        min-height:297mm;
        padding: 2.5cm;
        margin-left:auto;
        margin-right:auto;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
    }
    @page {
        size: A4;
        margin: 0;
    }
    button {
        width:100px;
        height: 24px;
    }
    .header {
        overflow:hidden;
    }
    .logo {
        background-color:#FFFFFF;
        text-align:left;
        float:left;
    }
    .company {
        padding-top:24px;
        text-transform:uppercase;
        background-color:#FFFFFF;
        text-align:right;
        float:right;
        font-size:16px;
    }
    .title {
        text-align:center;
        position:relative;
        color:#0000FF;
        font-size: 24px;
        top:1px;
    }
    .footer-left {
        text-align:center;
        text-transform:uppercase;
        padding-top:24px;
        position:relative;
        height: 150px;
        width:50%;
        color:#000;
        float:left;
        font-size: 12px;
        bottom:1px;
    }
    .footer-right {
        text-align:center;
        text-transform:uppercase;
        padding-top:24px;
        position:relative;
        height: 150px;
        width:50%;
        color:#000;
        font-size: 12px;
        float:right;
        bottom:1px;
    }
    .TableData {
        background:#ffffff;
        font: 11px;
        width:100%;
        border-collapse:collapse;
        font-family:Verdana, Arial, Helvetica, sans-serif;
        font-size:12px;
        border:thin solid #d3d3d3;
    }
    .TableData TH {
        background: rgba(0,0,255,0.1);
        text-align: center;
        font-weight: bold;
        color: #000;
        border: solid 1px #ccc;
        height: 24px;
    }
    .TableData TR {
        height: 24px;
        border:thin solid #d3d3d3;
    }
    .TableData TR TD {
        padding-right: 2px;
        padding-left: 2px;
        border:thin solid #d3d3d3;
    }
    .TableData TR:hover {
        background: rgba(0,0,0,0.05);
    }
    .TableData .cotSTT {
        text-align:center;
        width: 10%;
    }
    .TableData .cotTenSanPham {
        text-align:left;
        width: 40%;
    }
    .TableData .cotHangSanXuat {
        text-align:left;
        width: 20%;
    }
    .TableData .cotGia {
        text-align:right;
        width: 120px;
    }
    .TableData .cotSoLuong {
        text-align: center;
        width: 50px;
    }
    .TableData .cotSo {
        text-align: right;
        width: 120px;
    }
    .TableData .tong {
        text-align: right;
        font-weight:bold;
        text-transform:uppercase;
        padding-right: 4px;
    }
    .TableData .cotSoLuong input {
        text-align: center;
    }
    @media print {
        @page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="assets/images/logoleoloe.png"/></div>
        <div class="company">Thực Phẩm LeoLeo Food</div>
    </div>
    <br/>
    <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
    </div>
    <br/>
    <br/>
    <table class="TableData" style="margin-bottom: 32px; text-align: center">
        <tr>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ giao hàng</th>
        </tr>
        <?php foreach ($_SESSION['order'] as $value):?>
        <tr>
            <td><?php echo $value[0]['fullname'] ?></td>
            <td> <?php echo $value[0]['mobile'] ?></td>
            <td><?php echo $value[0]['address'] ?></td>
        </tr>
        <?php endforeach;?>
    </table>
    <table class="TableData" cellpadding="8px">

        <tr>
            <th>Sản Phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php $total = 0; ?>
        <?php foreach ($_SESSION['order'] as $value):?>
        <?php foreach ($value as $values):?>
        <tr style="text-align: center">
            <td><?php echo $values['title'] ?></td>
            <td><?php echo $values['price'] ?></td>
            <td><?php echo $values['quantity'] ?></td>
            <td>
                <?php
                $price_total = $values['price'] * $values['quantity'];
                $total += $price_total;
                ?>
                <?php echo number_format($price_total, 0, '.', '.') ?> vnđ
            </td>
        </tr>
        <?php endforeach;?>
        <?php endforeach;?>
        <tr>
            <td colspan="2">Giao hàng tiêu chuẩn</td>
            <td style="text-align: center">35,000 vnđ</td>
            <td style="text-align: right">Thanh toán khi nhận hàng</td>
        </tr>
        <tr>
            <td colspan="3" class="tong" style="text-align: left">Tổng cộng</td>
            <td style="text-align: right; font-weight: bold"> <?php echo number_format($total + 35000, 0, '.', '.') ?> vnđ</td>
        </tr>
    </table>
    <div class="footer-left"><br/>
        Khách hàng </div>
    <div class="footer-right"> Hà Nội, Ngày 24 Tháng 10 Năm 2020<br/>
        Nhân viên <br>
    Trần Đức Lương</div>
</div>
</body>