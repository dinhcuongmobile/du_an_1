<?php 
ob_start();
session_start();
include "../../model/pdo.php";
include "../../model/sanpham.php";
include "../../model/taikhoan.php";
include "../../model/donhang.php";
$listgh=load_all_giohang($_SESSION['user']['id']);
$tongthanhtoan=0;
foreach ($listgh as $gh) {
    $tongthanhtoan+=$gh['thanhtien'];
} 
?>


<style>
    /* Reset some default styles */
body,
h1,
h2,
h3,
p,
ul,
li {
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 16px;
  line-height: 1.6;
  color: #333;
}
.btn{
    width: 100%;
}
.container {
  width: 80%;
  margin: 0 auto;
}

/* Header styles */
.header {
  background-color: #333;
  color: #fff;
  padding: 10px 0;
}

.header h1 {
  font-size: 24px;
}

/* Main content styles */
.cart-area {
  padding-top: 100px;
  padding-bottom: 100px;
}

.table-responsive {
  margin-top: 20px;
}

/* Form styles */
.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

.form-control {
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
}

/* Button styles */
.btn {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  border: 1px solid #333;
  background-color: #333;
  color: #fff;
}

.btn:hover {
  background-color: #555;
  border-color: #555;
}

/* Footer styles */
.footer {
  margin-top: 40px;
  padding: 20px 0;
  background-color: #333;
  color: #fff;
  text-align: center;
}

/* Responsive styles */
@media (max-width: 768px) {
  .container {
    width: 100%;
  }
}

</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="assets/jquery-1.11.3.min.js"></script>
    </head>

    <body>
    <?php require_once("config.php"); ?>  
    <div class="cart-area pt-100 pb-100">           
        <div class="container">
            <h3>Tạo mới đơn hàng</h3>
            <div class="table-responsive">
                <form action="vnpay_create_payment.php" id="frmCreateOrder" method="post">       
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" name="amount" type="number" value="<?= $tongthanhtoan?>" onkeydown="return false"/>
                    </div>
                     <h4>Phương thức thanh toán</h4>
                    <div class="form-group">
                        <h5>Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                       <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                       <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
                    </div>
                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                         <input type="radio" id="language" Checked="True" name="language" value="vn">
                         <label for="language">Tiếng việt</label><br>
                         <input type="radio" id="language" name="language" value="en">
                         <label for="language">Tiếng anh</label><br>                       
                    </div>
                    <button type="submit" class="btn btn-default" href>Thanh toán</button>
                </form>
            </div>
            <p>
                &nbsp;
            </p>
            
        </div> 
    </div> 
    </body>
</html>
