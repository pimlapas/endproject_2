<?php 
session_start();
$sql4 = "SELECT count(id) as oid FROM `orders` WHERE status_id=0";
$result4 = $conn->query($sql4);
$row4 = $result4 ->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Admin DB
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
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


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                 สวัสดี, <?php echo $_SESSION['fname']; ?>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link" href="/thenewcart/dbadmin/dashboard/view/reportordernostatus" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  
                  <?php if($row4['oid']==0) : ?>
                  
                  <?php endif; ?>
                  <?php if($row4['oid']>0) : ?>
                  <span class="notification"><?php echo $row4['oid']; ?></span>
                  <?php endif; ?></span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="/thenewcart/">หน้าหลัก</a>
                <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
                  <a class="dropdown-item" href="/thenewcart/config/logout">ออกจากระบบ</a>
              <?php endif; ?> 

              <?php if(empty($_SESSION['id'])) : ?>
                <a class="dropdown-item" href="/thenewcart/config/signin">เข้าสู่ระบบ</a>
              <?php endif; ?>   
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->