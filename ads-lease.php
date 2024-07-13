<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ads Listing</title>
    <link rel="stylesheet" href="dash-real.css">
    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
</head>
<body>
    <!-- Nav Start -->
    <nav>
        <div id="logo-pic">
            <img src="lmages/dash-logo-removebg.png" alt="threads" width="180" height="60">
        </div>
        
        <div>
            <ul id="nav-links">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="ads-sale.php">Sale</a></li>
                <li><a href="ads-lease.php">Lease</a></li>
                <li><a href="ads-market-off.php">Market Off</a></li>
                <li><a href="">Join Dash</a></li>
            </ul>
        </div>

        <div id="menu" onclick="openMenu()">
            <img src="images/hamburger.png" alt="menu" width="20">
        </div>
    </nav>
    
    <div id="nav-col">
        <div id="nav-col-links" class="nav-col-links">
            <a id="link" href="ads-sale.php">Sale</a>
            <a id="link" href="ads-lease.php">Lease</a>
            <a id="link" href="ads-market-off.php">Market Off</a>
            <a id="link" href="">Join Dash</a>
        </div>
    </div>
    <!-- Nav End -->

    <div class="ads-hero-section">
        <h1>Property Listings-Lease</h1>
    </div>

    <!-- Live Search HTML Code Start -->
    <div class="ads-search-bar" >
        <label for="search">Search :</label>
        <input type="text" id="search" autocomplete="off" placeholder="Search Property here">
    </div>
    <!-- Live Search HTML Code End -->

    <!-- Products Uploaded with PHP start -->

    <div id="ads-container" class="ads-flex-container">
        <?php
        include("conn.php");
        $sql = "SELECT * FROM ads WHERE `ad_category` = 'lease'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?> 
                <div class="flex-item">
                    <div class="dash-cart">
                        <div class="dash-cart-img">
                            <?php 
                            // Display main image
                            $image_names = json_decode($row['ad_img'], true);
                            if (is_array($image_names) && count($image_names) > 0) {
                                // Loop through each image to find the existing one and display it
                                foreach ($image_names as $image) {
                                    $image_path = "uploaded-Products/" . htmlspecialchars($image);
                                    if (file_exists($image_path)) {
                                        echo '<img src="' . $image_path . '" alt="Product Image">';
                                        break; // Display only the first image
                                    }
                                }
                            } else {
                                // Single image case
                                $image_path = "uploaded-Products/" . htmlspecialchars($row['ad_img']);
                                if (file_exists($image_path)) {
                                    echo '<img src="' . $image_path . '" alt="Product Image">';
                                } else {
                                    echo '<img src="default-image.jpg" alt="Default Image">';
                                }
                            }
                            ?>
                        </div>

                        <div class="dash-cart-data">
                            <p class="dash-address">Street Address : <?php echo htmlspecialchars($row['ad_address']); ?></p>
                            <p class="dash-sub-heading">City : <?php echo htmlspecialchars($row['ad_city']); ?></p>
                            <p class="dash-sub-heading">Zip Code : <?php echo htmlspecialchars($row['ad_zipcode']); ?></p>
                            <p class="dash-sub-heading">Price : $<?php echo htmlspecialchars($row['ad_price']); ?></p>
                            <p class="dash-sub-heading">Number of Bedrooms : <?php echo htmlspecialchars($row['ad_bedroom']); ?></p>
                            <p class="dash-sub-heading">Number of Bathrooms : <?php echo htmlspecialchars($row['ad_bathroom']); ?></p>
                            <p class="dash-sub-heading">Built Year : <?php echo htmlspecialchars($row['ad_year']); ?></p>
                            <p class="dash-sub-heading">Size : <?php echo htmlspecialchars($row['ad_size']); ?> Sq Ft.</p>
                            <p class="dash-sub-heading">Buyer's Agent Compensation: $<?php echo htmlspecialchars($row['ad_commission']); ?></p>
                            <p class="dash-sub-heading">Seller's Agent Name : <?php echo htmlspecialchars($row['ad_agent_name']); ?></p>
                            <p class="dash-sub-heading">Seller's Agent Phone : <?php echo htmlspecialchars($row['ad_agent_phone']); ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h4>No Property Found</h4>";
        }

        mysqli_close($conn);
        ?>
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
                    url: "ajax-live-search-lease.php",
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
