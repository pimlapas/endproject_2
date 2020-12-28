<?php 
    session_start();
    include_once('../../../config/functions.php');
    $updatedata = new DB_con();
    $order_id = $_GET['order_id'];
    $updateuser = new DB_con();
    $sql = $updateuser->fetchorder_detail($order_id);
    $row = mysqli_fetch_array($sql); 
    $role = $_SESSION['role_id'];
    if ($role!=1) {
      echo "<script>window.location.href='/thenewcart/index'</script>";
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ใบเสร็จ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<section  class="d-flex flex-column justify-content-center align-items-center">
<div class="hero-container" data-aos="fade-in">
<div class="container">
 <h1><img src="assets/img/head.png" class="img-fluid" alt=""></h1>
 <hr>
      <table class="table table-striped table-bordered">
      <td style="text-align:right">
      เลขที่ใบเสร็จ : <?php echo $row['order_id']; ?><br>
      วันที่ : <?php echo date("d/m/Y"); ?><br></td></table>
      <table class="table table-striped table-bordered">
      <td>
      ชื่อ : <?php echo $row['fullname']; ?><br>
      ที่อยู่ : <?php echo $row['custaddr'] ?><br>
      อีเมลล์ : <?php echo $row['useremail']; ?></td>

      <table class="table table-striped table-bordered">
      <tr><br>
      <th>ลำดับ</th>
      <th>ชื่อสินค้า</th>
      <th>ราคาสินค้า</th>
      <th>จำนวน</th>
      <th>ราคาสุทธิ</th>
      </tr>

      <?php 
      $i = 0;
      $total=0;

      $order_id = $_GET['order_id'];
      $updateuser = new DB_con();
      $sql = $updateuser->fetchorder_detail($order_id);
      while($row = mysqli_fetch_array($sql)) {$i++;
      $sumqty= $row['order_detail_quantity']*$row['order_detail_price'];
      $total+= $sumqty; ?>
      <tr class = "  ">
      <td><?=$i;?></td>

      <td><?php echo $row['product_name']; ?></td>
      <td><?php echo $row['order_detail_price']; ?></td>
      <td><?php echo $row['order_detail_quantity']; ?></td>

      <td align = 'right'><?php echo number_format( $sumqty)." บาท.-"; ?></td>
      <?php } ?></tr></table>

      <table class="table table-striped table-bordered">
      <tr class = ""><td colspan="3" align = 'right'><b><center>จำนวนเงินรวม</center></b></td>
      <td><p align = "right"><?php echo number_format( $total).' บาท.-'; ?></p></td>
      </tr>
      <tr class = ""><td colspan="3" ><center><b>ค่ามัดจำ</b></center></td>
      <td><p align = "right"><?php  echo number_format( $total*(15/100)).' บาท.-'; if ($total>799){ $total;} else{echo " ไม่เสียค่ามัดจำ";} ?></p></td>
      </tr>
      <tr align = 'right' class = ""><td colspan="3" ><b><center>ยอดที่ต้องชำระ</center></b></td>
      <td align = 'right'><p align = "right"><?php  echo number_format( $total-$total*(15/100)).' บาท.-'; if ($total>799){ $total;} else{echo " ไม่เสียค่ามัดจำ";} ?></p></td>
      </tr>
      </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</section>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>
</body>
<?php }?>
</html>
