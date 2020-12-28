<?php
session_start();
include 'connect.php';
error_reporting(0);
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
$meQty = 0;
foreach($_SESSION['qty'] as $meItem){
$meQty = $meQty + $meItem;
}
}else{
$meQty=0;
}
$userid = $_SESSION['id'];
$role = $_SESSION['role_id'];

$sql = "SELECT * FROM products WHERE id order by id limit 4";
$resultp = $conn->query($sql); 

$sql2 = "SELECT * FROM products WHERE id order by id limit 2";
$result2 = $conn->query($sql2); 
?>
<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>shop2hands</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/thenewcart/assets/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/thenewcart/assets/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/thenewcart/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/thenewcart/assets/style.css">
    <link rel="stylesheet" href="/thenewcart/assets/css/responsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.min.css">

  </head>
  
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a><i class="fa fa-user"></i> สวัสดี, คุณ <?php echo $_SESSION['fname']; ?></a></li>
                            <?php if(empty($_SESSION['id'])) : ?>
                            <li><a href="/thenewcart/config/signin"><i class="fa fa-user"></i> Login</a></li>
                            <?php endif; ?>  
                            <?php if($role==1) : ?>
                            <li><a class="nav-link" href="/thenewcart/dbadmin/dashboard">ตั้งค่าระบบ</a></li>
                            <?php endif; ?>  
                            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
                            <li><a href="/thenewcart/config/logout"><i class="fa fa-user"></i> Logout</a></li>
                            <?php endif; ?>  
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    <div class="site-branding-area" >
        <div class="container" >
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="/thenewcart/"><img src="/thenewcart/assets/img/logo.png" width=50%></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="/thenewcart/carts/cart">ตระกร้า <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $meQty; ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
 

    <!-- ชื่อบนหัวเว็บไซต์ -->
    <title>ฝากขายสินค้ามือสองออนไลน์</title>

    <!-- ใส่ไอคอนบนหัวเว็บ -->
    <link rel="icon" href="/thenewcart/assets/img/logo.ico" type="image">
    <link rel="shortcut icon" href="/thenewcart/assets/img/logo.ico" type="image">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thenewcart/style.css" />
        <!-- ใส่รูปภาพบนหัวหน้าเว็บ -->
        
    </head>

        <!-- ทำเมนูดรอปดาว -->
        <div class="nav">
            <ul>
                <li class="home"><a href="/thenewcart">หน้าแรก</a></li>
                
                <li class="category"><a>หมวดหมู่สินค้า</a>
                    <ul>
                        <li><a href="#">เสื้อผ้า</a></li>
                        <li><a href="#">ไอที</a></li>
                        
                    </ul>
                </li>

                <li class="create"><a href="/thenewcart/dbadmin/dashboard/view/product">ฝากขายสินค้า</a></li>

                <li class="reg"><a>สมัครสมาชิก/เข้าสู่ระบบ</a>
                    <ul>
                        <li><a href="/thenewcart/config/registor">สมัครสมาชิก</a></li>
                        <li><a href="/thenewcart/config/signin">เข้าสู่ระบบ</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <br>
        <br>
        <br>
            </div>
        </div>
    </div> <!-- End mainmenu area -->