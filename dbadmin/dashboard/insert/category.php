<?php 
session_start();
include("../config/file-upload2.php"); 
include_once('../../../config/functions.php');
include_once('../../../config/connect.php'); 
?>

<?php 
$sqlc = "SELECT * FROM products where id  order by id DESC";
$resultc = $conn->query($sqlc);
$rowc = $resultc ->fetch_assoc();

$sqlcat = "SELECT * FROM categories where catId order by catId DESC";
$resultcat = $conn->query($sqlcat);

$sqlplace = "SELECT * FROM tblplace where placeid order by placeid DESC";
$resultplace = $conn->query($sqlplace);

$role = $_SESSION['role_id'];
if ($role!=1) {
  echo "<script>window.location.href='/thenewcart/index'</script>";
} else {

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
</head>

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
                  <h4 class="card-title">เพิ่มข้อมูลสินค้า</h4>
                </div>
                <div class="card-body table-responsive">
                <div class="form-group">
                <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          <hr>
          <div class="row">
       <div class="col-sm">
  
       <div class="mb-2">
            <label for="product_name" class="form-label">ชื่อหมวดหมู่</label>
            <input type="text" class="form-control" id="catName" name="catName" onblur="checkusername(this.value)">
            <span id="usernameavailable"></span>
       </div>
              
        <div class="user-image mb-3 text-center">
          <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
            <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
          </div>
        </div>
  
        <div class="custom-file">
          <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile">
          <label class="custom-file-label" for="chooseFile">Select file</label>
        </div>
        </div>
        </div>
  
        <button type="submit" name="submit" class="btn btn-info btn-block mt-4">
          เพิ่มหมวดหมู่
        </button>
      </form>
      </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script>
          function readURL(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                $('#imgPlaceholder').attr('src', e.target.result);
              }

              // base64 string conversion
              reader.readAsDataURL(input.files[0]);
            }
          }

          $("#chooseFile").change(function () {
            readURL(this);
          });
      </script>
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