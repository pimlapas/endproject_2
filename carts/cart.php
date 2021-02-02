<?php 
    session_start();
    error_reporting(0);
    require '../config/connect.php';
    $action = isset($_GET['a']) ? $_GET['a'] : "";
    $itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    if (isset($_SESSION['qty']))
    {
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meItem)
    {
    $meQty = $meQty + $meItem;
    }
    } else
    {
    $meQty = 0;
    }
    if (isset($_SESSION['cart']) and $itemCount > 0)
    {
    $itemIds = "";
    foreach ($_SESSION['cart'] as $itemId)
    {
    $itemIds = $itemIds . $itemId . ",";
    }
    $inputItems = rtrim($itemIds, ",");
    $meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
    $result = $conn->query($meSql); 
    $meCount = mysqli_num_rows($result);
    } else
    {
    $meCount = 0;
    }

    include '../config/head.php'
?>

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
                        <th></th>   
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>รายละเอียด</th>
                        <th>จำนวน (ชิ้น)</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>จำนวนเงิน (บาท)</th>
                        <th>&nbsp;</th>
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
                        <td>
                        <a class="btn btn-light " href="config/removecart.php?itemId=<?php echo $meResult['id']; ?>" role="button">
                        <i class="fa fa-minus-circle"></i></a>
                        </td>
                        <td><?php echo $meResult['product_code']; ?></td>
                        <td><?php echo $meResult['product_name']; ?></td>
                        <td><?php echo $meResult['product_desc']; ?></td>
                        <td>
                        <input type="number" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;">
                        <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
                        </td>
                        <td><?php echo number_format($meResult['product_price'],2); ?></td>
                        <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]),2); ?></td>
                        <td><img  src="/thenewcart/dbadmin/assets/img/product/<?php echo $meResult['product_img_name']; ?>" border="0"></td>
                        </tr>
                        <?php
                        $num++;
                        }
                        ?>
                        <tr>
                        <td colspan="6" style="text-align: left;">
                        <h4>ราคารวม <?php echo number_format($total_price,2); ?> บาท.-</h4>
                        </td>
                        <td colspan="2" style="text-align: center;">
                        <button type="submit" class="add_to_cart_button " style="line-height: 10px"> คำนวณราคาใหม่ <a class="fa fa-repeat"></a></button>
                        </td>
                       
                        
                        <tr>
                        <td colspan="8" style="text-align: right;">
                        
                        <a href="category" type="button" class="add_to_cart_button ">เลือกสินค้า</a>
                        
                        <a href="order" type="button" class="add_to_cart_button">สั่งซื้อสินค้า</a>
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
                            </ul>
                        </div>

                        <div class="cart_totals ">
                            <h2>ราคาสุทธิ</h2>

                            <table cellspacing="0">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>ราคาสินค้ารวม</th>
                                        <td><span class="amount"><?php echo number_format($total_price,2); ?> บาท.-</span></td>
                                    </tr>

                                    <tr class="shipping">
                                        <th>ค่าจัดส่ง</th>
                                        <td>ฟรี</td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>รวมทั้งหมด</th>
                                        <td><strong><span class="amount"><?php echo number_format($total_price,2); ?> บาท.-</span></strong> </td>
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