<?php
$search_value = $_POST["search"];

include "conn.php";

$sql = "SELECT * FROM `ads` WHERE ad_address LIKE '%{$search_value}%' OR ad_price LIKE '%{$search_value}%' ";
$result = mysqli_query($conn, $sql) or die("SQL Query for Search Bar Failed");
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<div class="dash-cart-data">
                    <p class="dash-address"></p>
                    <p class="dash-commission"></p>
                    <p class="dash-year"></p>
                    <p class="dash-price"></p>
                    <p class="dash-area"></p>
            </div>';
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<div class="dash-cart-data">
                    <p class="dash-address">' . $row["ad_address"] . '</p>
                    <p class="dash-commission">Agent Commission: ' . $row["ad_commission"] . '</p>
                    <p class="dash-year">Built Year: ' . $row["ad_year"] . '</p>
                    <p class="dash-price">Price: ' . $row["ad_price"] . '</p>
                    <p class="dash-area">Build: ' . $row["ad_size"] . ' yards</p>
                </div>';
    };

    $output .= '</div>';
    mysqli_close($conn);

    echo $output;

} else {
    echo "<h2>No Record Found</h2>";
}
?>
