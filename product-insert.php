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
    $pcategory = $_POST['property_category'];

    // Initialize an array to hold the image file names
    $pimage_names = [];

    // Loop through each uploaded file
    foreach ($_FILES['property_image']['tmp_name'] as $key => $tmp_name) {
        $pimage_name = $_FILES['property_image']['name'][$key];
        $pimage_temp_name = $tmp_name;

        // Validate and move the uploaded files
        if (is_uploaded_file($pimage_temp_name)) {
            $upload_dir = "uploaded-Products/";
            $pimage_path = $upload_dir . basename($pimage_name);

            // Check file type and size (optional)
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
            //$max_size = 2 * 1024 * 1024; // 2 MB

            if (in_array($_FILES['property_image']['type'][$key], $allowed_types) && $_FILES['property_image']['size'][$key]) {
                if (move_uploaded_file($pimage_temp_name, $pimage_path)) {
                    // Add the file name to the array
                    $pimage_names[] = $pimage_name;
                } else {
                    die("Image upload failed for $pimage_name");
                }
            } else {
                die("Invalid image file for $pimage_name");
            }
        } else {
            die("No image file uploaded for $pimage_name");
        }
    }

    // Convert the array of image names to a JSON string
    $pimage_names_json = json_encode($pimage_names);

    $sql = "INSERT INTO `ads`(`ad_address`, `ad_price`, `ad_size`, `ad_year`, `ad_commission`, `ad_img`, `ad_city`, `ad_zipcode`, `ad_bedroom`, `ad_bathroom`, `ad_agent_name`, `ad_agent_phone`, `ad_category`) 
            VALUES ('{$paddress}', '{$pprice}', '{$psize}', '{$pyear}', '{$pcommission}', '{$pimage_names_json}', '{$pcity}', '{$pzipcode}', '{$pbedroom}', '{$pbathroom}', '{$pagent_name}', '{$pagent_phone}', '{$pcategory}')";

    $result = mysqli_query($conn, $sql) or die ("Query not successful: " . mysqli_error($conn));
   
    mysqli_close($conn);

    if($pcategory == "sale"){
        header("location: ads-sale.php");
    }else if($pcategory == "lease"){
        header("location: ads-lease.php");
    }else{
        header("location: ads-market-off.php");
    }
    
    exit();
}
?>
