<?php 
    session_start();
    include_once('functions.php'); 
    
    $userdata = new DB_con();

    if (isset($_POST['login'])) {
        $uname = $_POST['username'];
        $password = md5($_POST['password']);

        $result = $userdata->signin($uname, $password);
        $num = mysqli_fetch_array($result);

        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['fname'] = $num['fullname'];
            $_SESSION['role_id'] = $num['role_id'];
            //$_SESSION['userscoin'] = $num['userscoin'];
           
            echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal.fire({
				title: "สำเร็จ!",
				text: "เข้าสู่ระบบเรียบร้อย!",
				type: "success",
				icon: "success"
			});';
			echo '}, 500 );</script>';

			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../index";';
            echo '}, 3000 );</script>';
        } else {
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal.fire({
				title: "ผิดพลาด!",
				text: "กรุณาลองใหม่!",
				type: "warning",
				icon: "error"
			});';
			echo '}, 500 );</script>';
        }
    }

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>เข้าสู่ระบบ</h3>
			</div>
			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="username" name="username" onblur="checkusername(this.value)">
						<span id="usernameavailable"></span>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <input type="password" class="form-control" id="password" name="password" required>
					</div>

					<div class="form-group">
					<div class="col-10">
						<a class="btn float-right login_btn"  href="registor" role="button">
						สมัครสมาชิก </a>
					</div>
					<div class="col-6">
						<input type="submit" value="ล็อกอิน" name="login" class="btn float-right login_btn">
				    </div>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Users : admin 
				</div>
				<div class="d-flex justify-content-center links">
					Password : 123456
				</div>
			</div>
		
		</div>
	</div>
</div>
</body>
</html>