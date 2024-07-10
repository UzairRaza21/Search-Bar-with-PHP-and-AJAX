<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ads Listing</title>
    <!-- Uncomment the line below if property.css is needed -->
    <!-- <link rel="stylesheet" href="property.css"> -->
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <!-- Nav Start -->
    <nav>
        <div id="logo-pic">
            <img src="images/dash-logo-removebg.png" alt="threads" width="180" height="60">
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
            <img src="images/hamburger.png" alt="menu" width="20">
        </div>
    </nav>
    
    <div id="nav-col">
        <div id="nav-col-links" class="nav-col-links">
            <a href="dashboard.php">Dashboard</a>
            <a href="products-upload.php">Upload Ads</a>
            <a href="productlist.php">Ads List</a>
            <a href="products.php">Goto Website</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <!-- Nav End -->

    <div class="ads-hero-section">
        <h1>Property Listings</h1>
    </div>

    <!-- Live Search HTML Code Start -->
    <div class="ads-search-bar" >
        <label for="search">Search :</label>
        <input type="text" id="search" autocomplete="off" placeholder="Search Property here">
    </div>
    <!-- Live Search HTML Code End -->

    <!-- Products Uploaded with PHP start -->
    <div id="ads-container" class="ads-flex-container" >
        <?php
            include("conn.php");
            $sql = "SELECT * FROM `ads`";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
        ?>
        
        <!-- Product Cart HTML Start -->
        <?php
            if ($row > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="flex-item">
                <div class="dash-cart" id="dash-cart-data">
                    <!-- Cart display Product Start -->
                    <div class="dash-cart-img">
                        <?php echo "<img src='uploaded-Products/" . $row['ad_img'] . "' >"; ?>
                    </div>
                    <div class="dash-cart-data">
                        <p class="dash-address">Street Address : <?php echo $row['ad_address']; ?></p>
                        <p class="dash-sub-heading">City : <?php echo $row['ad_city']; ?></p>
                        <p class="dash-sub-heading">Zip Code : <?php echo $row['ad_zipcode']; ?></p>
                        <p class="dash-sub-heading">Price : $<?php echo $row['ad_price']; ?></p>
                        <p class="dash-sub-heading">Number of Bedrooms : <?php echo $row['ad_bedroom']; ?></p>
                        <p class="dash-sub-heading">Number of Bathrooms : <?php echo $row['ad_bathroom']; ?></p>
                        <p class="dash-sub-heading">Built Year : <?php echo $row['ad_year']; ?></p>
                        <p class="dash-sub-heading">Size : <?php echo $row['ad_size']; ?> Sq Ft.</p>
                        <p class="dash-sub-heading">Buyer's Agent Compensation: $<?php echo $row['ad_commission']; ?></p>
                        <p class="dash-sub-heading">Seller's Agent Name : <?php echo $row['ad_agent_name']; ?></p>
                        <p class="dash-sub-heading">Seller's Agent Phone : <?php echo $row['ad_agent_phone']; ?></p>
                    </div>
                    <!-- Cart display Product End -->
                </div>
            </div>

        <?php
                }
            } else {
                echo "<h4>No Products</h4>";
            }
        ?>
        <!-- Product Cart HTML End -->
    </div>
    <!-- Products Uploaded with PHP end -->

    <script src="jquery.js"></script>
    <script src="app.js"></script>
    <!-- Live Search -->
    <script>
        $(document).ready(function(){
            $('#search').on("keyup", function(e) {
                var search_term = $(this).val();
                $.ajax({
                    url: "ajax-live-search.php",
                    type: "POST",
                    data: { search: search_term },
                    success: function(data) {
                        if (data) {
                            $("#ads-container").html(data);
                        } else {
                            $("#ads-container").html("<h4>No Products</h4>");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
