<?php
require_once 'config.php';

// Get the category from the AJAX request
$category = $_GET['category'];

// Query the database for the roast details
$query = $conn->prepare("SELECT photo, title, description FROM tblroast WHERE category = ?");
$query->bind_param("s", $category);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();

    // Return the data as JSON
    echo json_encode($row);
} else {
    echo json_encode([
        "title" => "No Data",
        "description" => "No description available for this category.",
        "photo" => "default_image.png"
    ]);
}

?>
