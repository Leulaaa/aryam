<?php
require 'config.php'; // Include your database configuration

if (isset($_POST['search_query'])) {
    $search_query = "%" . $_POST['search_query'] . "%"; // Add wildcards for partial matching

    $sql = "SELECT id, title, description, photo, price FROM tblmenu WHERE title LIKE ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("s", $search_query);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        // Return results as JSON
        echo json_encode($products);
    } else {
        echo json_encode([]);
    }
}
?>
