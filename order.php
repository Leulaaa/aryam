<?php
require_once 'config.php';

$sql = "SELECT id, photo, title, price FROM tblmenu";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aryam Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./order.css">
    <script src="orders.js" defer></script> <!-- Correct JS file reference -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</head>
<body>
    <section class="section1">
        <div class="header">
            <img src="./sf/ph1.png" alt="Aryam Coffee Logo">
            <div class="list1">
                <ul>
                    <li><a href="./project.php">HOME</a></li>
                    <li><a id="active" href="./order.php">MENU</a></li>
                    <li><a href="./contact us.php">CONTACT US</a></li>
                    <li><a href="./reservation.php">RESERVATION</a></li>
                </ul>
            </div> 
        </div>
    </section>

    <section class="section02">
    <div class="container">
        <div class="title">PRODUCT LIST</div>
        <div class="icon-cart" id="cartIcon" style="cursor: pointer;"> <!-- Added cursor: pointer -->
            <ion-icon name="cart-outline" id="svg"></ion-icon>
            <span id="cart-count">0</span> <!-- Cart count -->
        </div>
    </div>
</section>

<section class="section02">
<div class="listproduct">
    <?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="item" data-id="'.$row["id"].'" data-title="'.$row["title"].'" data-price="'.$row["price"].'" data-image="dashboard/menu/photos/'.$row["photo"].'">';
        echo '<a href="menu description.php?id='.$row["id"].'"><img src="dashboard/menu/photos/'.$row["photo"].'" alt="'.$row["title"].'"></a>';
        echo '<h2>'.$row["title"].'</h2>';
        echo '<div class="price">'.$row["price"].' ETB</div>'; // Ensure you add "ETB" for clarity
        echo '<button class="addCart">Add To Cart</button>';
        echo '</div>';
    }
} else {
    echo '<p>No products available</p>';
}
?>
        </div> 
        
    </section>


    <!-- Cart Page (Hidden by default) -->
    <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart"></div>
        <div class="totalPriceDisplay"></div>
        <div class="btn">
            <button class="close">CLOSE</button>
            <button id="checkoutButton">Checkout</button>


        </div>
    </div><br><br><br><br>


    <!-- footer -->
    <footer><br><br><br><br>
        <div id="col">
            <div id="wave1">
                <div id="wave">
                    <img src="./sf/ph1.png" alt="Aryam Coffee Logo">
                </div>
                <div id="social">
                    <p>Connect with Us Across Social Media Platforms.</p>
                    <a id="pol" href="#"><ion-icon name="logo-instagram" id="sos"></ion-icon></a>
                    <a id="pol" href="#"><ion-icon name="logo-tiktok" id="sos"></ion-icon></a>
                </div>
            </div>
            <div id="col2">
                <div>
                    <h5>USEFUL LINKS</h5>
                    <a href="./project.php">HOME</a><br>
                    <a href="./order.php">MENU</a><br>
                    <a href="./contact us.php">CONTACT US</a><br>
                    <a href="./reservation.php">RESERVATION</a><br>
                </div>
                <div>
                    <h5>OUR COLLECTIONS</h5>
                    <a href="./order.php">Ethiopian coffee</a><br>
                    <a href="./order.php">Brazilian coffee</a><br>
                    <a href="./order.php">Italian coffee</a><br>
                    <a href="./order.php">Turkish coffee</a><br>
                    <a href="./order.php">Colombian coffee</a><br>
                    <a href="./order.php">Mexican coffee</a><br>
                    <a href="./order.php">Ugandan coffee</a><br>
                    <a href="./order.php">Kenyan coffee</a><br>
                </div>
                <div id="con">
                    <h5>CONTACT US</h5>
                    <p>Addis Ababa, Ethiopia</p>
                    <p><b>Phone:</b> 0999999999</p>
                    <p><b>E-mail:</b> aryamcoffee@gmail.com</p>
                </div>
            </div><br><br>
        </div>
    </footer><br>

    <p id="me">© Copyright <b>Aryam Coffee</b> 2024. All Rights Reserved</p>       
    <p id="me">Developed by leul</p>

    <script src="orders.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
