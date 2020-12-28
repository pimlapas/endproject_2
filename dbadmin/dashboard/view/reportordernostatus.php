<?php 
    session_start();
    error_reporting(0);
    include_once('../../../config/functions.php');
    include_once('../../../config/connect.php');
    if ($_SESSION['id'] == "") {
      header("location: ../signin.php");
  } else 
    
    $updatedata = new DB_con();
    $role = $_SESSION['role_id'];
    if ($role!=1) {
      echo "<script>window.location.href='/thenewcart/index'</script>";
    } else {


  $sql = "SELECT orders.id ,order_date,fullname,status_name,orders.status_id,color,report_id FROM orders,tblusers,status_cash 
  where status_cash.status_id=orders.status_id and tblusers.id=orders.cust_id and orders.status_id = 0 order by orders.id DESC ";
  $query = mysqli_query($conn, $sql);

  $sql43 = "SELECT sum(order_detail_price) as price FROM order_details,orders where order_details.order_id=orders.id and month(order_date) = month(now())";
  $result43 = $conn->query($sql43);
  $row43 = $result43 ->fetch_assoc();

  $sql5 = "SELECT sum(order_detail_price) as price FROM order_details";
  $result5 = $conn->query($sql5);
  $row5 = $result5 ->fetch_assoc();

  $sql6 = "SELECT count(id) as ord FROM orders";
  $result6 = $conn->query($sql6);
  $row6 = $result6 ->fetch_assoc();

  $sql7 = "SELECT count(id) as cid FROM tblusers";
  $result7 = $conn->query($sql7);
  $row7 = $result7 ->fetch_assoc();

 ?>

<body class="dark-edition">
  <div class="wrapper ">
    <?php include '../config/nav.php'; ?>
    </div>
    <div class="main-panel">
      
      <?php include '../config/header.php'; ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
           
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">รายได้ต่อเดือน</p>
                  <h3 class="card-title"><?php echo number_format($row43["price"]); ?> 
                    <small>บาท</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-warning">warning</i>
                    <a href="#pablo" class="warning-link">Get More Space...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">รายได้ทั้งหมด</p>
                  <h3 class="card-title"><?php echo number_format($row5["price"]); ?> 
                  <small>บาท</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">จำนวนออเดอร์</p>
                  <h3 class="card-title"><?php echo $row6["ord"]; ?>
                  <small>รายการ</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <p class="card-category">จำนวนสมาชิก</p>
                  <h3 class="card-title"><?php echo $row7["cid"]; ?>
                  <small>คน</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="card">
        <div class="card-header card-header-info">
        <h4 class="card-title">รายงานการสั่งซื้อที่ยังไม่ได้ชำระ</h4>      
        </div>
        <div class="card-body table-responsive">
            <div class="form-group">
<table class="table table-hover" id="example">
<thead>
<tr>
<th>เลขที่ใบสั่งซื้อ</th>
<th>วันที่สั่งซื้อ</th>
<th>ชื่อลูกค้า</th>
<th>สถานะ</th>
<th>ใบเสร็จ</th>
</tr>
</thead>
<tbody>

<?php 

$userid = $_SESSION['role_id'];
$updateuser = new DB_con();


                                 
if($userid==1)  
{ 
    $sql = $updateuser->fetchdata_order_detail_admin($userid);
    while($row = mysqli_fetch_assoc($query)){ $status_id=$row['status_id']; ?>
<tr>
<td><?php echo $row['report_id']; ?></td>
<td><?php echo $row['order_date']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
<td>
<a class="btn btn-success" href="/thenewcart/config/qrproject/qrcode?itemId=<?php echo $row['id']; ?>" role="button">
ใบเสร็จ <i class="fa fa-file"></i></a>
</td>
</tr>
<?php }}
      
else
{
    $sql = $updateuser->fetchdata_order_detail($userid);
    while($row = mysqli_fetch_array($sql)) { $status_id=$row['status_id']; ?>

<tr>
<td> <a href="order_detail_1?order_id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
<td><?php echo $row['order_date']; ?></td>
<td><?php echo $_SESSION['fname']; ?></td> 
<td><?php echo $row['status_name']; ?></td>
<td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
<td>
<a class="btn btn-success" href="/thenewcart/config/qrproject/qrcode?itemId=<?php echo $row['id']; ?>" role="button">
ใบเสร็จ <i class="fa fa-file"></i></a>

<?php if($status_id==0) : ?>
<td>
<a class="btn btn-info" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
ชำระเงิน <i class="fa fa-credit-card"></i></a>
</td>
<?php endif; ?> 
<td>
<a class="btn btn-info" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
ชำระเงิน <i class="fa fa-credit-card"></i></a>
</td>

</tr>

<?php }
}?>
       
   </table>

      
      <script>
      $('#example').dataTable( );
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="/js/themes/gray.js"></script>
</body>
<?php }?>
</html>