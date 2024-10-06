<?php
require_once 'config.php';

// Query the database to get menu items
$query = "SELECT title, photo FROM tblmenu limit 6";
$result = $conn->query($query);

$flavors = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $flavors[] = [
            'title' => $row['title'],
            'photo' => $row['photo']
        ];
    }
}

// Return the data as JSON
echo json_encode($flavors);

$conn->close();
?>
