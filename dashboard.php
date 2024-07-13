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
    <link rel="stylesheet" href="dash-real.css">
    <title>Admin Dashboard</title>
</head>
<body style="background-color: whitesmoke;">

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

<div id="nav-col">
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

<?php
// Establish database connection (assuming $conn is defined elsewhere)
include 'conn.php'; // Assuming your database configuration is in a separate file

// SQL query to get the total number of ads
$sql = "SELECT COUNT(*) AS total_ads FROM ads";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_ads = $row['total_ads'];
} else {
    $total_ads = 0; // Default value if no ads found
}

mysqli_close($conn); // Close the database connection
?>

<div class="dashboard-section" >
    <div class="dashboard-total-ads">
        <h3><?php echo $total_ads; ?></h3>
        <h2>Total Number of Ads on Website</h2>
    </div>
</div>

<script src="app.js"></script>

</body>
</html>
