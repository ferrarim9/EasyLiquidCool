<?php

$products = [
    [
        "name" => "Full Package",
        "description" => "High-efficiency and high-performance custom cooling loops, pump, and liquid nitrogen",
        "price" => 1599.99,
        "image" => "product1.jpg"
    ],
    [
        "name" => "Cooler B2",
        "description" => "Compact and powerful for small rooms.",
        "price" => 179.99,
        "image" => "product2.jpg"
    ],
    [
        "name" => "Cooler C3",
        "description" => "Energy-efficient model for eco-conscious customers.",
        "price" => 229.99,
        "image" => "product3.jpg"
    ]
];

$search_query = isset($_GET['search']) ? strtolower($_GET['search']) : '';

$filtered_products = [];
foreach ($products as $product) {
    if (empty($search_query) || strpos(strtolower($product['name']), $search_query) !== false) {
        $filtered_products[] = $product;
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
        </ul>
    </nav>

    <div class="content">
        <h2>Our Products</h2>

        <form method="get" action="products.php" class="search-form">
            <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($search_query); ?>">
            <button type="submit">Search</button>
        </form>

        <div class="product-list">
            <?php if (empty($filtered_products)): ?>
                <p>No products found.</p>
            <?php else: ?>
                <?php foreach ($filtered_products as $product): ?>
                    <div class="product">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                        <h3><?php echo $product['name']; ?></h3>
                        <p><?php echo $product['description']; ?></p>
                        <p><strong>$<?php echo number_format($product['price'], 2); ?></strong></p>
                        <button class="buy-button">Buy Now</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

