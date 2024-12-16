<?php
// Start the session to track the cart
session_start();

// Product data
$products = [
    [
        "name" => "Full Package",
        "description" => "Our Flagship Product. Experience next-level cooling power with our custom cooling loops and liquid nitrogen pump. ",
        "price" => 1599.99,
        "image" => "img/FullPackage.png"
    ],
    [
        "name" => "Half-Full Package",
        "description" => "Custom cooling loops built for your PC. Experience 'built to order, made to last' quality. Perfect fit guaranteed.",
        "price" => 699.99,
        "image" => "img/Loops.png"
    ],
    [
        "name" => "Tank & Pump",
        "description" => "Just the tank & pump. Option for customers who already use liquid cooling. Built to fit your PC.",
        "price" => 229.99,
        "image" => "img/Pump.png"
    ],
];

// Capture the search query from the URL
$search_query = isset($_GET['search']) ? strtolower($_GET['search']) : '';

// Filter products based on the search query
$filtered_products = [];
foreach ($products as $product) {
    if (empty($search_query) || strpos(strtolower($product['name']), $search_query) !== false) {
        $filtered_products[] = $product;
    }
}

// Handle adding items to the cart
if (isset($_GET['add_to_cart'])) {
    $product_id = $_GET['add_to_cart'];

    // Ensure the product ID is valid
    if (isset($products[$product_id])) {
        $product = $products[$product_id];

        // Add the product to the cart (stored in session)
        $_SESSION['cart'][] = $product;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyLiquidCool, Inc.</title>
    <link rel="stylesheet" href="styles/products.scss">
</head>
<body>
    <div class="header">
        <h1>EasyLiquidCool, Inc.</h1>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li class="cart-icon">
                <a href="cart.php">
                    🛒
                    <span class="cart-count">
                        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                    </span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="content">
        <h2>Our Products</h2>

        <!-- Search Form -->
        <form method="get" action="products.php" class="search-form">
            <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($search_query); ?>">
            <button type="submit">Search</button>
        </form>

        <!-- Display Search Results -->
        <div class="product-list">
            <?php if (empty($filtered_products)): ?>
                <p>No products found.</p>
            <?php else: ?>
                <?php foreach ($filtered_products as $index => $product): ?>
                    <div class="product">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                        <h3><?php echo $product['name']; ?></h3>
                        <p><?php echo $product['description']; ?></p>
                        <p><strong>$<?php echo number_format($product['price'], 2); ?></strong></p>
                        <a href="products.php?add_to_cart=<?php echo $index; ?>" class="buy-button">Buy Now</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
