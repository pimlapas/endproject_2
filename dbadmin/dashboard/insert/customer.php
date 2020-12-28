<?php 
session_start();
include_once('../../../config/functions.php');
    include_once('../../../config/connect.php'); 
    
    $userdata = new DB_con();

    if (isset($_POST['submit'])) {
      $fname = $_POST['fullname'];
      $uname = $_POST['username'];
      $uemail = $_POST['email'];
      $province_id = $_POST['province_id'];
      $amphure_id = $_POST['amphure_id'];
      $district_id = $_POST['district_id'];
      $password = md5($_POST['password']);

      $sql = $userdata->registration($fname, $uname, $uemail,$province_id,$amphure_id,$district_id, $password);

      if ($sql) {
          echo "<script>alert('Registor Successful!');</script>";
          echo "<script>window.location.href='customer'</script>";
      } else {
          echo "<script>alert('Something went wrong! Please try again.');</script>";
          echo "<script>window.location.href='customer'</script>";
      }
  }


    $sql = "SELECT * FROM provinces";
    $query = mysqli_query($conn, $sql);

    $role = $_SESSION['role_id'];
    if ($role!=1) {
      echo "<script>window.location.href='/thenewcart/index'</script>";
    } else {

?>
<!-- head -->

<body class="dark-edition">
  <div class="wrapper ">
    <?php include '../config/nav.php'; ?>
    </div>
    <div class="main-panel">
      
      <?php include '../config/header.php'; ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row"></div>
          <div class="row">
            <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">เพิ่มข้อมูลลูกค้า</h4>
            </div>
            <div class="card-body table-responsive">
            <div class="form-group">
            <form method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label" style="color:">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" id="username" name="fullname">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label" style="color:">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" name="username" onblur="checkusername(this.value)">
                <span id="usernameavailable"></span>
            </div>
            <div class="mb-3">
            <label for="email" class="form-label" style="color:">อีเมล</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="color:">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึก</button>
          </form>
</div>
</div>
            </div>
          </div>
        </div>
      </div>
      <script>
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

  <script src="assets/script.js"></script>
</body>
<?php }?>
</html>