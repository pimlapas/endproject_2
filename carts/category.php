
<?php 
    session_start();
    include_once('../config/functions.php');
    error_reporting(0);
    $updatedata = new DB_con();

    include '../config/head.php'
?>
    
                  <center><h2>หมวดหมู่สินค้า</h2></center>  
       
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
          <?php
          $userid = $_SESSION['id'];
          $products = new DB_con();
          $sql = $products->fetchdata_category($userid);
          while($row = mysqli_fetch_array($sql)) 
          {
          ?>

          <div class="col-lg-3 col-md-3 mb-1 mt-2">
            <div class="card h-100"><br>
              <a><center><img height="200" width="200" src="/thenewcart/dbadmin/assets/img/category/<?php echo $row['catPic']; ?>" ></center></a>
              <div class="card-body">
                <h4 class="card-title">
                <a style="display: none;"><?php echo $row['catId']; ?></a><br>
                <center><?php echo $row['catName']; ?></center>
                </h4>
                <center><a class="add_to_cart_button" href="product.php?catId=<?php echo $row['catId']; ?>" role="button">
                <span class="glyphicon glyphicon-shopping-cart"></span>เลือกสินค้า</a></center>
              </div>
            </div>
          </div>
         <?php } ?>
        </div>
       </div>
      </div>
     </div>
     </div>

  <?php include '../config/footer.php' ?>
</body>
</html>
