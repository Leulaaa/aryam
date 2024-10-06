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
            <a href="check out.php"><button class="checkOut">CHECK OUT</button></a>
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


<?php
require_once 'config.php';




// Fetch products from the tblmenu table




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aryam coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./order.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

        
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="orders.js" defer></script> <!-- Correct JS file reference -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    


     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

     <style>
        .flavor-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Spacing between items */
}

.flavor-item {
    flex: 1 1 30%; /* Each item takes up roughly 30% of the width */
    margin: 10px; /* Space between each item */
    box-sizing: border-box;
}

.flavor-item img {
    width: 35%;
    height: 160px;
}

.order {
    margin-top: 10px;
    margin-left:75px;
}


     </style>
     
</head>
<body>
    <section class="section1">
        <div class="header">
            <img src="./sf/ph1.png" alt="">
            <div class="list1">
                <ul class="list2">
                    <li><a id="active" href="./project.php">HOME</a></li>                   
                    <li><a href="./order.php">MENU</a></li>
                    <li><a id="pol" href="./contact us.php">CONTACT US</a></li>
                    <li><a href="./reservation.php">RESERVATION</a></li>  
                                  
                </ul>
                <section class="section2">
   
</section>


            </div>
            <div class="serch">
                <input type="text" id="search-box" placeholder="search here..">
                <label id="search" for="search-box" class="material-symbols-outlined">search</label>
                <div class="dow">
                    <ul class="dow1">
                        <li class="list-group-item p-3"><a href="./order.php">Ethiopian coffee</a></li>
                        <li class="list-group-item p-3"><a href="./order.php">Brazilian coffee</a></li>
                        <li class="list-group-item p-3"><a href="./order.php">Italian coffee</a></li>
                        <li class="list-group-item p-3"><a href="./order.php">Turkish coffee</a></li>
                        <li class="list-group-item p-3"><a href="./order.php">Colombian coffee</a></li>
                        <li class="list-group-item p-3"><a href="./order.php">Mexican coffee</a></li>
                        <li class="list-group-item p-3"><a href="./order.php">Ugandan coffee</a></li>
                        <li class="list-group-item p-3"><a href="./order.php">Kenyan coffee</a></li>                      
                    </ul>
                </div>
            </div> 
             
           
            <!-- <ul class="login">
                    <li><a class="a" href="./login.php">Log in</a></li>
                    <li><a class="b" href="./signup.php">Sign up</a></li>
            </ul> -->
            <div class="no">
                <label id="ser" for="search-box" class="material-symbols-outlined">search</label>
                <div id="person"><ion-icon name="person"></ion-icon></div>
                <div id="menu" ><ion-icon name="menu"></ion-icon></div>
            </div>
        </div>
    </section>
    <!-- section 2 -->
    <section class="section2">
    
        <div class="container">
            <div class="icon-cart" id="cartIcon" style="cursor: pointer;"> <!-- Added cursor: pointer -->
            <ion-icon name="cart-outline" id="svg"></ion-icon>
            <span id="cart-count">0</span> <!-- Cart count -->
        </div>
       <section class="section02">
      <div class="listproduct">
    
        </div> 
      </section>

    <!-- Cart Page (Hidden by default) -->
    <div class="car" id="car">
        
    <div class="cartTab" >

        <h1>Shopping Cart</h1>
        <div class="listCart"></div>
        <div class="totalPriceDisplay"></div>
        <div class="btn">
            <button class="close">CLOSE</button>
            <a href="check out.php"><button class="checkOut">CHECK OUT</button></a>
        </div>
    </div>
    </div>
    </div>
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <div id="su" class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="slide1"><br><br><br><br><br><br><br><br>
                            <h1 class="text2">COME AND DRINK COFFEE</h1>
                            <h1 class="text1">A GOOD DAY STARTS WITH A POSITIVE <br>ATTITUDE AND A GREAT CUP OF COFFEE</h1>   
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide2"><br><br><br><br><br><br><br><br>
                            <h1 class="text2">ኑ ቡና ጠጡ</h1>
                            <h1 class="text1">ጥሩ ቀን በአዎንታዊ አመለካከት <br>እና ደስ በሚል ቡና ይጀምራል</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide3"><br><br><br><br><br><br><br><br>
                            <h1 class="text2">Gel ve kahve iç</h1>
                            <h1 class="text1">İyi bir gün olumlu bir tutum <br>ve harika bir fincan kahve ile başlar</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide4"><br><br><br><br><br><br><br><br>
                            <h1 class="text2">Vieni a bere un caffè</h1> 
                            <h1 class="text1">bona dies incipit cum positivum <br>attitude et magnum calicem capuluss</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button id="lq" class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span id="wwe" class="carousel-control-prev-icon"></span>
            </button>
            <button id="lq" class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span id="wwe" class="carousel-control-next-icon"></span>
            </button>
        </div> 
            <div class="lista">
                <ul>
                    <li> <a href="#culture">CULTURE</a></li>
                    <li> <a href="#taste">TASTE</a></li>
                    <li> <a href="#roast">ROAST</a></li>
                </ul>
            </div>
            
    </section>
   
    <!-- section 3 -->
    <section  class="section3" >
        <div class="image" id="first" >
            <img  src="./sf/ph7.jpg" alt="">
            <h1>AWESOME AROMA</h1>
            <p>Welcome to our coffee cafe, indulge in the captivating aroma of our coffee cafe, where excellence is brewed to perfection. Let the enticing scent guide you to a world of sensory bliss, where each sip is a symphony of flavors. Immerse yourself in the inviting ambiance, where the rich fragrance of freshly brewed coffee envelops you in pure delight. Join us today and experience the magic of our aromatic brews that will awaken your senses and leave you craving for more.</p>
        </div>
        <div class="image"id="first" >
            <img src="./sf/ph8.jpg" alt="">
            <h1>HIGH QUALITY</h1>
            <p>Welcome to our coffee cafe, where quality is our passion. We source only the finest beans, ensuring every cup is a masterpiece. Our skilled baristas meticulously craft each brew, delivering a taste that exceeds expectations. From the first sip to the last, indulge in the richness and depth of flavor that defines our commitment to excellence. Step into our cafe and immerse yourself in the world of high-quality coffee. Discover a taste that sets us apart. Experience the true essence of coffee perfection at our exceptional cafe.</p>
        </div>
        <div class="image"id="second" >
            <img src="./sf/ph9.jpg" alt="">
            <h1>PURE GRADES</h1>
            <p>Welcome to our coffee cafe, where purity is paramount. We proudly serve pure-grade coffee, meticulously selected and expertly brewed. Each cup embodies the essence of exceptional quality and authenticity. Our beans are sourced from renowned regions, ensuring a pure and unadulterated coffee experience. Immerse yourself in the richness and depth of flavor that comes from our dedication to pure-grade perfection. Discover the true essence of coffee purity at our inviting cafe. Experience the unparalleled satisfaction that only pure-grade coffee can deliver.</p>
        </div>
        <div class="image" id="second">
            <img src="./sf/ph10.jpg" alt="">
            <h1>PROPER ROASTING</h1>
            <p>Welcome to our coffee cafe, where proper roasting is an art form. We take pride in our precise roasting techniques, unlocking the full potential of each bean. Our expert roasters carefully monitor the process, ensuring optimal flavor development and consistency. With each cup, you'll taste the perfect balance of flavors brought to life through proper roasting. Immerse yourself in the rich aroma and nuanced profiles that only proper roasting can achieve. Step into our cafe and savor the results of our dedication to the art of roasting. Experience the true essence of coffee excellence through proper roasting techniques at our exceptional cafe.</p>
        </div>
    </section>
    <!-- section 4 -->
    <section id="culture" class="section4">
        <div class="culture">
            <img id="first" src="./sf/ph11.png" alt="">
        </div>
            <div class="coffee"><br><br><br><br><br>
            <h1>COFFEE CULTURE</h1><br>
            <p>Coffee culture: a global phenomenon that celebrates the art of coffee. It unites people, sparks creativity, and fosters community. From bustling cafes to personal rituals at home, it's a journey of exploration and connection. Dive into diverse flavors, brewing methods, and origins. It's a pause in our busy lives, inviting us to savor the moment. Embrace the rituals, savor the flavors, and experience the vibrant world of coffee culture.</p>
       </div>
    </section>
    <!-- section 5 -->
    <section id="taste" class="section5">
        <h1 class="hh">GLOBALLY RECOGNIZED TASTES</h1><br>
        <div id="taste" class="taste">
            <div class="tastes">
                <img src="./sf/ph12.jpg" alt="">
                <div class="sa">
                   <h1>Arabica</h1>
                   <p>Arabica coffee: a true delight for coffee connoisseurs. Grown at higher altitudes, it boasts exceptional flavor and aroma. With nuanced profiles ranging from fruity to chocolatey, Arabica beans are the preferred choice for specialty coffee. Indulge in the exquisite taste of Arabica and experience the pinnacle of coffee excellence.</p>
                </div>
            </div>
            <div class="tastes">
                <img src="./sf/ph13.jpg" alt="">
                <div class="sa">
                    <h1>Robusta</h1>
                    <p>Robusta coffee: a robust and bold choice for coffee enthusiasts. Grown at lower altitudes, it offers a stronger and more bitter flavor profile. Known for its higher caffeine content and rich crema, Robusta beans add depth and intensity to blends. Embrace the boldness of Robusta and discover a coffee experience with a powerful kick.</p>
                </div>
            </div>
            <div class="tastes">
                <img src="./sf/ph14.jpg" alt="">
                <div class="sa">
                    <h1>Excelsa</h1>
                    <p>Excelsa coffee: a unique and distinct member of the coffee family. It offers a complex flavor profile with hints of tartness and fruity notes. Often considered a subcategory of Liberica, Excelsa beans contribute to blends, adding depth and complexity. Experience the intriguing taste of Excelsa coffee and embark on a journey of flavor exploration.</p>
                </div>
            </div>
            <div class="tastes">
                <img src="./sf/ph15.jpg" alt="">
                <div class="sa">
                   <h1>Liberica</h1>
                   <p>Liberica coffee: a rare and distinctive coffee variety. Known for its robust and bold flavor profile, it offers a unique taste experience. With its large beans and smoky, woody notes, Liberica stands out among other coffee types. Embrace the rarity and richness of Liberica coffee and discover a flavor unlike any other.</p>
                </div>
            </div>
        </div>
    </section><br><br>
    <!-- secton6 -->
    <section id="roast" class="section6">
    <div id="leul" class="carousel" data-bs-ride="carousel">
        <button class="buttons" type="button" data-category="LIGHT">LIGHT</button>
        <button class="buttons" type="button" data-category="MEDIUM">MEDIUM</button>
        <button class="buttons" type="button" data-category="HARD">HARD</button>
        <button class="buttons" type="button" data-category="BLENDS">BLENDS</button>
        <br><br><br>

        <div class="carousel-inner" id="kkk">
            <!-- The content will be dynamically populated via AJAX -->
        </div>
    </div>
</section>
<br><br>

<!-- section 7 -->
<section class="section7">
    <div class="collection">
        <h1>FLAVOUR COLLECTIONS</h1><br><br>

        <div id="flavorContainer" class="flavor-container">
            <!-- Flavour items will be dynamically inserted here -->
        </div>
  <!-- Modal for displaying flavor details -->
   <div id="dss">
<div id="flavorModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header"id="dss">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" id="modalclose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="modalPhoto" src="" alt="" style="width:50%; height:260px;"><br><br>
        <p id="modalDescription"></p>
        <p><strong>Price:</strong> <span id="modalPrice"></span> ETB</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="" id="modalAddToCart">Add to Cart</button>
        <button type="button" class="" id="modalclose1" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


      </div>
    </div>
  </div>
</div>


    </div>
</section><br><br>



    

    <!-- section 8 -->
    <section class="section8">
        <a href="./location.php"><h1>ABOUT US</h1></a><br>
        <div class="map">
            <div  id="map"></div>
                <div class="location">
                    <h1>ARYAM COFFEE</h1><br>
                    <p>Aryam coffee cafe is an establishment that specializes in serving coffee-based beverages and provides a space for people to enjoy their drinks in a comfortable and social atmosphere. These cafes offer a variety of coffee options, such as brewed coffee and espresso-based drinks, along with pastries and light snacks. They are popular meeting places for friends, colleagues, or individuals looking to relax, work, or have conversations over a cup of coffee.</p><br><br><br><br>
                    <div class="ww">
                        <div class="ee">
                            <a href="./contact us.php"><span  class="material-symbols-outlined">location_on</span>
                            <h1>location</h1></a>
                        </div>
                    <div class="ee">
                    <span class="material-symbols-outlined">phone_in_talk</span>
                    <h1>+251 912656578</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- section 9 -->
    <section class="section9">
    <h1>CUSTOMER FEED BACK</h1><br><br>
    <?php

    // Fetch products from the tblmenu table
$sql = "SELECT photo, name, feedback , rate FROM tbltestimonial";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo ' <div id="leul" class="carousel" data-bs-ride="carousel">';
    
    echo '<div class="carousel-inner">';

    // Display each testimonial as a carousel item
    $isActive = true; // To mark the first item as active
    while ($row = $result->fetch_assoc()) {
        echo '<div class="carousel-item' . ($isActive ? ' active' : '') . '">'; // Set the first item as active
        $isActive = false; // Set to false after the first iteration

        echo '<div id="feed">';
        echo '<div id="dda">';
        echo '<a href="#"><img src="./dashboard/feed back/photos/' . htmlspecialchars($row["photo"]) . '" alt="' . htmlspecialchars($row["name"]) . '"></a>';
        echo '<h5>' . htmlspecialchars($row["name"]) . '</h5>';
        echo '</div>';

        // Feedback section
        echo '<p>' . htmlspecialchars($row["feedback"]) . '<br>';

        // Rating logic
        $rating = (int)$row['rate']; // Convert rate to an integer
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                echo '<i class="fa fa-star checked"></i>';
            } else {
                echo '<i class="fa fa-star"></i>';
            }
        }
        echo '</p>'; // Close paragraph tag

        echo '</div>'; // Close feed div
        echo '</div>'; // Close carousel-item
    }

    echo '</div>'; // Close carousel-inner

    // Carousel controls
   
    
   

    echo '</div>'; // Close demo carousel
} else {
    echo '<p>No products available</p>';
}
?>
   
<br><br>

<button id="gh"><a href="./feedback.php">Add Feedback</a></button>       
</section>
<br><br><br><br>



    <!--  -->

    


    

    <!--  -->
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
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
       <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

<script>
    document.querySelector('#search-box').
    addEventListener('input', filterList);
     
    function filterList(){
        const searchInput=document.querySelector
        ('#search-box');
        const filter = searchInput.value.toLowerCase();
        const listItems = document.querySelectorAll('.list-group-item');

        listItems.forEach((item) => {
            let text = item.textContent;
            if(text.toLocaleLowerCase().includes(filter.
            toLocaleLowerCase())){
                item.style.display = '';

            }
            else{
                item.style.display = 'none';
            }
        });
    }

    
    // 
    var map = L.map('map');
map.setView([8.945326, 38.771768], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,

}).addTo(map);

var marker = L.marker([8.8981978, 38.7747308]).addTo(map);
var marker = L.marker([8.945326, 38.771768]).addTo(map);
var marker = L.marker([8.990853, 38.779147]).addTo(map);

var circle = L.circle([8.8981978, 38.7747308], {
color: 'red',
fillColor: '#f03',
fillOpacity: 0.5,
radius: 500

}).addTo(map);
marker.bindPopup("<b>ARYAM COFFEE").openPopup();
circle.bindPopup("ARYAM COFFEE.");

function onMapClick(e) {
alert("You clicked the map at " + e.latlng);
}


var circle = L.circle([8.945326, 38.771768], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
    
    }).addTo(map);
    marker.bindPopup("<b>ARYAM COFFEE").openPopup();
    circle.bindPopup("ARYAM COFFEE.");
    
    function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
    }


    var circle = L.circle([8.990853, 38.779147], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
        
        }).addTo(map);
        marker.bindPopup("<b>ARYAM COFFEE").openPopup();
        circle.bindPopup("ARYAM COFFEE.");
        
        function onMapClick(e) {
        alert("You clicked the map at " + e.latlng);
        }

map.on('click', onMapClick);

var popup = L.popup();

function onMapClick(e) {
popup
    .setLatLng(e.latlng)
    .setContent("You clicked the map at " + e.latlng.toString())
    .openOn(map);
}
map.on('click', onMapClick);
let list1 = document.querySelector('.list1')
document.querySelector('#menu').onclick = () =>{
    list1.classList.toggle('active');
}
map.on('click', onMapClick);
let login = document.querySelector('.login')
document.querySelector('#person').onclick = () =>{
    login.classList.toggle('active');
}
let serch = document.querySelector('.serch')

document.querySelector('#ser').onclick = () =>{
    serch.classList.toggle('active');
}


map.on('click', onMapClick);
let dow1 = document.querySelector('.dow1')
document.querySelector('#search-box').onclick = () =>{
    dow1.classList.toggle('active');
}

</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Fetch all flavors
    fetch('fetch_flavors.php')
        .then(response => response.json())
        .then(data => {
            const flavorContainer = document.getElementById('flavorContainer');
            flavorContainer.innerHTML = ''; // Clear existing content

            data.forEach(flavor => {
                flavorContainer.innerHTML += `
                    <div class="flavor-item">
                        <img src="dashboard/menu/photos/${flavor.photo}" alt="${flavor.title}">
                        <div class="f">
                            <h1 style="text-align:center;">${flavor.title}</h1>
                            <div class="order">
                                <a href="#" class="see-detail" data-title="${flavor.title}">SEE DETAIL</a>
                                <a href="#" class="add-to-cart" data-title="${flavor.title}">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                `;
            });

            // Add event listeners to 'See Detail' buttons
            document.querySelectorAll('.see-detail').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const title = this.getAttribute('data-title');

                    // Fetch specific flavor details
                    fetch(`fetch_flavor_detail.php?title=${title}`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate modal with data
                            document.getElementById('modalTitle').innerText = data.title;
                            document.getElementById('modalPhoto').src = `dashboard/menu/photos/${data.photo}`;
                            document.getElementById('modalDescription').innerText = data.description;
                            document.getElementById('modalPrice').innerText = data.price ;

                            // Show modal
                            $('#flavorModal').modal('show');

                            // Add to Cart functionality in the modal
                            // Add to Cart functionality in the modal
document.getElementById('modalAddToCart').onclick = function() {
    // Get the product details from the modal
    const product_name = document.getElementById('modalTitle').innerText;
    const product_image = document.getElementById('modalPhoto').src;
    const product_price = parseFloat(document.getElementById('modalPrice').innerText);
    
    if (isNaN(product_price)) {
        console.error('Invalid price for product:', product_name);
        return; // Prevent adding if price is invalid
    }

    // You can set a unique product ID, e.g., based on the title or any other unique identifier
    const product_id = product_name.toLowerCase().replace(/\s+/g, '-');

    // Use the existing `addToCart` function
    addToCart(product_id, product_name, product_image, product_price);

    // Close the modal after adding to cart
    alert(`${product_name} has been added to your cart!`);
    $('#flavorModal').modal('hide');
};

                           
                            document.getElementById('modalclose').onclick = function() {
                               
                                $('#flavorModal').modal('hide');
                            };
                            document.getElementById('modalclose1').onclick = function() {
                               
                               $('#flavorModal').modal('hide');
                           };
                        })
                        .catch(error => console.error('Error fetching flavor details:', error));
                });
            });

            // Add to cart functionality for the list
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const title = this.getAttribute('data-title');
                    alert(`${title} has been added to your cart!`);
                });
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});




</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Fetch the first record on page load (e.g., LIGHT category)
    fetchRoastData('LIGHT'); // Default category, can be any

    // Add event listeners to buttons
    document.querySelectorAll('.buttons').forEach(button => {
        button.addEventListener('click', function () {
            let category = this.getAttribute('data-category');
            fetchRoastData(category); // Fetch data based on button click
        });
    });
});

// Function to fetch roast data from the server
function fetchRoastData(category) {
    fetch(`fetch_roast.php?category=${category}`)
        .then(response => response.json())
        .then(data => {
            // Populate the carousel with the fetched data
            document.getElementById('kkk').innerHTML = `
                <div class="carousel-item active">
                    <div class="roast">
                        <div class="buna">
                            <h1>${data.title}</h1><br>
                            <p>${data.description}</p>
                        </div>
                        <img src="dashboard/roast/photos/${data.photo}" alt="${data.title}">
                    </div>
                </div>
            `;
        })
        .catch(error => console.error('Error fetching data:', error));
}

</script>

</html>