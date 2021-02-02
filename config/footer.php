<?php 
include 'connect.php';
$sqlcat = "SELECT * FROM categories";
$resultcat = $conn->query($sqlcat);
?>

<br>
<div class="bg-warning">
<br>
<br>
     <!-- promo-area -->
     
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>แลกเปลี่ยนสินค้า</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>ประหยัดค่าขนส่ง</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>มีความปลอดภัย</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>อัพเดทสินค้าใหม่ๆ </p>
                    </div>
                </div>
            </div>
        </div>
    <!-- End promo area -->
<br>
<br>
<br>
<!--  
<center>
                        <h2>คณะผู้จัดทำ</h2>
                        <label>1.นายสมประสงค์       เงาศรี </label><br>
                        <label>2.นางสาวพิมพ์ลภัส     ยะสะวุฒิ </label><br>

                        <label>นักศึกษาชั้นปีที่ 4 มหาวิทยาลัยบูรพา</label><br>
                        <label>คณะวิทยาการสารสนเทศ สาขาเทคโนโลยีสารสนเทศ</label><br>
                    
                  </center>
-->