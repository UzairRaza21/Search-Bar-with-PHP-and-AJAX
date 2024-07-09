<?php

if(isset($_POST['upload_ad'])){
    include("conn.php");

    $paddress = $_POST['property_address'];
    $psize = $_POST['property_size'];
    $pprice = $_POST['property_price'];
    $pyear = $_POST['property_year'];
    $pcommission = $_POST['property_commission'];

    // image upload code start
    $pimage_name = $_FILES['property_image']['name'];
    $pimage_temp_name = $_FILES['property_image']['tmp_name'];
    move_uploaded_file($pimage_temp_name,  "uploaded-Products/" . $pimage_name ); 
    // image upload code end

    $sql = "INSERT INTO `ads`(`ad_address`, `ad_price`, `ad_size`, `ad_year`, `ad_commission`, `ad_img`) VALUES ('{$paddress}','{$pprice}','{$psize}' ,'{$pyear}','{$pcommission}' ,'{$pimage_name}')";

    $result = mysqli_query($conn, $sql) or die ("Query not Successfull");
   
    mysqli_close($conn);
    header("location: products.php");

}

?>