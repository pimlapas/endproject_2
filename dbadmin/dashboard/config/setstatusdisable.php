<?php include("../../../config/connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<title></title>
</head>
<body><p>
	<?php
	$id=$_GET['itemId'];
	$sql = "UPDATE products SET 
    
    status_id = '0'
    WHERE id = '$id'";

	if ($conn->query($sql) === TRUE) {
		echo "";	}
		else{
			echo "Error :".$sql."<br>".$conn->error;}
	?>
</p>
</body>
</html>
<meta http-equiv="refresh" content="0;URL=../view/product">