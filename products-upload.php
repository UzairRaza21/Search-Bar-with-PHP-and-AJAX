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
    <link rel="stylesheet" href="dash-real.css">
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
                <li><a href="ads-sale.php">Sale</a></li>
                <li><a href="ads-lease.php">Lease</a></li>
                <li><a href="ads-market-off.php">Market Off</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div id="menu" onclick="openMenu()">&#9776;</div>
    </nav>
    
    <div id="nav-col" >
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
    <!-- Nav End -->

    <div class="product-form">
        <h1>Upload Ads</h1>
        <form action="product-insert.php" method="post" enctype="multipart/form-data" >

            <div class="product-form-field">
                <label for="property_address">Street Address</label>
                <input type="text" name="property_address" id="property-address" style="margin-left: 10px; width: 250px;height: 25px;border-radius: 5px">
            </div>
            <br>

            <div class="product-form-field">
            <label for="property-city">City</label>
            <input type="text" name="property_city" id="property-city" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div>
            <br>

            <div class="product-form-field">
            <label for="property-zipcode">Zip Code</label>
            <input type="text" name="property_zipcode" id="property-zipcode" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div>
            <br>

            <div class="product-form-field">
            <label for="property_price">Property Price</label>
            <input type="text" name="property_price" id="property-price" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div>
            <br>

            <div class="product-form-field">
            <label for="property-bedrooms">Number of Bedrooms</label>
            <input type="text" name="property_bedrooms" id="property-bedrooms" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div>
            <br>

            <div class="product-form-field">
            <label for="property-bathrooms">Number of Bathrooms</label>
            <input type="text" name="property_bathrooms" id="property-bathrooms" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div><br>

            <div class="product-form-field">
            <label for="property_size">Property Size</label>
            <input type="text" name="property_size" id="property-size" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div><br>

            <div class="product-form-field">
            <label for="property-commission">Agent Compensation</label>
            <input type="text" name="property_commission" id="property-commission" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div><br>

            <div class="product-form-field">
            <label for="property-agent-name">Seller's Agent Name</label>
            <input type="text" name="property_agent_name" id="property-agent_name" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div><br>

            <div class="product-form-field">
            <label for="property-agent-phone">Seller's Agent Phone</label>
            <input type="text" name="property_agent_phone" id="property-agent-phone" style="margin-left: 10px;width:250px;height: 25px;border-radius: 5px">
            </div><br>

            <div class="product-form-field">
            <label for="property-year">Built Year</label>
            <input type="text" name="property_year" id="property-year" style="margin-left: 85px;width:250px;height: 25px;border-radius: 5px">
            </div><br>

            <div class="product-form-field">
            <label for="property-year">Category</label>
            <select name="property_category" id="property_category" style="margin-left: 85px;width:260px;height: 30px;border-radius: 5px">
                <option value="sale">Sale</option>
                <option value="lease">Lease</option>
                <option value="market-off">Market Off</option>
            </select>
            </div><br>

            <div class="product-form-field">
            <label for="">Property Image</label>
            <input type="file" name="property_image[]" multiple style="margin-left: 10px;"> 
            </div><br>

            <input type="submit" value="Upload" name="upload_ad" class="product-upload-button"  style="margin-left: 250px;">
        </form>
        <br>
        <br>


        
    </div>


    

    
    <script src="app.js"></script>
  </body>
  </html>