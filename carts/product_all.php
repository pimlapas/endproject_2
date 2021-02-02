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
