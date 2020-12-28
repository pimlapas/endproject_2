<?php
    include_once('../../../config/functions.php');
    include_once('../../../config/connect.php');

    $sql = "SELECT * FROM linetoken  ";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();

    $updatedata2 = new DB_con();

    if (isset($_POST['update'])) {
        $lid = $_POST['lid'];
        $token = $_POST['token'];
        $sqll = $updatedata2->updatetoken($token,$lid);
        if ($sqll) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                title: "สำเร็จ!",
                text: "แก้ไข Token เรียบร้อย",
                type: "success",
                icon: "success"
            });';
            echo '}, 500 );</script>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../";';
            echo '}, 2000 );</script>';
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='changerole?repair_id=$rid'</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
ระบบคลังสินค้า
</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />  <script src="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script src="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="/thenewcart/node_modules/sweetalert2/dist/sweetalert2.min.css">
<style type="text/css">
div#repair_detail{
    width:650px;
    word-wrap:break-word;
}

div#repair_cause{
    width:700px;
    word-wrap:break-word;
}

.label 
{
    color: white;
    padding: 8px;
    font-family: 'Kanit', sans-serif;
}
.success {background-color: #FF33FF;} /* Green */
.info {background-color: #2196F3;} /* Blue */
.warning {background-color: #ff9800;} /* Orange */
.danger {background-color: #f44336;} /* Red */ 
.other {background-color: #e7e7e7; color: black;} /* Gray */ 

</style>    
</head>
<?php include '../config/header.php'; ?>
<body class="dark-edition">
  <div class="wrapper ">
    <?php include '../config/nav.php'; ?>
    </div>
    <div class="main-panel">
             
            <div class="content">
                <div class="container-fluid">
                   <div class="card">
                    <div class="card-header card-header-info">
                    <h4 class="card-title">แก้ไข LineToken</h4>
                    </div>
                    <div class="card-body">
                    <div id="typography">
	                <div class="modal-body">
                    <div class="row" >    
                        <div class="col-md-12" id="repair_cause">
                            <label class="control-label">สามารถขอ Token ได้ที่ https://notify-bot.line.me/en/</label>
                        </div>
                    </div>
                                
                    <div class="row" >    
                        <div class="col-md-12" id="repair_cause">
                            <label class="control-label">Token ปัจจุบัน :</label>
                            <?php echo $mem['token'] ;?>
                        </div>
                    </div>

                    <div class="row" >    
                        <div class="col-md-12" id="repair_cause">
                            <label class="control-label">แก้ไขล่าสุดวันที่ :</label>
                            <?php echo $mem['date_token'] ;?>
                        </div>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" class="mb-3"> <hr>
                    <div class="row">
                    <div class="col-sm">
                    <div class="mb-2">
                        <input type="text" class="form-control" style="width: 300px; display: none;" id="lid" name="lid" value="<?php echo $mem['id'] ;?>">
                    </div>
                    <div class="mb-2">
                        <label for="qty" class="form-label">Token</label>
                        <input type="text" class="form-control" id="token" name="token" value="">
                    </div>
                    <button type="submit" name="update" class="btn btn-info btn-block mt-4" onclick="showNotification2('top','right')">
                        แก้ไข Token
                    </button>
                    </form>
<script>
    function showNotification2(from, align){
    $.notify({
    icon: "check",
    message: "เพิ่มรายการเรียบร้อย"

    },{
    type: 'success',
    timer: 4000,
    placement: {
        from: from,
        align: align
    }
    });

    }
</script>
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
</div>
</div>
</body>
</html>