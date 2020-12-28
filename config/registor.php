<?php 
session_start();
include_once('functions.php');
include_once('connect.php'); 
    
    $userdata = new DB_con();

    if (isset($_POST['submit'])) {
      $fname = $_POST['fullname'];
      $uname = $_POST['username'];
      $uemail = $_POST['email'];
      $custaddr = $_POST['custaddr'];
      $password = md5($_POST['password']);

      $sql = $userdata->registration($fname, $uname, $uemail,$custaddr, $password);

      if ($sql) {
          echo "<script>alert('Registor Successful!');</script>";
          echo "<script>window.location.href='signin'</script>";
      } else {
          echo "<script>alert('Something went wrong! Please try again.');</script>";
          echo "<script>window.location.href='registor'</script>";
      }
  }

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
		<div class="card2">
			<div class="card-header">
				<h3>สมัครสมาชิก</h3>
			</div>
			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="username" name="fullname" placeholder="ชื่อ - นามสกุล" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-users"></i></span>
						</div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้" onblur="checkusername(this.value)" required><br> 
                            <span id="usernameavailable"></span>
                    </div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" id="email" name="email" placeholder="อีเมล" required>
                    </div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="text" class="form-control" id="custaddr" name="custaddr" placeholder="ที่อยู่" required>
                    </div>
                    
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="พาสเวิร์ด" required>
                    </div>
                   
					<div class="form-group">
					<div class="col-10">
					<a class="btn float-right login_btn"  href="signin" role="button">
					ล็อกอิน </a>
					</div>
					<div class="col-6">
					<input type="submit" value="สมัครสมาชิก" name="submit" class="btn float-right login_btn">
				    </div>
					</div>
				</form>
			</div>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script>
				function checkusername(val) {
					$.ajax({
						type: 'POST',
						url: 'checkuser_available.php',
						data: 'username='+val,
						success: function(data) {
							$('#usernameavailable').html(data);
						}
					});
				}
			</script>
		</div>
	</div>
</div>
</body>
</html>