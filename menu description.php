<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aryam coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./menu description.css">
    
    <link rel="stylesheet" href="project.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>


     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>


     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aryam coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="project.js">
    <link rel="stylesheet" href="orders.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./order.css">
    <script src="orders.js" defer></script> <!-- Correct JS file reference -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     
</head>
<body>
    <section class="section1">
        <div class="header">
            <img src="./sf/ph1.png" alt="">
            <div class="list1">
                <ul>
                    <li><a href="./project.php">HOME</a></li>
                    
                    <li><a href="./order.php">MENU</a></li>
                    <li><a href="./contact us.php">CONTACT US</a></li>
                    <li><a href="./reservation.php">RESERVATION</a></li>
                </ul>
            </div>
        </div>  
        <div class="no">
            
        </div>
    </section><br><br>
    <section class="section02">
    <div class="container">
        
        <div class="icon-cart" id="cartIcon" style="cursor: pointer;"> <!-- Added cursor: pointer -->
            <ion-icon name="cart-outline" id="svg"></ion-icon>
            <span id="cart-count">0</span> <!-- Cart count -->
        </div>
    </div>
</section>
<section class="section02">
<div class="listproduct">
    
        </div> 
        
    </section>
<div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart"></div>
        <div class="totalPriceDisplay"></div>
        <div class="btn">
            <button class="close">CLOSE</button>
            <a href="check out.php"><button class="checkOut">CHECK OUT</button></a>
        </div>
    </div>
    <!--  -->

   

    
    <?php
require 'config.php'; // Include database connection

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $product_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    if ($product_id) {
        // Fetch product details from the database
        $sql = "SELECT * FROM tblmenu WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Check if the SQL statement was prepared successfully
        if ($stmt) {
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Get product data
                $product = $result->fetch_assoc();
                ?>
                
               
                <section id='mo'>
    <div id='ml'>
        <img src="dashboard/menu/photos/<?php echo htmlspecialchars($product['photo']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>">
    </div>
    <div id='mv'>
        <h1><?php echo htmlspecialchars($product['title']); ?></h1>
        <h4><?php echo htmlspecialchars($product['price']); ?> ETB</h4>
        <p><?php echo htmlspecialchars($product['description']); ?> </p><br>
        <!-- Add data attributes for cart functionality -->
        <button class='addCart' id='but' 
            data-id="<?php echo $product['id']; ?>" 
            data-title="<?php echo htmlspecialchars($product['title']); ?>" 
            data-price="<?php echo htmlspecialchars($product['price']); ?>" 
            data-image="dashboard/menu/photos/<?php echo htmlspecialchars($product['photo']); ?>">
            Add to cart
        </button>
    </div>
</section>


                    
       
   
                <?php
            } 
            }
        } 
    } 

    






// Show selected flavour detail


// Fetch flavours from the database
$flavours = [];
$sql = "SELECT title AS name, price, description, photo AS img FROM tblmenu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $flavours[strtolower($row['name'])] = [
            'name' => $row['name'],
            'price' => $row['price'],
            'description' => $row['description'],
            'img' => $row['img']
        ];
    }
} 
// Show selected flavour detail
if (isset($_GET['flavour']) && array_key_exists($_GET['flavour'], $flavours)) {
    $flavour = $_GET['flavour'];
    $selected = $flavours[$flavour];

    echo "
    <section id='mo'>
        <div id='ml'>
            <img src='dashboard/menu/photos/{$selected['img']}' alt='{$selected['name']}'>
        </div>
        <div id='mv'>
            <h1>{$selected['name']}</h1>
            <h4>{$selected['price']} ETB</h4>
            <p>{$selected['description']}</p>
            <button class='addCart' id='but'
            data-id='{$selected['name']}' 
            data-title='" . htmlspecialchars($selected['name']) . "' 
            data-price='" . htmlspecialchars($selected['price']) . "' 
            data-image='dashboard/menu/photos/" . htmlspecialchars($selected['img']) . "'>
            Add to cart
            </button>
        </div>
    </section><br><br>";
}

?>

<h1 id="h">Description</h1>
<h1 id="p">Related products</h1><br>

<div class="flavor1">
    <?php
    $counter = 0;
    $selectedFlavour = isset($_GET['flavour']) ? $_GET['flavour'] : null;
    
    foreach ($flavours as $key => $flavour):
        if ($key == $selectedFlavour) {
            continue;
        }
        if ($counter >= 4) {
            break;
        }
        $counter++;
    ?>
    <img src="dashboard/menu/photos/<?= $flavour['img'] ?>" alt="<?= $flavour['name'] ?>">
        <div class="f">
            <h1><?= $flavour['name'] ?></h1>
            <p><?= $flavour['description'] ?></p>
            <div class="order">
                <a id="see" href="menu description.php?flavour=<?= $key ?>">SEE DETAIL</a>
            </div>
        </div>
    <?php endforeach; ?>
</div><br><br><br>










    

<!-- footer -->
<footer><br><br><br><br>
    <div id="col">
        <div id="wave1">
            <div id="wave">
              <img  src="./sf/ph1.png">
              
            </div>
            <div id="social">
                <p>Connect with Us Across Social Media Platforms.</p>
                <a id="pol" href=""><ion-icon name="logo-instagram" id="sos"></ion-icon></a>
                <a id="pol" href=""><ion-icon name="logo-tiktok" id="sos"></ion-icon></a>
            </div>
        </div>
        <div id="col2">
            <div>
                <div>
                   <h5>USEFUL LINKS</h5>
                </div>
                <div>
                <a href="./project.php">HOME</a><br>
                
                <a href="./orde.php">MENU</a><br>
                <a id="pol" href="./contact us.php">CONTACT US</a><br>
                <a href="./reservation.php">RESERVATION</a><br>
                </div>
            </div>
            <div>
                <div>
                   <h5>OUR COLLECTIONS</h5>
                </div>
                <div>
                <a href="./order.php">Ethiopian coffee</a><br>
                        <a href="./order.php">Brazilian coffee</a><br>
                        <a href="./order.php">Italian coffee</a><br>
                        <a href="../order.php">Turkish coffee</a><br>
                        <a href="./order.php">Colombian coffee</a><br>
                       <a href="./order.php">Mexican coffee</a><br>
                        <a href="./order.php">Ugandan coffee</a><br>
                        <a href="./order.php">Kenyan coffee</a><br>
                </div>
            </div>
            <div>
                <div>
                   <h5>CONTACT US</h5>
                </div>
                <div id="con">
                   <p>Addis Ababa <br>
                    Ethiopia</p><br>
                   <p><b>Phone:</b>0999999999</p>
                   <p><b>E-mail:</b>aryamcoffee@gmail.com</p>
                </div>
            </div>
        </div><br><br>
    </div>
    
</footer><br>



<p id="me">© Copyright <b>Aryam Coffee</b> 2024. All Rights Reserved</p>       
<p id="me"> Developed by leul</p>




<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
<script src="order.js"></script>
</body>
<script src="project.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    // Add Event Listener for the Add to Cart Button
    document.querySelector('.addCart').addEventListener('click', (event) => {
        let productElement = event.target;
        let product_id = productElement.dataset.id;
        let product_name = productElement.dataset.title;
        let product_image = productElement.dataset.image;
        let product_price = parseFloat(productElement.dataset.price);

        if (isNaN(product_price)) {
            console.error('Invalid price for product:', productElement);
            return; // Prevent adding if price is invalid
        }

        addToCart(product_id, product_name, product_image, product_price);
    });
</script>

</html>