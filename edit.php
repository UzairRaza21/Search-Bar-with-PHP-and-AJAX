<?php
session_start();
include "conn.php";

// Redirect to login page if admin is not logged in
if (!isset($_SESSION['admin_name'])){
    header("location: login-page.php");
    exit; // Exit to prevent further script execution
}

include("conn.php");

// Fetch the property details based on adid from GET parameter
$adid = $_GET["adid"];
$sql = "SELECT * FROM ads WHERE ad_id= {$adid}";
$result = mysqli_query($conn, $sql) or die('Failed to fetch data');
$row = mysqli_num_rows($result);

if ($row > 0) {
    $property = mysqli_fetch_assoc($result);

    // Check if form is submitted for updating property details
    if (isset($_POST['update_ad'])) {
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

        // Handle multiple image uploads
        $pimage_names = array();
        if (!empty($_FILES['property_images']['name'][0])) {
            $total_images = count($_FILES['property_images']['name']);
            for ($i = 0; $i < $total_images; $i++) {
                $pimage_name = $_FILES['property_images']['name'][$i];
                $pimage_temp_name = $_FILES['property_images']['tmp_name'][$i];
                $target_path = "uploaded-Products/" . $pimage_name;
                move_uploaded_file($pimage_temp_name, $target_path);
                $pimage_names[] = $pimage_name;
            }
        }

        // Prepare comma-separated list of images for database update
        $pimage_name = (empty($pimage_names)) ? $property['ad_img'] : implode(',', $pimage_names);

        // Update the database with the new property details
        $sql_update = "UPDATE `ads` SET 
            `ad_address`='$paddress', 
            `ad_price`='$pprice', 
            `ad_size`='$psize', 
            `ad_year`='$pyear', 
            `ad_commission`='$pcommission', 
            `ad_img`='$pimage_name', 
            `ad_city`='$pcity', 
            `ad_zipcode`='$pzipcode', 
            `ad_bedroom`='$pbedroom', 
            `ad_bathroom`='$pbathroom', 
            `ad_agent_name`='$pagent_name', 
            `ad_agent_phone`='$pagent_phone', 
            `ad_category` = '$pcategory'
            WHERE ad_id = $adid";
        $result_update = mysqli_query($conn, $sql_update) or die('Failed to update record');

        // Redirect after update
        mysqli_close($conn);
        header("location: productlist.php");
        exit; // Exit after redirect
    }
} else {
    echo "Failed to fetch data";
    exit; // Exit if no property found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dash-real.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color: whitesmoke;">

<!-- Navigation Section -->
<nav>
    <div id="logo-pic">
        <img src="images/dash-logo-removebg.png" alt="threads" width="180" height="60">
    </div>

    <div>
        <ul id="nav-links">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="products-upload.php">Upload Ads</a></li>
            <li><a href="productlist.php">Ads List</a></li>
            <li><a href="products.php">Go to Website</a></li>
            <li><a href="ads-sale.php">Sale</a></li>
            <li><a href="ads-lease.php">Lease</a></li>
            <li><a href="ads-market-off.php">Market Off</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div id="menu" onclick="openMenu()">
        <img src="images/hamburger.png" alt="menu" width="20">
    </div>
</nav>

<div id="nav-col">
    <div id="nav-col-links" class="nav-col-links">
        <a id="link" href="dashboard.php">Dashboard</a>
        <a id="link" href="products-upload.php">Upload Ads</a>
        <a id="link" href="productlist.php">Ads List</a>
        <a id="link" href="ads-sale.php">Sale</a>
        <a id="link" href="ads-lease.php">Lease</a>
        <a id="link" href="ads-market-off.php">Market Off</a>
        <a id="link" href="logout.php">Log out</a>
    </div>
</div>
<!-- Navigation Section End -->

<div class="product-form">
    <h1>Edit Property</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="product-form-field">
            <label for="property_address">Street Address</label>
            <input type="text" name="property_address" id="property-address" value="<?php echo $property['ad_address']; ?>" style="margin-left: 60px; width: 200px">
        </div><br>

        <div class="product-form-field">
            <label for="property_city">City</label>
            <input type="text" name="property_city" id="property-city" value="<?php echo $property['ad_city']; ?>" style="margin-left: 10px;width:200px">
        </div><br>

        <div class="product-form-field">
            <label for="property_zipcode">Zip Code</label>
            <input type="text" name="property_zipcode" id="property-zipcode" value="<?php echo $property['ad_zipcode']; ?>" style="margin-left: 10px;width:200px">
        </div><br>

        <div class="product-form-field">
            <label for="property_price">Property Price</label>
            <input type="text" name="property_price" id="property-price" value="<?php echo $property['ad_price']; ?>" style="margin-left: 10px;width:200px">
        </div><br>

        <div class="product-form-field">
            <label for="property_bedrooms">Number of Bedrooms</label>
            <input type="text" name="property_bedrooms" id="property-bedrooms" value="<?php echo $property['ad_bedroom']; ?>" style="margin-left: 10px;width:200px">
        </div><br>

        <div class="product-form-field">
            <label for="property_bathrooms">Number of Bathrooms</label>
            <input type="text" name="property_bathrooms" id="property-bathrooms" value="<?php echo $property['ad_bathroom']; ?>" style="margin-left: 10px;width:200px">
        </div><br>

        <div class="product-form-field">
            <label for="property_size">Property Size</label>
            <input type="text" name="property_size" id="property-size" value="<?php echo $property['ad_size']; ?>" style="margin-left: 10px;width:200px">
        </div><br>

        <div class="product-form-field">
            <label for="property_commission">Agent Compensation</label>
            <input type="text" name="property_commission" id="property-commission" value="<?php echo $property['ad_commission']; ?>" style="margin-left: 10px;width:200px">
        </div><br>

        <div class="product-form-field">
            <label for="property_agent_name">Seller's Agent Name</label>
            <input type="text" name="property_agent_name" id="property-agent_name" value="<?php echo $property['ad_agent_name']; ?>" style="margin-left: 10px;width:200px;">
        </div><br>

        <div class="product-form-field">
            <label for="property_agent_phone">Seller's Agent Phone Number</label>
            <input type="text" name="property_agent_phone" id="property-agent-phone" value="<?php echo $property['ad_agent_phone']; ?>" style="margin-left: 20px;width:200px;">
        </div><br>

        <div class="product-form-field">
            <label for="property_year">Built Year</label>
            <input type="text" name="property_year" id="property-year" value="<?php echo $property['ad_year']; ?>" style="margin-left: 10px;width:200px">
        </div><br>

        <div class="product-form-field">
            <label for="property-year">Category</label>
            <?php
                $currentCategory = 'ad_category'; // Example value

                function isSelected($value, $currentCategory) {
                return $value == $currentCategory ? 'selected' : '';
                }
                ?>
            <select name="property_category" id="property_category" style="margin-left: 85px;width:260px;height: 30px;border-radius: 5px">
                <option value="sale" <?php echo isSelected('sale', $currentCategory); ?> >Sale</option>
                <option value="lease" <?php echo isSelected('lease', $currentCategory); ?>>Lease</option>
                <option value="market-off" <?php echo isSelected('market-off', $currentCategory); ?>>Market Off</option>
            </select>
            </div><br>

        <div class="product-form-field">
            <label for="property-images">Property Images</label>
            <input type="file" name="property_images[]" multiple style="margin-left: 80px;">
        </div><br>

        <?php if (!empty($property['ad_img'])): ?>
            <div class="current-images">
                <label>Current Images:</label><br>
                <?php 
                    $current_images = explode(',', $property['ad_img']);
                    foreach ($current_images as $image) {
                        echo '<img src="uploaded-Products/' . htmlspecialchars($image) . '" alt="Current Property Image" style="max-width: 200px; margin-bottom: 10px;"><br>';
                    }
                ?>
            </div>
        <?php endif; ?>
        <br>

        <input type="submit" value="Update" name="update_ad" class="product-upload-button" style="margin-left: 300px;">
    </form>
</div>

<script src="app.js"></script>
</body>
</html>
