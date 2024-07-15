<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ads Listing</title>
    <link rel="stylesheet" href="dash-real.css">
    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
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
                <li><a href="https://joindash.com/our-team/"><button class="join-dash-button">Join Dash</button></a></li>
            </ul>
        </div>

        <div id="menu" onclick="openMenu()">&#9776;</div>
    </nav>
    
    <div id="nav-col">
        <div id="nav-col-links" class="nav-col-links">
            <a id="link" href="ads-sale.php">Sale</a>
            <a id="link" href="ads-lease.php">Lease</a>
            <a id="link" href="ads-market-off.php">Market Off</a>
            <a id="link" href="https://joindash.com/our-team/"></a>
        </div>
    </div>
    <!-- Nav End -->
<!-- PHP Code for getting the Data through ad_id -->
<?php
include("conn.php");

// Fetch the property details based on adid from GET parameter
$adid = $_GET["adid"];
$sql = "SELECT * FROM ads WHERE ad_id= {$adid}";
$result = mysqli_query($conn, $sql) or die('Failed to fetch data');


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
   
?>


<div class="selected-ads-details">

        <div class="selected-ads-pics-slider">
            <!-- Slick Slider HTML -->
            <div class="dash-ads-slider">

                    <div class="slick-slider">
                            <?php 
                            // Display main image
                            $image_names = json_decode($row['ad_img'], true);
                            if (is_array($image_names) && count($image_names) > 0) {
                                // Loop through each image to find the existing one and display it
                                foreach ($image_names as $image) {
                                    $image_path = "uploaded-Products/" . htmlspecialchars($image);
                                    if (file_exists($image_path)) {
                                        echo '<div class="selected-ad-slide-img"><img src="' . $image_path . '" alt="Product Image"></div>';
                                        //break; // Display only the first image
                                    }
                                }
                            } else {
                                // Single image case
                                $image_path = "uploaded-Products/" . htmlspecialchars($row['ad_img']);
                                if (file_exists($image_path)) {
                                    echo '<div><img src="' . $image_path . '" alt="Product Image"></div>';
                                } else {
                                    echo '<div><img src="default-image.jpg" alt="Default Image"></div>';
                                }
                            }
                            ?>
                    </div>
            </div>

        </div>





    <div class="selected-ads-data">
            <!-- 1 -->
             <div class="selected-ad-price">
                 <p>USD <?php echo $row['ad_price']; ?></p>
             </div>
            <!-- 2 -->
            <div class="selected-ad-data-icon">
                <img src="lmages/icons8-location-50.png" width="20" alt="" srcset="">
                <p><?php echo htmlspecialchars($row['ad_address']); ?> </p>
            </div>
            <!-- 3 -->
            <div class="selected-ad-data-icon">
                <img src="./lmages/icons8-city-buildings-50.png" width="20" alt="" srcset=""> 
                <p><?php echo htmlspecialchars($row['ad_city']); ?> || Zip-code: <?php echo htmlspecialchars($row['ad_zipcode']); ?> || Built Year : <?php echo htmlspecialchars($row['ad_year']); ?> </p>
            </div>
            <!-- 4 -->

            <div class="selected-ads-data-section-1">
                <!-- Size -->
                <div class="selected-ad-data-icon">
                <img src="lmages/icons8-measurement-24.png" width="20" alt="" srcset="">
                <p><?php echo htmlspecialchars($row['ad_size']); ?> Sq. Ft</p>
                </div>
                <!-- Beds -->
                <div class="selected-ad-data-icon">
                <img src="lmages/icons8-bedroom-50.png" width="20" alt="" srcset="">
                <p><?php echo htmlspecialchars($row['ad_bedroom']); ?> Bedroom</p>
                </div>
                <!-- Bathroom -->
                <div class="selected-ad-data-icon">
                <img src="lmages/icons8-bathroom-50.png" width="20" alt="" srcset="">
                <p><?php echo htmlspecialchars($row['ad_bathroom']); ?> Bathroom</p>
                </div>
            </div>

            <!-- 5 -->
             <div class="selected-ads-data-section-2">
                <h3>Other Details</h3>
                <p><strong>Buyer's Agent Compensation: $ </strong><?php echo htmlspecialchars($row['ad_commission']); ?>/-</p>
                <p><strong>Seller's Agent Name : </strong><?php echo htmlspecialchars($row['ad_agent_name']); ?></p>
                <p><strong>Seller's Agent Phone : </strong><?php echo htmlspecialchars($row['ad_agent_phone']); ?></p>
             </div>

        </div>

    </div>

<?php
    }
}
?> 
</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="app.js"></script>
</html>