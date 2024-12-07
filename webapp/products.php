<?php
session_start();

try {
    // Connect to the database
    $pdo = new PDO('mysql:host=sql1.njit.edu;dbname=mjf8', 'mjf8', 'Matty238209200!');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch products from the database
    $stmt = $pdo->query('SELECT * FROM elcproducts');
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Capture the search query from the URL
$search_query = isset($_GET['search']) ? strtolower($_GET['search']) : '';

// Filter products based on the search query
$filtered_products = array_filter($products, function ($product) use ($search_query) {
    return empty($search_query) || strpos(strtolower($product['name']), $search_query) !== false;
});

// Handle adding items to the cart
if (isset($_GET['add_to_cart'])) {
    $product_sku = $_GET['add_to_cart'];

    // Find the product by SKU and add to the cart
    foreach ($products as $product) {
        if ($product['online_sku'] === $product_sku) {
            $_SESSION['cart'][] = $product;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - EasyLiquidCool, Inc.</title>
    <link rel="stylesheet" href="products.css">
</head>
<body>
    <div class="header">
        <h1>EasyLiquidCool, Inc.</h1>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact</a></li>
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
                <?php foreach ($filtered_products as $product): ?>
                    <div class="product">
                        <!-- Dynamically display product image -->
                        <img src="<?php echo htmlspecialchars($product['image'] ?? 'FullPackage.jpeg'); ?>" 
                             alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <p><strong>$<?php echo number_format($product['price'], 2); ?></strong></p>
                        <a href="products.php?add_to_cart=<?php echo htmlspecialchars($product['online_sku']); ?>" class="buy-button">Buy Now</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
