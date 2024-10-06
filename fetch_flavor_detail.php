<?php
require_once 'config.php';

// Get the title from the GET request
$title = $_GET['title'];

// Query the database to get the specific menu item details
$query = $conn->prepare("SELECT title, photo, description, price FROM tblmenu WHERE title = ?");
$query->bind_param('s', $title);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();
    echo json_encode([
        'title' => $row['title'],
        'photo' => $row['photo'],
        'description' => $row['description'],
        'price' => $row['price']
    ]);
} else {
    // If no data is found, return an empty response
    echo json_encode([
        'title' => 'No Data',
        'photo' => 'default_image.png',
        'description' => 'No description available.',
        'price' => '0.00'
    ]);
}

$query->close();
$conn->close();
?>
