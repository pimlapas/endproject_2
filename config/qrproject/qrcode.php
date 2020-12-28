<?php
require_once('../connect.php');
// include composer autoload
require_once 'vendor/autoload.php';
 
$id=$_GET['itemId'];
// path โฟลเดอร์ที่จะเก็บไฟล์รูป qrcode ที่สร้าง
$path_qrcode = "images/picqrcode/";
$sql = "
SELECT * FROM orders where id=$id
";
$result = $conn->query($sql);
if($result && $result->num_rows>0){ 
    while($row = $result->fetch_assoc()){        
        $file_qrcode = "orders_".$row['id'].".png";
        $full_savePath = $path_qrcode.$file_qrcode;
        $text_qrcode = $row['id'];
        \PHPQRCode\QRcode::png('https://devbunny.myhost.in.th/thenewcart/config/bill?itemId='.$text_qrcode, $full_savePath, 'M', 4, 2);
    }
}
header('location:../bill?itemId='.$id);
?>