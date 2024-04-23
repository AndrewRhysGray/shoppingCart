<?php
include 'connect.php'; 

function get_products() {
    $conn = db_connect(); 
    $sql = "SELECT id, name, price, image FROM Products";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
        return $products;
    } else {
        echo "Error fetching products: " . mysqli_error($conn);
        return []; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
    </style>
</head>
<body>
    <h1>Products</h1>
    <div class="product-container">
        <?php
        $products = get_products();

        if ($products) {
            foreach ($products as $product) {
                echo "<div class='product'>";
                echo "<img src='{$product['image']}' alt='{$product['name']}'>";
                echo "<h2>{$product['name']}</h2>";
                echo "<p>Price: {$product['price']}</p>";
                // Add an "Add to Cart" button
                echo "<form action='add_to_cart.php' method='get'>";
                echo "<input type='hidden' name='product_id' value='{$product['id']}'>";
                echo "<input type='submit' value='Add to Cart'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>No products available.</p>";
        }
        ?>
    </div>
</body>
</html>
