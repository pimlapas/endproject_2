<?php
session_start();
require '../config/connect.php';
include_once('../config/functions.php');
error_reporting(0);
  $userdata = new DB_con();
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('itoffside.com' . microtime());
if (isset($_SESSION['qty'])) {
$meQty = 0;
foreach ($_SESSION['qty'] as $meItem) {
$meQty = $meQty + $meItem;
}
} else {
$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
$itemIds = "";
foreach ($_SESSION['cart'] as $itemId) {
$itemIds = $itemIds . $itemId . ",";
}
$inputItems = rtrim($itemIds, ",");
$meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
$result = $conn->query($meSql); 
$meCount = mysqli_num_rows($result);
} else {
$meCount = 0;
}

include '../config/head.php'
?>

<?php
$sql1 = "SELECT MAX(`id`) AS `lastid` FROM `orders`";
$result1 = $conn->query($sql1);
$row1 = $result1 ->fetch_assoc();
$idf = $row1['lastid'];
$date = date('ym-d');
$code = sprintf($date.'-%04d', $idf);
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                    <h2><marquee>รายละเอียดการสั่งซื้อ</marquee></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="config/updateorder.php" method="post" name="formupdate" role="form" id="formupdate" onsubmit="JavaScript:return updateSubmit();">
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <div class="thubmnail-recent">
                            <h2>รายละเอียดการสั่งซื้อ</h2>

                            <table class="table" cellspacing="0">
                                <tbody>
                                    <tr class="cart-subtotal">
                                    <input type="text" class="form-control" id="order_fullname" placeholder="ใส่ชื่อนามสกุล" style="width: 300px; display: none;" name="order_fullname" value="<?php echo $_SESSION['id']; ?>" >
                                        <th>เลขที่ใบสั่งซื้อ</th>
                                        <td><input type="text" class="form-control" id="report_id" placeholder="" style="width: 200px; display: none;" name="report_id" value="<?php echo $code; ?>"> <?php echo $code; ?></td>
                                    </tr>

                                    <tr class="shipping">
                                        <th>ชื่อผู้สั่งซื้อ</th>
                                        <td><?php echo $_SESSION['fname']; ?></td>
                                    </tr>
                                </tbody>
                            </table>             
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                        <?php
                        if ($action == 'removed')
                            {
                            echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
                            }
                        
                        if ($meCount == 0)
                            {
                            echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
                            } else
                            {
                        ?>
                        <form action="config/updatecart.php" method="post" name="fromupdate">
                            <table class="shop_table cart">
                            <thead>
                        <tr>
                        <th>รหัสลูกค้า</th>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>จำนวนเงิน</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total_price = 0;
                        $num = 0;
                        while($meResult = mysqli_fetch_array($result)) 
                        {
                        $key = array_search($meResult['id'], $_SESSION['cart']);
                        $total_price = $total_price + ($meResult['product_price'] * $_SESSION['qty'][$key]);
                        ?>
                        <tr>
                        <td><?php echo $_SESSION['id']; ?></td>
                        <td><?php echo $meResult['product_code']; ?></td>
                        <td><?php echo $meResult['product_name']; ?></td>
                        <td>
                        <?php echo $_SESSION['qty'][$key]; ?>
                        <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                        <input type="hidden" name="product_id[]" value="<?php echo $meResult['id']; ?>" />
                        <input type="hidden" name="product_price[]" value="<?php echo $meResult['product_price']; ?>" />
                        </td>
                        <td><?php echo number_format($meResult['product_price'], 2); ?></td>
                        <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]), 2); ?></td>
                        </tr>
                        <?php
                        $num++;
                        }
                        ?>
                        <tr>
                        <td colspan="8" style="text-align: right;">
                        <h4>ราคารวม <?php echo number_format($total_price, 2); ?> บาท</h4>
                        </td>
                        </tr>
                        <tr>
                        <td colspan="8" style="text-align: right;">
                        <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                        <a href="cart.php" type="button" class="add_to_cart_button">ย้อนกลับ</a>
                        <button type="submit" class="add_to_cart_button">บันทึกการสั่งซื้อสินค้า</button>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </form>
                        <?php
                        }
                        ?>
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

                        <div class="cart_totals ">
                            <h2>ราคาสุทธิ</h2>

                            <table cellspacing="0">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>ราคาสินค้ารวม</th>
                                        <td><span class="amount"><?php echo number_format($total_price,2); ?></span></td>
                                    </tr>

                                    <tr class="shipping">
                                        <th>ค่าจัดส่ง</th>
                                        <td>ฟรี</td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>รวมทั้งหมด</th>
                                        <td><strong><span class="amount"><?php echo number_format($total_price,2); ?></span></strong> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>

    <?php include '../config/footer.php' ?>
    
  </body>
</html>