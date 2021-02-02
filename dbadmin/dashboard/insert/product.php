<?php 
session_start();
include("../config/file-upload.php"); 
include_once('../../../config/functions.php');?>
<?php
$userid = $_SESSION['id'];
$products = new DB_con();
$sql = $products->fetchdata_product($userid);
$row = mysqli_fetch_array($sql)
?>

<?php 
$sqlcat = "SELECT * FROM categories";
$resultcat2 = $conn->query($sqlcat);
$sqlc = "SELECT * FROM products where id  order by id DESC";
$resultc = $conn->query($sqlc);
$rowc = $resultc ->fetch_assoc();
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
          <div class="row">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">เพิ่มข้อมูลสินค้า</h4>
                </div>
          <div class="card-body table-responsive">
          <div class="form-group">
          <form action="" method="post" enctype="multipart/form-data" class="mb-3">
     
       
          <div class="mb-3">
              <label for="product_code" class="form-label">รหัสสินค้า</label>
              <input type="text" class="form-control" id="product_code" name="product_code" value=""  >
          </div>
          <div class="mb-3">
              <label for="product_name" class="form-label">ชื่อสินค้า</label>
              <input type="text" class="form-control" id="product_name" name="product_name" onblur="checkusername(this.value)">
              <span id="usernameavailable"></span>
          </div>
          <div class="mb-3">
          <label for="product_desc" class="form-label">รายละเอียดสินค้า</label>
              <input type="text" class="form-control" id="product_desc" name="product_desc">
          </div>

          <div class="mb-3">
          <label for="product_desc" class="form-label">หมวดหมู่สินค้า</label></label>
          <select name="catId" id="catId" class="form-control">
                        <option value=""></option>
                        <?php while($resultcat = mysqli_fetch_assoc($resultcat2)): ?>
                            <option value="<?=$resultcat['catId']?>"><?=$resultcat['catName']?></option>
                        <?php endwhile; ?>
          </select>
          </div>
          
          <div class="mb-3">
              <label for="product_price" class="form-label">ราคา</label>
              <input type="text" class="form-control" id="product_price" name="product_price">
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
          

      <button type="submit" name="submit" class="btn btn-info btn-block mt-4">
        เพิ่มสินค้า
      </button>
      
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    function readURL(input) {
      if (input.files && input.files[3]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#imgPlaceholder').attr('src', e.target.result);
        }

        // base64 string conversion
        reader.readAsDataURL(input.files[0]);
        reader.readAsDataURL(input.files[1]);
        reader.readAsDataURL(input.files[2]);
        reader.readAsDataURL(input.files[3]);



      }
    }

    $("#chooseFile").change(function () {
      readURL(this);
    });
</script>
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
<?php }?>
</html>