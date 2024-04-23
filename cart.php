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
        return []; // Return an empty array in case of error
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to our Clothing Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .logo {
            text-decoration: none;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .hero-section {
            background-image: url('clothing_store_hero.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero-content {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn-shop {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .btn-shop:hover {
            background-color: #555;
        }

        .btn-view-products, .btn-add-products {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-view-products:hover, .btn-add-products:hover {
            background-color: #555;
        }

        .cart-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 24px;
            color: #333;
            cursor: pointer;
            z-index: 9999; 
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="cart.php" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </header>

    <div class="hero-section">
        <div class="hero-content">
            <h1>Welcome to Our Clothing Store</h1>
            <p>Discover the latest trends and styles for men, women, and kids.</p>
            <a href="#" class="btn-shop">Shop Now</a>
        </div>
    </div>

    <div class="container">
        <a href="view_products.php" class="btn-view-products">View Products</a>
        <a href="add_product.php" class="btn-add-products">Add Products</a>
    </div>

    <div class="product-container">
        <?php
        // Call the get_products() function to fetch products
        $products = get_products();

        // Check if products were fetched successfully
        if ($products) {
            // Loop through each product and display them
            foreach ($products as $product) {
                echo "<div class='product'>";
                echo "<img src='{$product['image']}' alt='{$product['name']}'>";
                echo "<h2>{$product['name']}</h2>";
                echo "<p>Price: {$product['price']}</p>";
                // Add to Cart button
                echo "<a href='cart.php?add={$product['id']}' class='btn-add-to-cart'>Add to Cart</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No products available.</p>";
        }
        ?>
    </div>
</body>
</html>
