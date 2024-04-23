<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .cart-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 24px;
            color: #ff4500;
            cursor: pointer;
        }

        .cart-counter {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="cart-icon" onclick="goToCart()">
        <i class="fas fa-shopping-cart"></i>
        <span id="cart-counter" class="cart-counter">0</span>
    </div>

    <script>
        var cartCounter = document.getElementById('cart-counter');
        var itemCount = 0;

        function updateCartCounter(count) {
            cartCounter.innerText = count;
        }

        function goToCart() {
            window.location.href = 'cart.php';
        }

        function addItemToCart() {
            itemCount++;
            updateCartCounter(itemCount);
        }

        function removeItemFromCart() {
            if (itemCount > 0) {
                itemCount--;
                updateCartCounter(itemCount);
            }
        }
    </script>
</body>
</html>
