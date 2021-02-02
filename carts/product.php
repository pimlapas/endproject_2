<?php 
    session_start();
    include_once('../config/functions.php');
    error_reporting(0);
    $updatedata = new DB_con();

    include '../config/head.php'
?>
<body>

                    <div class="product-bit-title text-center">
                        <h2>รายการสินค้า</h2>
                  

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
              <?php
              $userid = $_SESSION['id'];
              $catId = $_GET['catId'];
              $products = new DB_con();
              $sql = $products->fetchdata_product($catId);
              while($row = mysqli_fetch_array($sql)) 
              {
              ?>
          
          <div class="col-lg-3 col-md-3 mb-1 mt-2">
            <div class="card h-100"><br>
              <a><img class="card-img-top" height="200" width="200" src="/thenewcart/dbadmin/assets/img/product/<?php echo $row['product_img_name']; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title"><br><p style="color:black;">
                <?php echo $row['product_name']; ?>
                </h4></p>
                <h5><span class="badge badge-secondary" style="background-color:yellow"><p style="color:black;">ราคา <?php echo number_format($row['product_price'],2); ?> บาท.-</p></span></h5>
                <p class="card-text" style="color:black;"><b><u>รายละเอียดสินค้า</u></b> <br><?php echo mb_substr($row['product_desc'],0,75,'UTF-8'); ?></p>
                <?php if($row['qty']<=0) : ?>
                <p class="card-text"><span class="badge badge-secondary" style="background-color:red">สินค้าหมด</span></p>
                <?php endif; ?> 
                <?php if($row['qty']>=1) : ?>
                <p class="card-text"><span class="badge badge-secondary" style="background-color:#000000">คงเหลือจำนวน <?php echo $row['qty']; ?> ชิ้น</span></p>
                <?php endif; ?> 
                <div class="col-m-6">
                <?php if($row['qty']<=0) : ?>
                <a class="add_to_cart_button" href="#" role="button">
                <i class="fa fa-minus-circle"></i></a>
                <?php endif; ?> 

                <?php if($row['qty']>=1) : ?>
                <a class="add_to_cart_button" href="config/updatecart.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row['id']; ?>" role="button">
                ใส่ตระกร้า</a>
                <?php endif; ?> 
                <a class="add_to_cart_button" href="productdetail.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row['id']; ?>" role="button">
                รายละเอียดสินค้า</a>
                </div>
              </div>
            </div>
          </div>
         <?php } ?>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title" id="memberModalLabel"></h4>
                   <div class="dash">
                   </div>
            </div>
        </div>
     </div>
  </div>
</section>
</main>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attribute    
          var rid = button.data('id')
          var modal = $(this);
          var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "popup_model.php?repair_id="+rid,
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script> 
<?php include '../config/footer.php' ?>

  <!-- Vendor JS Files -->
<script src="asset/js/jquery-2.2.4.min.js"></script>
<script src="asset/js/popper.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/stellar.js"></script>
<script src="asset/vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="asset/js/jquery.ajaxchimp.min.js"></script>
<script src="asset/js/waypoints.min.js"></script>
<script src="asset/js/mail-script.js"></script>
<script src="asset/js/contact.js"></script>
<script src="asset/js/jquery.form.js"></script>
<script src="asset/js/jquery.validate.min.js"></script>
<script src="asset/js/mail-script.js"></script>
<script src="asset/js/theme.js"></script>
</body>
</html>
