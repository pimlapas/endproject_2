<?php include '../config/head.php';
$id = $_GET['itemId'];
$catId = $_GET['catId'];
$sqlsad = "SELECT * FROM products where id ='$id'";
$resultsad = $conn->query($sqlsad);
$mem = $resultsad ->fetch_assoc();
?>
    

    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                    <img class="card-img-top" height="400" width="400" src="/thenewcart/dbadmin/assets/img/product/<?php echo $mem['product_img_name']; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $mem['product_name']; ?></h2>
                                    <div class="product-inner-price">
                                    ราคา <span class="badge badge-secondary" style="background-color:black"><?php echo $mem['product_price']; ?></span> บาท.-
                                    <?php if($mem['qty']<=0) : ?>
                                    <p class="card-text">คงเหลือจำนวน <span class="badge badge-secondary" style="background-color:red">สินค้าหมด</span></p>
                                    <?php endif; ?> 
                                    <?php if($mem['qty']>=1) : ?>
                                    <p class="card-text">คงเหลือจำนวน <span class="badge badge-secondary" style="background-color:#000000"> <?php echo $mem['qty']; ?></span> ชิ้น</p>
                                    <?php endif; ?> 
                                    </div>    
                                    
                                    <form action="" class="cart">
                                    <?php if($mem['qty']<=0) : ?>
                                    
                                    <?php endif; ?> 

                                    <?php if($mem['qty']>=1) : ?>
                                    <a class="add_to_cart_button" href="config/updatecart.php?catId=<?php echo $catId; ?>&itemId=<?php echo $mem['id']; ?>" role="button">
                                    เพิ่มสินค้าใส่ตระกร้า</a>
                                    <?php endif; ?> 
                                    </form>   
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class=""><a href="#home" aria-controls="home" role="tab" data-toggle="tab">รายละเอียดสินค้า</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <?php echo $mem['product_desc']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
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
    <?php include '../config/footer.php'; ?>