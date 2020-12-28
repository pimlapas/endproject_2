<?php
    session_start();
    error_reporting(0);
    include("../../../config/connect.php");
    include("../../../config/functions.php");

//    $id = $_GET['id'];
    $rid = $_GET['repair_id'];

    $sql = "SELECT * FROM tblusers  where id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();

    $updatedata2 = new DB_con();

    if (isset($_POST['update'])) {

        $uid = $_POST['uid'];
        $role_id = $_POST['role_id'];
        
        $sqll = $updatedata2->updaterole($role_id,$uid);
        if ($sqll) {
            echo "<script>alert('เพิ่มรายการเรียบร้อย');</script>";
             echo "<script>window.location.href='../view/customer'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='changerole?repair_id=$rid'</script>";
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
              <h4 class="card-title">แก้ไขสิทธิ์ของผู้ใช้งาน</h4>
            </div>
            <div class="card-body">
              <div id="typography">

	<div class="modal-body">           
        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">ชื่อผู้ใช้ :</label>
					<?php echo $mem['fullname'] ;?>
            </div>
        </div>

        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">สิทธิ์ :</label>

                <?php if($mem['role_id']!=1) : ?>
                    Users
                <?php endif; ?>
                <?php if($mem['role_id']==1) : ?>
                    Admin
                <?php endif; ?>
					
            </div>
        </div>
   
       <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          
        <hr>
        <div class="row">
        <div class="col-sm">

            <div class="mb-2">
                <label for="qty" class="form-label">Users Id</label>
                <input type="text" class="form-control" id="uid" name="uid" value="<?php echo $mem['id'] ;?>">
               
            </div>

            <div class="mb-2">
                <label for="qty" class="form-label">สิทธ์เข้าใช้งาน</label>
                
                <select class="form-control" id="role_id" name="role_id"">
                <option value="1">Admin</option>
                <option value="0">Users</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-info btn-block mt-4" onclick="showNotification2('top','right')">
                เพิ่มข้อมูล
            </button>
        </form>
</div>
</div>
<div class="row mt-3">
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

</html>