<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $feedback = filter_var($_POST['feedback'], FILTER_SANITIZE_STRING);
  $rate = filter_var($_POST['rate'], FILTER_SANITIZE_NUMBER_INT); // Ensure rate is an integer

  // Handle file upload
  if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
      $fileTmpPath = $_FILES['photo']['tmp_name'];
      $fileName = $_FILES['photo']['name'];
      $fileSize = $_FILES['photo']['size'];
      $fileType = $_FILES['photo']['type'];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));

      // Set allowed file extensions
      $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

      if (in_array($fileExtension, $allowedExts)) {
          // Directory to save uploaded file
          
          $uploadFileDir = './dashboard/feed back/photos/';
          $dest_path = $uploadFileDir . $fileName;

          if (move_uploaded_file($fileTmpPath, $dest_path)) {
              // File uploaded successfully
          } else {
              echo 'There was an error moving the uploaded file.';
          }
      } else {
          echo 'Upload failed. Allowed file types: ' . implode(', ', $allowedExts);
      }
  } else {
      echo 'No file uploaded or there was an upload error.';
  }

  // Insert data into the database
  $stmt = $conn->prepare("INSERT INTO tblfeedback (name, feedback, rate, photo) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $name, $feedback, $rate, $fileName); // Changed to 'i' for integer

  if ($stmt->execute()) {
      echo 'Feedback submitted successfully.';
      
  } else {
      echo 'Error submitting feedback: ' . $stmt->error;
  }

  // Close the statement and connection
  $stmt->close();
  // $conn->close();
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
    <link rel="stylesheet" href="./feedback.css">
    
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
    <section class="section1">
        <div class="header">
            <img src="./sf/ph1.png" alt="">
            <div class="list1">
                <ul>
                    <li><a href="./project.php">HOME</a></li>
                    
                    <li><a href="./orde.php">MENU</a></li>
                    <li><a href="./contact us.php">CONTACT US</a></li>
                    <li><a href="./reservation.php">RESERVATION</a></li>
                </ul>
            </div>
        </div>  
        <div class="no">
            
        </div>
    </section>

    <!--  -->
    <form id="feedbackForm" action="" method="POST" enctype="multipart/form-data" class="">
        <h4 class="text-warning text-center pt-5">Feedback Page</h4>

        <label>
            <input 
                type="file"
                class="input"
                name="photo"
                placeholder="Upload Photo" 
                autocomplete="off" 
                required
            />
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>

        <label>
            <input
                type="text"
                class="input"
                name="name" 
                autocomplete="off" 
                required
                placeholder="ENTER YOUR NAME"
                pattern="[A-Za-z\s]+"  
                title="Please enter letters only."
            />
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>

        <label>
            <input
                type="text"
                class="input"
                name="feedback" 
                autocomplete="off" 
                required
                placeholder="WRITE YOUR FEEDBACK"
                pattern="[A-Za-z\s]+"  
                title="Please enter letters only."/>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>

        <label>
            <div class="rating">
                GIVE YOUR RATE 
                <input type="radio" name="rate" id="rate-5" value="1" required>
                <label for="rate-5" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-4" value="2" required>
                <label for="rate-4" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-3" value="3" required>
                <label for="rate-3" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-2" value="4" required>
                <label for="rate-2" class="fa fa-star"></label>
                <input type="radio" name="rate" id="rate-1" value="5" required>
                <label for="rate-1" class="fa fa-star"></label>
            </div>
        </label>

        <button type="submit">Submit</button>
    </form><br><br><br>
    
    
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
        document.getElementById('feedbackForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            const form = this;

            // Trigger SweetAlert for confirmation
            Swal.fire({
                title: 'Confirm Submission',
                text: "Are you sure you want to submit this feedback?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, submit it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    form.submit();
                    
                }
            });
        });
    </script>
</html>

    