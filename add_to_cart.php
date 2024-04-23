<?php

session_start();

function fetch_product_details($product_id) {
    $product_details = array(); // Placeholder for product details
    return $product_details;
}

$product_id = null;

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
}
// 

$product = fetch_product_details($product_id);

if ($product) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][$product_id] = array(
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => 1 
    );

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart page</title>
</head>
<body>
    
</body>
</html>
