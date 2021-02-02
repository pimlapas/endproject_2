<?php include 'config/head.php' ?>

  

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">สินค้าใหม่</h2>
                    <?php 
                    while($row1 = mysqli_fetch_assoc($resultp)) { ?>
                    <div class="single-wid-product">
                        <a href="carts/productdetail.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row1['id']; ?>"><img class="product-thumb" src="/thenewcart/dbadmin/assets/img/product/<?php echo $row1['product_img_name']; ?>"></a>
                        <h2><a href="carts/productdetail.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row1['id']; ?>"><?php echo $row1['product_name']; ?></a></h2>
                       
                        <div class="product-wid-price">
                        <ins>ราคา <?php echo number_format($row1['product_price'],2); ?> บาท.- </ins>
                        </div>                            
                    </div>
                    <?php } ?> 
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">สินค้าขายดี</h2>
                    <?php 
                     while($row2 = mysqli_fetch_assoc($result2)) { ?>
                    <div class="single-wid-product">
                        <a href="carts/productdetail.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row2['id']; ?>"><img src="/thenewcart/dbadmin/assets/img/product/<?php echo $row2['product_img_name']; ?>" alt="" class="product-thumb"></a>
                        <h2><a href="carts/productdetail.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row2['id']; ?>"><?php echo $row2['product_name']; ?></a></h2>
                        <div class="product-wid-price">
                        <ins>ราคา <?php echo number_format($row2['product_price'],2); ?> บาท.- </ins>
                        </div>                            
                    </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
    </div>
</div> <!-- End product widget area -->






<?php include 'config/footer.php' ?>
</body>
</html>