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
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title><?php echo htmlspecialchars($product['title']); ?> - Product Details</title>
                    <style>
                        /* Add some basic styling */
                        .product-details {
                            width: 50%;
                            margin: auto;
                            text-align: center;
                            border: 1px solid #ccc;
                            padding: 20px;
                            border-radius: 10px;
                            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
                        }
                        img {
                            max-width: 100%;
                            height: auto;
                            border-radius: 10px;
                        }
                        p {
                            font-size: 18px;
                        }
                    </style>
                </head>
                <body>
                    <div class="product-details">
                        <h1><?php echo htmlspecialchars($product['title']); ?></h1>
                        <img src="dashboard/menu/photos/<?php echo htmlspecialchars($product['photo']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>">
                        <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
                        <p><strong>Price:</strong> <?php echo htmlspecialchars($product['price']); ?> birr</p>
                        <a href="index.php">Back to Products</a>
                    </div>
                </body>
                </html>
                <?php
            } else {
                echo '<p>Product not found.</p>';
            }
        } else {
            echo 'Error in the SQL query preparation: ' . $conn->error;
        }
    } else {
        echo '<p>Invalid product ID.</p>';
    }
} else {
    echo '<p>No product ID provided.</p>';
}
?>
