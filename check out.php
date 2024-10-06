<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $country = $_POST['country'];
  $town = $_POST['town'];
  $homeno = $_POST['homeno'];
  $pnumber = $_POST['pnumber'];
  $email = $_POST['email'];
  $additional = $_POST['additional'];

  // Check if products are being received correctly
  $products = json_decode($_POST['products'], true);
  if (!$products) {
      die('No products data received.');
  }

  foreach ($products as $product) {
      $pname = $product['pname'];
      $quantity = $product['quantity'];
      $price = $product['price'];
      $totalprice = $product['totalprice'];

      $sql = "INSERT INTO tblorder(pname, quantity, price, totalprice, fname, lname, country, town, homeno, pnumber, email, additional)
              VALUES ('$pname', '$quantity', '$price', '$totalprice', '$fname', '$lname', '$country', '$town', '$homeno', '$pnumber', '$email', '$additional')";

      if ($conn->query($sql) === true) {
          echo "Product $pname order created successfully.<br>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aryam coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./check out.css">
    
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
     
</head>
<body>
  <style>
    #h{
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: #d45206;
    font-weight: 600;
    font-size: 45px;
    }
    #aa{
      color:yellow;
    }
    .checkout-cart{
      
 
 
  width: 110%;
  height: 300px;
  overflow: auto;
  
    }
  </style>
    <section class="section1">
        <div class="header">
            <img src="./sf/ph1.png" alt="">
            <div class="list1">
                <ul id="sc">
                    <li><a href="./project.php">HOME</a></li>
                    
                    <li><a href="./order.php">MENU</a></li>
                    <li><a href="./contact us.php">CONTACT US</a></li>
                    <li><a href="./reservation.php">RESERVATION</a></li>
                </ul>
            </div>
        </div>  
        <div class="no">
            
        </div>
    </section><br>
    <section class="section02">
    <div class="container">
        <h1 id="h">YOUR ORDER</h1><br>
        <div class="checkout-cart" action="" method="POST">
            <div  class="listCart"></div> <!-- Cart items will be displayed here -->
            <div id="aa" name="totalprice" class="totalPriceDisplay" ></div> <!-- Total price will be displayed here -->
        </div>
    </div>
</section>



    <!--  -->
    <form action="check_out.php" method="POST" enctype="multipart/form-data">

    <div>
        <h3 id="hha" class="">Billing Details</h3>
        <div id="do">
            <label>
                <input type="text" class="input" name="fname" placeholder="First Name" autocomplete="off" required />
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label id="ds">
                <input type="text" class="input" name="lname" placeholder="Last Name" autocomplete="off" required />
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
        </div>
        <label>
            <p id="ca">COUNTRY / REGION</p>
            <select id="category" name="country" class="input" required>
                <option value="Ethiopia">ETHIOPIA</option>
            </select>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <p id="ca">TOWN / CITY</p>
            <select id="category" name="town" class="input" required>
                <option value="Addis Abeba">ADDIS ABEBA</option>
            </select>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>

        <label>
            <input type="number" class="input" name="homeno" autocomplete="off" required placeholder="HOME NUMBER" />
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>

        <label>
            <input type="number" class="input" name="pnumber" autocomplete="off" required placeholder="PHONE NUMBER" />
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <input type="email" class="input" name="email" autocomplete="off" required placeholder="EMAIL" />
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>

        <!-- Hidden Inputs for Product Details -->
        <input type="hidden" name="pname" value="" id="pname">
        <input type="hidden" name="quantity" value="" id="quantity">
        <input type="hidden" name="price" value="" id="price">
        <input type="hidden" name="totalprice" value="" id="totalprice">

        <button type="submit">PLACE ORDER</button>
    </div>

    <div id="fsd">
        <h3 id="hha" class="">Additional Information</h3>
        <label>
            <input type="text" class="input" name="additional" autocomplete="off" placeholder="NOTE ABOUT YOUR ORDER (Optional)" />
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
    </div>
</form>
<br><br><br>
    
    
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
                
                <a href="./order.php">MENU</a><br>
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
</body>
<script src="project.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
// Load cart from localStorage
let carts = JSON.parse(localStorage.getItem('carts')) || [];
let listCartHTML = document.querySelector('.listCart');
let totalPriceDisplay = document.querySelector('.totalPriceDisplay');

// Function to render the cart on checkout page
const renderCheckoutCart = () => {
    listCartHTML.innerHTML = '';
    let totalPrice = 0;

    if (carts.length > 0) {
        carts.forEach(cart => {
            let itemTotalPrice = cart.price * cart.quantity;

            let cartItem = document.createElement('div');
            cartItem.classList.add('item');
            cartItem.innerHTML = `
                <section id="section02">
                    <div class="table">
                        <ul>
                            <li><br>
                                <div class="image">
                                    <img id="daa" src="${cart.image}" alt="${cart.name}">
                                </div>
                                <div class="name">${cart.name}</div>
                            </li>
                            <li id="ts">Quantity<br>
                                <div class="quantity">${cart.quantity}</div>
                            </li>
                            <li id="tf">Price<br>
                                <div class="totalPrice">${itemTotalPrice.toFixed(2)} ETB</div>
                            </li>
                        </ul>
                    </div>
                </section>
            `;

            listCartHTML.appendChild(cartItem);
            totalPrice += itemTotalPrice;
        });

        totalPriceDisplay.innerText = `Total Price: ${totalPrice.toFixed(2)} ETB`;
    } else {
        listCartHTML.innerHTML = '<p>Your cart is empty</p>';
    }
};

// Clear cart after checkout
const clearCart = () => {
    localStorage.removeItem('carts');
    carts = [];
    renderCheckoutCart(); // Re-render the cart to show it's empty
};

// Check if the DOM is loaded and render the cart
document.addEventListener('DOMContentLoaded', () => {
    renderCheckoutCart();

    // Listen for the checkout button click
    const checkoutButton = document.getElementById('checkoutButton');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', () => {
            clearCart();
            window.location.href = 'check out.php';
        });
    }
});

// Add a listener to the form submit event
document.querySelector('form').addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent the default form submission

    // Prepare an array to hold all product data
    let products = carts.map(cart => ({
        pname: cart.name,
        quantity: cart.quantity,
        price: cart.price,
        totalprice: cart.price * cart.quantity
    }));

    // Create a new FormData object to send all the data
    let formData = new FormData(event.target);
    formData.append('products', JSON.stringify(products)); // Append the products array as JSON

    // Send the data via an AJAX POST request
    fetch('check out.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Check response from server
        alert('Order placed successfully!');
        clearCart(); // Clear cart after successful submission
        window.location.href = 'order.php'; // Redirect to confirmation page or another page if needed
    })
    .catch(error => console.error('Error:', error));
});




</script>

</html>