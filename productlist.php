<?php
session_start();
include "conn.php";
if (!isset($_SESSION['admin_name'])){
    header("location: index.php");
    exit; // Add exit after header redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dash-real.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color: whitesmoke;">

<!-- Nav Start -->
<nav>
    <div id="logo-pic">
        <img src="lmages/dash-logo-removebg.png" alt="threads" width="180" height="60">
    </div>
    
    <div>
        <ul id="nav-links">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="products-upload.php">Upload Ads</a></li>
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
<!-- Nav End -->


<!-- Table Start -->
<div class="w-100 auto my-8">
    <?php
    include('conn.php');
    $sql = "SELECT * FROM ads";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Street Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Zip Code</th>
                    <th scope="col">Price</th>
                    <th scope="col">No. of Bedrooms</th>
                    <th scope="col">No. of Bathrooms</th>
                    <th scope="col">Size</th>
                    <th scope="col">Agent Compensation</th>
                    <th scope="col">Agent's Name</th>
                    <th scope="col">Agent's Phone</th>
                    <th scope="col">Built Year</th>
                    <th scope="col">Category</th>
                    <th scope="col">Property Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    // Get main image (first image) from the list of images
                    $images = explode(',', $row['ad_img']);
                    $main_image = $images[0]; // First image as main image
 
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['ad_id']; ?></th>
                        <td><?php echo $row['ad_address']; ?></td>
                        <td><?php echo $row['ad_city']; ?></td>
                        <td><?php echo $row['ad_zipcode']; ?></td>
                        <td><?php echo $row['ad_price']; ?></td>
                        <td><?php echo $row['ad_bedroom']; ?></td>
                        <td><?php echo $row['ad_bathroom']; ?></td>
                        <td><?php echo $row['ad_size']; ?></td>
                        <td><?php echo $row['ad_commission']; ?></td>
                        <td><?php echo $row['ad_agent_name']; ?></td>
                        <td><?php echo $row['ad_agent_phone']; ?></td>
                        <td><?php echo $row['ad_year']; ?></td>
                        <td><?php echo $row['ad_category']; ?></td>
                        <td><?php echo "<img style='width: 150px; height: 80px; border-radius: 5px;' src='uploaded-Products/" . $main_image . "' >"; ?></td>
                        <td>
                            <!-- Edit button -->
                            <a href="edit.php?adid=<?php echo $row['ad_id']; ?>">
                                <button type="button" class="btn btn-dark">Edit</button>
                            </a>
                            <!-- Delete button -->
                            <a href="delete.php?adid=<?php echo $row['ad_id']; ?>">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "<h3>No Record Found</h3>";
    }
    mysqli_close($conn);
    ?>
</div>
<!-- Table End -->

<script src="app.js"></script>
</body>
</html>
