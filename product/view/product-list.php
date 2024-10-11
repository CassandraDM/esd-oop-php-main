<?php
require_once './product/view/partials/header.php';
require_once './product/model/entity/Product.php';
?>

<main>
    <h1>Product List</h1>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($products as $product) {

                if (!$product->getActive()) {
                    continue;
                }

                $productName = $product->getProductName();
                $description = $product->getDescription();
                $price = $product->getPrice();
                $active = $product->getActive() ? 'Yes' : 'No';
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($productName); ?></td>
                    <td><?php echo htmlspecialchars($description); ?></td>
                    <td>$<?php echo htmlspecialchars($price); ?></td>
                    <td><?php echo htmlspecialchars($active); ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</main>