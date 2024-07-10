<?php
$search_value = $_POST["search"];

include "conn.php";

$sql_search = "SELECT * FROM `ads` WHERE `ad_address` LIKE '%{$search_value}%'
            OR `ad_city` LIKE '%{$search_value}%'
            OR `ad_zipcode` LIKE '%{$search_value}%' 
            OR `ad_price` LIKE '%{$search_value}%'
            OR `ad_bedroom` LIKE '%{$search_value}%' 
            OR `ad_bathroom` LIKE '%{$search_value}%'
            OR `ad_year` LIKE '%{$search_value}%'
            OR `ad_size` LIKE '%{$search_value}%'
            OR `ad_commission` LIKE '%{$search_value}%'
            OR `ad_agent_name` LIKE '%{$search_value}%'
            OR `ad_agent_phone` LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql_search) or die("SQL Query for load data Failed");
 
if(mysqli_num_rows($result) > 0){
    echo '<div id="ads-container" class="ads-flex-container">';
    while($row = mysqli_fetch_assoc($result)){
        // Decode the JSON-encoded image names
        $image_names = json_decode($row['ad_img'], true);

        echo '
        <div class="flex-item">

            <div class="dash-cart">
                <div class="dash-cart-img">';
        
        // Display main image
        if (is_array($image_names) && count($image_names) > 0) {
            echo '<img src="uploaded-Products/' . htmlspecialchars($image_names[0]) . '" alt="Product Image">';
        } else {
            echo '<img src="uploaded-Products/' . htmlspecialchars($row['ad_img']) . '" alt="Product Image">';
        }
        
        echo '
                </div>
                <div class="dash-cart-data">
                    <p class="dash-address">Street Address : ' . htmlspecialchars($row["ad_address"]) .'</p>
                    <p class="dash-sub-heading">City : ' . htmlspecialchars($row["ad_city"]) . '</p>
                    <p class="dash-sub-heading">Zip Code : ' . htmlspecialchars($row["ad_zipcode"]) . '</p>
                    <p class="dash-sub-heading">Price : ' . htmlspecialchars($row["ad_price"]) . '</p>
                    <p class="dash-sub-heading">Number of Bedrooms : ' . htmlspecialchars($row["ad_bedroom"]) . '</p>
                    <p class="dash-sub-heading">Number of Bathrooms : ' . htmlspecialchars($row["ad_bathroom"]) . '</p>
                    <p class="dash-sub-heading">Built Year : ' . htmlspecialchars($row["ad_year"]) . '</p>
                    <p class="dash-sub-heading">Build : ' . htmlspecialchars($row["ad_size"]) . ' Sq. Ft</p>
                    <p class="dash-sub-heading">Agent Commission : ' . htmlspecialchars($row["ad_commission"]) . '</p>
                    <p class="dash-sub-heading">Seller Agent name : ' . htmlspecialchars($row["ad_agent_name"]) . '</p>
                    <p class="dash-sub-heading">Seller Agent Phone : ' . htmlspecialchars($row["ad_agent_phone"]) . '</p>
                </div>
            </div>

        </div>';
    }

    echo '</div>';
    mysqli_close($conn);

} else {
    echo "<h2>No Record Found</h2>";
}
?>


