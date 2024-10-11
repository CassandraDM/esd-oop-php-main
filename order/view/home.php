<?php require_once('./order/view/partials/header.php');
require_once './product/model/entity/Product.php'; ?>
<main>

	<form method="POST" action="http://localhost:8888/esd-oop-php-main/create-order">

		<label for="customerName">Client Name</label>
		<input type="text" id="customerName" name="customerName" required>
		<br>

		<label for="product">Products</label>

		<select id="product" name="products[]" multiple>
			<?php
			foreach ($allProducts as $product) {
				if (!$product->getActive()) {
					continue;
				}
				$productName = $product->getProductName();
			?>
				<option><?php echo htmlspecialchars($productName); ?></option>
			<?php
			}
			?>
		</select>
		<br>

		<button type="submit">Add</button>

	</form>

</main>

<?php require_once('./order/view/partials/footer.php'); ?>