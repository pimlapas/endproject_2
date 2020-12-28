<?php 
    session_start();
    error_reporting(0);
    include '../config/head.php';
    include_once('../config/functions.php');
    include_once('../config/connect.php');
    if ($_SESSION['id'] == "") {
      header("location: /thenewcart/config/signin.php");
  } else 
    
    $sql = "SELECT orders.id ,order_date,fullname,status_name,orders.status_id,color FROM orders,tblusers,status_cash 
    where status_cash.status_id=orders.status_id and tblusers.id=orders.cust_id order by orders.id DESC ";
    $query = mysqli_query($conn, $sql);
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                    <h2><marquee>รายการสั่งซื้อ</marquee></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                    <h2 class="sidebar-title">สินค้าอื่นๆ</h2>
                        <?php 
                        while($row1 = mysqli_fetch_assoc($resultp)) { ?>
                        <div class="thubmnail-recent">
                            <img class="recent-thumb" src="/thenewcart/dbadmin/assets/img/product/<?php echo $row1['product_img_name']; ?>">
                            <h2><a href="productdetail.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row1['id']; ?>"><?php echo $row1['product_name']; ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins>ราคา <?php echo $row1['product_price']; ?> บาท.-</ins>
                            </div>                   
                        </div>
                        <?php } ?> 
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <table class="table table-hover mt-5" id="example">
                        <thead>
                        <tr>
                        <th>เลขที่สั่งซื้อ</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th>ชื่อลูกค้า</th>
                        <th>สถานะ</th>
                        <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $userid = $_SESSION['id'];
                        $updateuser = new DB_con();                         
                        
                        $sql = $updateuser->fetchdata_order_detail($userid);
                        while($row = mysqli_fetch_array($sql)) { $status_id=$row['status_id']; ?>

                        <tr>
                        <td><?php echo $row['report_id']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $_SESSION['fname']; ?></td> 
                        <td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
                        <td>
                        <a class="add_to_cart_button" href="../config/qrproject/qrcode?itemId=<?php echo $row['id']; ?>" role="button">
                        ใบเสร็จ <i class="fa fa-file"></i></a>
                        <?php if($status_id==0) : ?>
                        <a class="add_to_cart_button" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
                        ชำระเงิน <i class="fa fa-credit-card"></i></a>
                        </td>
                        <?php endif; ?> 
                        </tr>
                        <?php }?>
                        </table>
                       
                        <div class="cart-collaterals">
                        <div class="cross-sells">
                        <h2>สินค้าอื่นๆที่คุณอาจสนใจ</h2>
                                <ul class="products">
                                <?php 
                                while($row2 = mysqli_fetch_assoc($result2)) { ?>
                                    <li class="product">
                                        <a href="productdetail.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row2['id']; ?>">
                                            <img width="325" height="325" class="attachment-shop_catalog wp-post-image" src="/thenewcart/dbadmin/assets/img/product/<?php echo $row2['product_img_name']; ?>">
                                            
                                            <h3><?php echo $row2['product_name']; ?></h3>
                                            <span class="price"><span class="amount"><?php echo $row2['product_price']; ?> บาท.-</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="productdetail.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row2['id']; ?>">รายละเอียดสินค้า</a>
                                    </li>
                                <?php } ?> 
                                </ul>
                            </div>
                        </div>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>
<script>
$('#example').dataTable( );
</script>                            
    <?php include '../config/footer.php' ?>
  </body>
</html>