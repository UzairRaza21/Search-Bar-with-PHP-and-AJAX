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
                    <p class="dash-address">' . $row["ad_address"] . '</p>
                    <p class="dash-commission">Agent Commission: ' . $row["ad_commission"] . '</p>
                    <p class="dash-year">Built Year: ' . $row["ad_year"] . '</p>
                    <p class="dash-price">Price: ' . $row["ad_price"] . '</p>
                    <p class="dash-area">Build: ' . $row["ad_size"] . ' yards</p>
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
