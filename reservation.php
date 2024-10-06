<?php
require "config.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $branch = $_POST['branch'];
    $sit = $_POST['sit'];

    // Correct the SQL query to include the table name and correct syntax for columns
    $sql = "INSERT INTO tblreservation (name, email, pnumber, date, time, branch, sit) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $email, $pnumber, $date, $time, $branch, $sit);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close(); // Close the database connection
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aryam coffee</title>
    <link rel="stylesheet" href="reservation.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./order.css">
    <script src="orders.js" defer></script> <!-- Correct JS file reference -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
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
                    <li><a id="active" href="./reservation.php">RESERVATION</a></li>
                </ul>
            </div> 
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
    <section id="car">
    <h1 id="lo">RESERVATION</h1 ><br>




    <form action="" method="POST" id="ff">
    NAME: <input type="text" name="name" id="name" autocomplete="off" required 
                pattern="[A-Za-z\s]+" title="Please enter letters only."><br><br>
    EMAIL: <input type="email" name="email" id="email" autocomplete="off" required><br><br>
    PHONE NUMBER: <input type="tel" name="pnumber" id="phone" 
                pattern="(\+2519[0-9]{8}|09[0-9]{8})" 
                title="Please enter a valid phone number starting with +251 or 07" 
                autocomplete="off" required><br><br>
    DATE: <input type="date" name="date" id="date" autocomplete="off" required><br><br>
    TIME: <input type="time" name="time" id="time" autocomplete="off" required><br><br>
    BRANCH: 
    <input type="radio" name="branch" value="Kality" required>KALITY
    <input type="radio" name="branch" value="Saris" required>SARIS
    <input type="radio" name="branch" value="Rwanda" required>RWANDA <br><br>
    NUMBER OF SIT: <input type="number" name="sit" id="sit" min="1" max="100" autocomplete="off" required><br><br>
    
    <input type="submit" id="su">
</form><br><br><br><br>

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
                        <a  href="./reservation.php">RESERVATION</a><br>
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



    
    
</body>
<script src="orders.js"></script>
<script src="project.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
document.getElementById('ff').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

    // Validate if the selected date is in the past
    if (dateInput.value < today) {
        alert("Please select a date in the future.");
        return; // Exit the function if the date is invalid
    }

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;

    // Popup message
    alert(`Thank you, ${name}! Your reservation request has been received. We will send you an Email is it accepted or not`);

    // Remove the event.preventDefault(); and submit the form
    setTimeout(() => {
        this.submit(); 
        
    }, 2000);
    
});

</script>





</html>