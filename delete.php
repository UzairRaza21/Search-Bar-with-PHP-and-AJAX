<!-- Delete Start -->
<?php

include("conn.php");
$adid = $_GET["adid"];
$sql = "DELETE FROM `ads` WHERE ad_id = '{$adid}'";
$result = mysqli_query($conn, $sql) or die ("Query Unsuccessful");
header("location: productlist.php");
mysqli_close($conn);

?>

<!-- Delete End -->