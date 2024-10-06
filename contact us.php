<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
   
    

    // Correct the SQL query to include the table name and correct syntax for columns
    $sql = "INSERT INTO tblcontact (name, email, pnumber, subject, message) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $pnumber, $subject, $message);

    if ($stmt->execute()) {
        
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="contact us.css">
    <link rel="stylesheet" href="project.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>


     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./order.css">
    <script src="orders.js" defer></script> <!-- Correct JS file reference -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css"/>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>
  <body>
    <section class="section1">
        <div class="header">
            <img src="./sf/ph1.png" alt="">
            <div class="list1">
                <ul>
                    <li><a href="./project.php">HOME</a></li>
                    <li><a href="./order.php">MENU</a></li>
                    
                    <li><a id="active" href="./contact us.php">CONTACT US</a></li>
                    <li><a href="./reservation.php">RESERVATION</a></li>
                </ul>
            </div>
        </div>  

    <br><br>
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
    <section>
    

    <!-- section 2 -->
    <h1 id="contactss">CONTACT US</h1 ><br>
      <section id="fto" >
    <div class="location">
      <div  id="map"></div>
     
    </div><br><br>
    
        <div class="contact">
        <form action="" method="POST" id="contact-form">
    <div class="input-box">
        <div class="input-field field">
            <input type="text" placeholder="Full Name" name="name" id="name" 
            class="item" autocomplete="off" required 
            pattern="[A-Za-z\s]+" title="Please enter letters only.">
        </div>
        <div class="input-field field">
            <input type="email" placeholder="Email Address" id="email" name="email"
            class="item" autocomplete="off" required>
        </div>
    </div>
    <div class="input-box">
        <div class="input-field field">
            <input type="tel" placeholder="Phone Number" id="phone" name="pnumber"
            class="item" autocomplete="off" required 
            pattern="(\+2519[0-9]{8}|09[0-9]{8})"  title="Please enter a valid phone number (e.g., +251123456789)">
        </div>
        <div class="input-field field">
            <input type="text" placeholder="Subject" id="subject" name="subject"
            class="item" autocomplete="off" required 
            pattern="[A-Za-z\s]+" title="Please enter letters only.">
        </div>
    </div>

    <div class="textarea-field field">
        <textarea name="message" id="message" cols="30" rows="10" 
        placeholder="Your Message" class="item" 
        autocomplete="off" required 
        pattern="[A-Za-z\s]+" title="Please enter letters only."></textarea>
    </div>

    <button type="submit">Send Message</button>
</form><br>

        <div class="col-sm-12 col-md-12 col-lg-4"><br><br><br>
            <div class="contact-info white">
              <div class="contact-item media"> <i class="fa fa-map-marker-alt media-left media-right-margin"></i>
                <div class="media-body">
                  <p class="text-uppercase">Address</p>
                  <p class="text-uppercase">Kality,Saris, Rwanda</p>
                </div>
              </div>
              <div class="contact-item media"> <i class="fa fa-mobile media-left media-right-margin"></i>
                <div class="media-body">
                  <p class="text-uppercase">Phone</p>
                  <p class="text-uppercase" id="si"><a class="" href="tel:+15173977100" id="si">+2519999999</a> </p>
                </div>
              </div>
              <div class="contact-item media"> <i class="fa fa-envelope media-left media-right-margin"></i>
                <div class="media-body">
                  <p class="text-uppercase">E-mail</p>
                  <p class="text-uppercase"><a class="" href="mailto:abcdefg@gmail.com" id="si">aryamcoffee@gmail.com</a> </p>
                </div>
              </div>
              <div class="contact-item media"> <i class="fa fa-clock media-left media-right-margin"></i>
                <div class="media-body">
                  <p class="text-uppercase">Working Hours</p>
                  <p class="text-uppercase">Mon-Sun 6.00 AM to 10.00PM.</p>
                </div>
              </div>
            </div>
          </div>
    </div>
    
    </section><br><br>


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



    <!-- js -->
    <script src="orders.js"></script>
    <script src="project.js"></script>
    <script src="project.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get values from the input fields
        const name = document.getElementById('name').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        const phone = document.getElementById('phone').value;

        // Validate Full Name
        if (!/^[A-Za-z\s]+$/.test(name)) {
            alert("Full Name must contain letters only.");
            return;
        }

        // Validate Subject
        if (!/^[A-Za-z\s]+$/.test(subject)) {
            alert("Subject must contain letters only.");
            return;
        }

        // Validate Message
        if (!/^[A-Za-z\s]+$/.test(message)) {
            alert("Your Message must contain letters only.");
            return;
        }

        // If all validations pass, you can submit the form or handle it as needed
        alert("Thank you! Your message has been sent.");
        this.submit(); // Submit the form
    });
</script>
  </body>
</html>