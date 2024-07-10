<?php
session_start();
include "conn.php";
if (!isset($_SESSION['admin_name'])){
    header("location: login-page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body style="background-color: whitesmoke;" >
    <!-- Nav Start -->
    <nav>
        <div id="logo-pic">
            <img src="lmages/dash-logo.jpg" alt="threads" width="180" height="60">
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
        <h1>Upload Ads</h1>
        <form action="product-insert.php" method="post" enctype="multipart/form-data" >

            <label for="property_address">Street Address
                <input type="text" name="property_address" id="property-address" style="margin-left: 30px; width: 250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property-city">City
                <input type="text" name="property_city" id="property-city" style="margin-left: 20px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property-zipcode">Zip Code
                <input type="text" name="property_zipcode" id="property-zipcode" style="margin-left: 20px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property_price">Property Price
                <input type="text" name="property_price" id="property-price" style="margin-left: 53px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property-bedrooms">Number of Bedrooms
                <input type="text" name="property_bedrooms" id="property-bedrooms" style="margin-left: 20px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property-bathrooms">Number of Bathrooms
                <input type="text" name="property_bathrooms" id="property-bathrooms" style="margin-left: 20px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property_size">Property Size
                <input type="text" name="property_size" id="property-size" style="margin-left: 60px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property-commission">Agent Compensation
                <input type="text" name="property_commission" id="property-commission" style="margin-left: 20px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property-agent-name">Seller's Agent Name
                <input type="text" name="property_agent_name" id="property-agent_name" style="margin-left: 20px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="property-agent-phone">Seller's Agent Phone Number
                <input type="text" name="property_agent_phone" id="property-agent-phone" style="margin-left: 20px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>


            <label for="property-year">Built Year
                <input type="text" name="property_year" id="property-year" style="margin-left: 85px;width:250px;height: 25px;border-radius: 5px">
            </label><br><br>

            <label for="">Property Image
                <input type="file" name="property_image" style="margin-left: 45px;"> <br><br>
            </label><br><br>

            <input type="submit" value="Upload" name="upload_ad" class="product-upload-button"  style="margin-left: 180px;">
        </form>
        <br>
        <br>


        
    </div>


    

    
    <script src="app.js"></script>
  </body>
  </html>