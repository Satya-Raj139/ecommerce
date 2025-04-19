<?php
include 'includes/db.php';

try {
    $products = [
        ['name' => 'Product 1', 'price' => 19.99, 'description' => 'Description for product 1', 'image' => 'product1.jpg'],
        ['name' => 'Product 2', 'price' => 29.99, 'description' => 'Description for product 2', 'image' => 'product2.jpg'],
        ['name' => 'Product 3', 'price' => 39.99, 'description' => 'Description for product 3', 'image' => 'product3.jpg'],
        ['name' => 'Product 4', 'price' => 49.99, 'description' => 'Description for product 4', 'image' => 'product4.jpg'],
        ['name' => 'Product 5', 'price' => 59.99, 'description' => 'Description for product 5', 'image' => 'product5.jpg'],
    ];

    $stmt = $conn->prepare("INSERT INTO products (name, price, description, image) VALUES (:name, :price, :description, :image)");

    foreach ($products as $product) {
        $stmt->execute([
            ':name' => $product['name'],
            ':price' => $product['price'],
            ':description' => $product['description'],
            ':image' => $product['image'],
        ]);
    }

    echo "Sample products inserted successfully.";
} catch (PDOException $e) {
    echo "Error inserting sample products: " . $e->getMessage();
}
?>
