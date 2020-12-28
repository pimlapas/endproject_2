<?php 
    session_start();
    error_reporting(0);
    include("../../../config/connect.php");
    include("../../../config/functions.php");

    $updatedata = new DB_con();

    if (isset($_POST['update'])) {

        $userid = $_SESSION['id'];
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];
        $email = $_POST['useremail'];
        $password = md5($_POST['password']);
        $date = $_POST['regdate'];

        $sql = $updatedata->update($fname, $uname, $email, $password, $date, $userid);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='../view/customer'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='Infomation.php'</script>";
        }
    }
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
          <div class="row">
          <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">แก้ไขข้อมูลลูกค้า</h4>
                  
                </div>
                <div class="card-body table-responsive">
                       <?php 

                        $userid = $_GET['id'];
                        $updateuser = new DB_con();
                        $sql = $updateuser->fetchonerecord($userid);
                        while($row = mysqli_fetch_array($sql)) {
                        ?>

                        <form action="" method="post">
                        <div class="mb-3">
                            <label for="firstname" class="form-label" style="color:">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" name="fullname" 
                                value="<?php echo $row['fullname']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label" style="color:">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" name="username"
                                value="<?php echo $row['username']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" style="color:">อีเมล</label>
                            <input type="email" class="form-control" name="useremail" 
                                value="<?php echo $row['useremail']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phonenumber" style="color:">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="password"
                                value="<?php echo $row['password']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phonenumber" style="color:">วันที่สมัครสมาชิก</label>
                            <input type="text" class="form-control" name="regdate"
                                value="<?php echo $row['regdate']; ?>" required>
                        </div>
                        <?php } ?>
                        <button type="submit" name="update" class="btn btn-warning">แก้ไขข้อมูล</button>
                        </form>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../signin">Logout</a>
        </div>
      </div>
    </div>
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
</body>

</html>