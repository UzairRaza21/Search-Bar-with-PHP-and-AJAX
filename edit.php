<?php
session_start();
include "conn.php";
if (!isset($_SESSION['admin_name'])){
    header("location: login-page.php");
}
?>

<?php
include("conn.php");
$adid = $_GET["adid"];

$sql = "SELECT * FROM ads WHERE ad_id= {$adid}";
$result = mysqli_query($conn, $sql) or die('Failed to fetch data');

$row = mysqli_num_rows($result);
if ($row > 0) {
  $property = mysqli_fetch_assoc($result);
 
 

if (isset($_POST['update_ad'])) {
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

  if (!empty($pimage_name)) {
    move_uploaded_file($pimage_temp_name,  "uploaded-Products/" . $pimage_name);
} else {
    $pimage_name = $property['ad_img']; // Use existing image if no new image is uploaded
}

  // image upload code end

  
  $sql = "UPDATE `ads` SET `ad_address`='$paddress',`ad_price`='$pprice',`ad_size`='$psize',`ad_year`='$pyear',`ad_commission`='$pcommission',`ad_img`='$pimage_name',`ad_city`='$pcity',`ad_zipcode`='$pzipcode',`ad_bedroom`='$pbedroom',`ad_bathroom`='$pbathroom',`ad_agent_name`='$pagent_name',`ad_agent_phone`='$pagent_phone' WHERE ad_id = $adid";
  $result = mysqli_query($conn, $sql) or die('Falied to fetch Record');

  mysqli_close($conn);
  header("location: productlist.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color: whitesmoke;" >
    <!-- Nav Start -->
    <nav>
        <div id="logo-pic">
            <img src="lmages/dash-logo-removebg.png" alt="threads" width="180" height="60">    
        </div>
        
        <div>
            <ul id="nav-links">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="products-upload.php">Upload Ads</a></li>
                <li><a href="productlist.php">Ads List</a></li>
                <li><a href="products.php">Goto Website</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div id="menu" onclick="openMenu()">
            <img src="lmages/hamburger.png" alt="menu" width="20">
        </div>
    </nav>
    
    <div id="nav-col" >
        <div id="nav-col-links" class="nav-col-links">
                    <a id="link" href="dashboard.php">Dashboard</a>
                    <a id="link" href="products-upload.php">Upload Ads</a>
                    <a id="link" href="productlist.php">Ads List</a>
                    <a id="link" href="products.php">Goto Website</a>
                    <a id="link" href="logout.php">Logout</a>
        </div>
    </div>
    <!-- Nav End -->







    <div class="product-form">
        <h1>Upload Products</h1>
        <form action="" method="post" enctype="multipart/form-data" >

            <div class="product-form-field">
            <label for="property_address">Street Address</label>
            <input type="text" name="property_address" id="property-address" value= "<?php echo  $property['ad_address'] ?>" style="margin-left: 60px; width: 200px">
            </div><br>

            <div class="product-form-field">
            <label for="property-city">City</label>
            <input type="text" name="property_city" id="property-city" value= "<?php echo  $property['ad_city'] ?>" style="margin-left: 10px;width:200px">
            </div><br>  

            <div class="product-form-field">
            <label for="property-zipcode">Zip Code</label>
            <input type="text" name="property_zipcode" id="property-zipcode" value= "<?php echo  $property['ad_zipcode'] ?>" style="margin-left: 10px;width:200px">
            </div><br>

            <div class="product-form-field">
            <label for="property_price">Property Price</label>
            <input type="text" name="property_price" id="property-price" value= "<?php echo  $property['ad_price'] ?>" style="margin-left: 10px;width:200px">
            </div><br>            
            
            <div class="product-form-field">
            <label for="property-bedrooms">Number of Bedrooms</label>
            <input type="text" name="property_bedrooms" id="property-bedrooms" value= "<?php echo  $property['ad_bedroom'] ?>" style="margin-left: 10px;width:200px">
            </div><br>

            <div class="product-form-field">
            <label for="property-bathrooms">Number of Bathrooms</label>
            <input type="text" name="property_bathrooms" id="property-bathrooms" value= "<?php echo  $property['ad_bathroom'] ?>" style="margin-left: 10px;width:200px">
            </div><br>

            <div class="product-form-field">
            <label for="property_size">Property Size</label>
            <input type="text" name="property_size" id="property-size" value= "<?php echo  $property['ad_size'] ?>" style="margin-left: 10px;width:200px">
            </div><br>

            <div class="product-form-field">
            <label for="property-commission">Agent Compensation</label>
            <input type="text" name="property_commission" id="property-commission" value= "<?php echo  $property['ad_commission'] ?>" style="margin-left: 10px;width:200px">
            </div><br>
            
            <div class="product-form-field">
            <label for="property-agent-name">Seller's Agent Name</label>
            <input type="text" name="property_agent_name" id="property-agent_name" value= "<?php echo  $property['ad_agent_name'] ?>" style="margin-left: 10px;width:200px;">
            </div><br>

            <div class="product-form-field">
            <label for="property-agent-phone">Seller's Agent Phone Number</label>
            <input type="text" name="property_agent_phone" id="property-agent-phone" value= "<?php echo  $property['ad_agent_phone'] ?>"  style="margin-left: 20px;width:200px;">
            </div><br>

            <div class="product-form-field">
            <label for="property-year">Built Year</label>
            <input type="text" name="property_year" id="property-year" value= "<?php echo  $property['ad_year'] ?>" style="margin-left: 10px;width:200px">
            </div><br>

            <div class="product-form-field">
            <label for="">Property Image</label>
            <input type="file" name="property_image" style="margin-left: 80px;" value= "<?php echo  $property['ad_img'] ?>" > <br><br>
            </div><br>

            <?php if (!empty($property['ad_img'])): ?>
                <img src="uploaded-Products/<?php echo htmlspecialchars($property['ad_img']); ?>" alt="Current Property Image" style="max-width: 200px;"><br><br>
            <?php endif; ?>
    <br><br>

            <input type="submit" value="Update" name="update_ad" class="product-upload-button"  style="margin-left: 300px;">
        </form>
        <br>
        <br>

        
    </div>


  <?php
  } else {
    echo "Failed to fetch data";
  }

  ?>


<script src="app.js"></script>
  </body>
  </html>