<?php

if(isset($_POST['upload_ad'])){
    include("conn.php");

    $paddress = $_POST['property_address'];
    $pcity = $_POST['property_city'];
    $pzipcode = $_POST['property_zipcode'];
    $pprice = $_POST['property_price'];
    $pbedroom = $_POST['property_bedrooms'];
    $pbathroom = $_POST['property_bathrooms'];
    $psize = $_POST['property_size'];
    $pcommission = $_POST['property_commission'];
    $pagent_name = $_POST['property_agent_name'];
    $pagent_phone = $_POST['property_agent_phone'];
    $pyear = $_POST['property_year'];

    // image upload code start
    $pimage_name = $_FILES['property_image']['name'];
    $pimage_temp_name = $_FILES['property_image']['tmp_name'];
    move_uploaded_file($pimage_temp_name,  "uploaded-Products/" . $pimage_name ); 
    // image upload code end

    $sql = "INSERT INTO `ads`(`ad_address`, `ad_price`, `ad_size`, `ad_year`, `ad_commission`, `ad_img`, `ad_city`, `ad_zipcode`, `ad_bedroom`, `ad_bathroom`, `ad_agent_name`, `ad_agent_phone`) VALUES ('{$paddress}','{$pprice}','{$psize}','{$pyear}','{$pcommission}','{$pimage_name}','{$pcity}','{$pzipcode}','{$pbedroom}','{$pbathroom}','{$pagent_name}','{$pagent_phone}')";

    $result = mysqli_query($conn, $sql) or die ("Query not Successfull");
   
    mysqli_close($conn);
    header("location: products.php");

}

?>