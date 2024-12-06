<?php
// Start the session to track the cart
session_start();

// Handle clearing the cart
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    header("Location: cart.php"); // Redirect to the cart page after clearing
    exit;
}

// Calculate the total price of the cart
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - EasyLiquidCool, Inc.</title>
    <link rel="stylesheet" href="products.css">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Header Style */
        .header {
            background-color: #808080;
            width: 468px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
        }

        .header h1 {
            color: white;
            font-size: 24px;
        }

        /* Navbar Style */
        .navbar {
            background-color: #333;
            width: 100%;
            text-align: center;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
        }

        .navbar ul li {
            display: inline-block;
            margin-right: 20px;
        }

        .navbar ul li:last-child {
            margin-right: 0;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
        }

        .navbar ul li a:hover {
            background-color: #575757;
            border-radius: 4px;
        }

        /* Cart Content */
        .content {
            margin: 40px auto;
            width: 80%;
            max-width: 1200px;
        }

        .content h2 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 20px;
        }

        /* Cart List */
        .cart-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .cart-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 30%;
            margin-bottom: 30px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .cart-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .cart-item h3 {
            font-size: 24px;
            margin-top: 15px;
        }

        .cart-item p {
            font-size: 16px;
            color: #555;
        }

        /* Clear Cart Button */
        .clear-cart-button {
            background-color: #333; /* Matching the gray color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: block;
            width: 200px;
            margin: 20px auto;
        }

        .clear-cart-button:hover {
            background-color: #575757; /* Slightly lighter gray on hover */
        }

        /* Continue Shopping Link */
        a {
            background-color: #333; /* Gray background */
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            display: block;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #575757; /* Slightly lighter gray on hover */
        }

        /* Footer Style */
        .cart-footer {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Header with Cart Icon -->
    <div class="header">
        <h1>EasyLiquidCool, Inc.</h1>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Cart Content -->
    <div class="content">
        <!-- Display Cart Title -->
        <h2>
            <?php
            if (empty($_SESSION['cart'])) {
                echo "No items in cart";
            } else {
                echo "Your Cart (" . count($_SESSION['cart']) . " items)";
            }
            ?>
        </h2>

        <?php if (!empty($_SESSION['cart'])): ?>
            <div class="cart-list">
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="cart-item">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                        <h3><?php echo $item['name']; ?></h3>
                        <p><?php echo $item['description']; ?></p>
                        <p><strong>$<?php echo number_format($item['price'], 2); ?></strong></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Clear Cart Button -->
            <form method="POST" action="cart.php">
                <button type="submit" name="clear_cart" class="clear-cart-button">Clear Cart</button>
            </form>

            <p><a href="products.php">Continue Shopping</a></p>

            <!-- Footer with Total Price -->
            <div class="cart-footer">
                <p><strong>Total Price: $<?php echo number_format($total_price, 2); ?></strong></p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
