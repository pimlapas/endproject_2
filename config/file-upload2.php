<?php 
    // Database connection
    include("connect.php");
    $sqltoken = "SELECT token FROM linetoken";
    $resulttoken = $conn->query($sqltoken);
    $rowtoken = $resulttoken ->fetch_assoc();

    $linetoken = $rowtoken['token'];
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../dbadmin/assets/img/bill/";
        $order_id = basename($_POST['order_id']);
        $status_id = basename($_POST['status_id']);
        $uploadpic = basename($_FILES["fileUpload"]["name"]);
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");

        if (!file_exists($_FILES["fileUpload"]["tmp_name"])) {
            $resMessage = array(
            );
                     echo '<script type="text/javascript">';
                     echo 'setTimeout(function () { swal.fire({
                         title: "ผิดพลาด!",
                         text: "กรุณาเลือกไฟล์ภาพ !!",
                         type: "error",
                         icon: "error"
                     });';
                     echo '}, 500 );</script>';
 
         } else if (!in_array($imageExt, $allowd_file_ext)) {
             $resMessage = array(
             );   
                     echo '<script type="text/javascript">';
                     echo 'setTimeout(function () { swal.fire({
                         title: "ผิดพลาด",
                         text: "อัพโหลดได้แค่ .jpg, .jpeg และ .png เท่านั้น !!",
                         type: "error",
                         icon: "error"
                     });';
                     echo '}, 500 );</script>';
                              
         } else if ($_FILES["fileUpload"]["size"] > 2097152) {
             $resMessage = array(
             );
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal.fire({
                        title: "ผิดพลาด!",
                        text: "ไฟล์ต้องมีขนาดไม่เกิน 2Mb !!",
                        type: "error",
                        icon: "error"
                    });';
                    echo '}, 500 );</script>';
             
         } else if (file_exists($target_file)) {
             $resMessage = array(
             );
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal.fire({
                        title: "ผิดพลาด!",
                        text: "ชื่อไฟล์นี้ซ้ำ",
                        type: "error",
                        icon: "error"
                    });';
                    echo '}, 500 );</script>';
 
         } else {
               
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                
                $sql = "INSERT INTO  cashout (order_id,status_id,pic) 
                VALUES ('$order_id','$status_id','$uploadpic')";     
                                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                    $resMessage = array(
                    ); 
                    $sql2 = "UPDATE orders SET status_id='$status_id' WHERE id='$order_id'";
                    if ($conn->query($sql2) === TRUE) {
                    }
                    else {echo "Error:" . $sql . "<br>" . $conn->error;}
                        
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
                    date_default_timezone_set("Asia/Bangkok");

                    $sToken = $linetoken;
                    $sMessage = "ชำระเงินเรียบร้อย";
                    $order_id = basename($_POST['order_id']);
                    $custName = $_SESSION['fname'];
                    $inputimage = "https://ci.lnwfile.com/3pf3fk.png";
                    $message = "ชำระเงินเรียบร้อย "."\n"."ใบสั่งซื้อที่ : ".$order_id."\n"."คุณ : ".$custName ."\n";     
                    
                    $chOne = curl_init(); 
                    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                    curl_setopt( $chOne, CURLOPT_POST, 1); 
                    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message&imageThumbnail=$inputimage&imageFullsize=$inputimage"); 
                    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                    $result = curl_exec( $chOne ); 

                    //Result error 
                    if(curl_error($chOne)) 
                    { 
                        echo 'error:' . curl_error($chOne); 
                    } 
                    else { 
                        $result_ = json_decode($result, true); 
                        
                    } 
                    curl_close( $chOne );   
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal.fire({
                        title: "สำเร็จ!",
                        text: "ชำระเงินเรียบร้อย",
                        type: "success",
                        icon: "success"
                    });';
                    echo '}, 500 );</script>';

                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { 
                        window.location.href = "../carts/order_detail";';
                    echo '}, 2000 );</script>';              
                 }
            } else {
                $resMessage = array(
                    "status" => "alert-danger",
                    "message" => "Image coudn't be uploaded."
                );
            }
        }
    }

?>