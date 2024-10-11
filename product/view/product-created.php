<?php
require_once './product/view/partials/header.php';
require_once './product/model/entity/Product.php';
$productName = $product->getProductName();
$description = $product->getDescription();
$price = $product->getPrice();
$active = $product->getActive() ? 'Yes' : 'No';
?>

<main>
    <h3 class="success">Your product has been successfully created!</h3>
    <p class="sum">To sum up:</p>
    <div class="product-summary">
        <p><strong>Product Name:</strong> <?php echo htmlspecialchars($productName); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($description); ?></p>
        <p><strong>Price:</strong> $<?php echo htmlspecialchars($price); ?></p>
        <p><strong>Active:</strong> <?php echo htmlspecialchars($active); ?></p>
    </div>
</main>

<?php
require_once './product/view/partials/footer.php';
?>