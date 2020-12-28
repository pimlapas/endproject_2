<?php 

    // Database connection
    include("../../../config/connect.php");
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../../assets/img/product/";
        $product_id = basename($_POST['product_id']);
        $product_code = basename($_POST['product_code']);
        $product_name = basename($_POST['product_name']);
        $product_desc = basename($_POST['product_desc']);
        $product_price = basename($_POST['product_price']);
        $catId = basename($_POST['catId']);
        $uploadpic = basename($_FILES["fileUpload"]["name"]);
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");

            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                
                $sql = "UPDATE products SET 
                product_code = '$product_code',
                product_name = '$product_name',
                product_desc = '$product_desc',
                product_img_name = '$uploadpic',
                product_price = '$product_price',
                catId = '$catId'
                WHERE id = '$product_id'";
                $query = $conn->query($sql) or die($conn->error . "<br>$sql"); 
            } 

            else {

                $sql = "UPDATE products SET 
                product_code = '$product_code',
                product_name = '$product_name',
                product_desc = '$product_desc',
                product_price = '$product_price',
                catId = '$catId'
                WHERE id = '$product_id'";
                $query = $conn->query($sql) or die($conn->error . "<br>$sql"); 

            }
        

    }

?>