<?php
$search_value = $_POST["search"];

include "conn.php";

$sql_search = "SELECT * FROM `ads` WHERE ad_address LIKE '%{$search_value}%' OR ad_price LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql_search) or die("SQL Query for load data Failed");

$output = "";
if(mysqli_num_rows($result) > 0){
    $output = "";
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<div class="dash-cart">

                    <div class="dash-cart-img"><img src="uploaded-Products/' . $row["ad_img"] . '" alt="Ad Image"></div>

                    <div class="dash-cart-data">
                    <p class="dash-address">Street Address : ' . $row["ad_address"] . '</p>
                    <p class="dash-sub-heading">City :' . $row["ad_city"] . '</p>
                    <p class="dash-sub-heading">Zip Code : ' . $row["ad_zipcode"] . '</p>
                    <p class="dash-sub-heading">Price : ' . $row["ad_price"] . '</p>
                    <p class="dash-sub-heading">Number of Bedrooms : ' . $row["ad_bedroom"] . '</p>
                    <p class="dash-sub-heading">Number of Bathrooms : ' . $row["ad_bathroom"] . '</p>
                    <p class="dash-sub-heading">Built Year : ' . $row["ad_year"] . '</p>
                    <p class="dash-sub-heading">Build : ' . $row["ad_size"] . ' Sq. Ft</p>
                    <p class="dash-sub-heading">Agent Commission : ' . $row["ad_commission"] . '</p>
                    <p class="dash-sub-heading">Seller Agent name : ' . $row["ad_agent_name"] . '</p>
                    <p class="dash-sub-heading">Seller Agent Phone : ' . $row["ad_agent_phone"] . '</p>
                    </div>

                </div>';
    }

    $output .= '</div>';
    mysqli_close($conn);

    echo $output;

} else {
    echo "<h2>No Record Found</h2>";
}
?>
