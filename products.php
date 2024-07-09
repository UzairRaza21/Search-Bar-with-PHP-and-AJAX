
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ads Listing</title>
    <!-- <link rel="stylesheet" href="property.css"> -->
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <!-- Nav Start -->
    <nav>
        <div id="logo-pic">
            <img src="lmages/dash-logo.jpg" alt="threads" width="180" height="60">
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
            <img src="lmages/hamburger.png" alt="menu" width="20">
        </div>
    </nav>
    
    <div id="nav-col" >
        <div id="nav-col-links" class="nav-col-links">
                    <a id="link" href="dashboard.php">Dashboard</a>
                    <a id="link" href="products-upload.php">Upload Ads</a>
                    <a id="link" href="productlist.php">Ads List</a>
                    <a id="link" href="products.php">Goto Website</a>
                    <a id="link" href="logout.php">Logout</a>
                    
        </div>
    </div>
    <!-- Nav End -->
<div class="ads-hero-section">
    <h1>Property Listings</h1>
</div>

<!-- Live Search HTML Code Start -->
<div class="ads-search-bar" >
    <label for="Search">Search :</label>
    <input type="text" id="search" autocomplete="off">
</div>

<tr>
    <td id="table-data"></td>
</tr>

<!-- Live Search HTML Code End -->

<!-- Products Uploaded with PHP start -->
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

    <div class="ads-flex-container">

    
        <div class="flex-item" id="product-cart">

            <div class="dash-cart">
                    <!-- Cart display Product Start-->
                    <div class="dash-cart-img"><?php echo "<img src='uploaded-Products/".$row['ad_img']."' >"  ?></div>

                    <div class="dash-cart-data">
                    <p class="dash-address"><?php echo $row['ad_address']?></p>
                    <p class="dash-commission">Agent Commission: $<?php echo $row['ad_commission']?></p>
                    <p class="dash-year">Built Year :  <?php echo $row['ad_year']?></p>
                    <p class="dash-price">Price : $<?php echo $row['ad_price']?></p>
                    <p class="dash-area">Build : <?php echo $row['ad_size']?> yards</p>
                    </div>

                    <!-- Cart display Product End -->
            </div>            

        </div>

    </div>
     <?php
            }
        }else {
            echo "<h4>No Products</h4>";
        };
        ?>
<!-- Product Cart HTML End -->
     
<!-- Products Uploaded with PHP end -->
    


    <script src="app.js"></script>
<!-- Live Search -->
    <script>

    $('#search').on("keyup",function(){
        var search_term = $(this).val();
        $.ajax({
            url : "ajax-live-search.php",
            type : "POST",
            data : {search:search_term},
            success : function(data){
                $("#table-data").html(data);
            } 

        })
    });

    </script>
  </body>
  </html>