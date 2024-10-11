<?php require_once('./common/view/partials/header.php');
require_once './product/model/entity/Product.php'; ?>
<main>

	<form method="POST" action="http://localhost:8888/esd-oop-php-main/create-order">

		<label for="customerName">Client Name</label>
		<input type="text" id="customerName" name="customerName" required>
		<br>

		<label for="product">Products</label>

		<select id="product" name="products[]" multiple>
			<?php
			foreach ($products as $product) {
				if (!$product->getActive()) {
					continue;
				}
				$productName = $product->getProductName();
				$id = $product->getId();
			?>
				<option value="<?php echo $id; ?>"><?php echo htmlspecialchars($productName); ?></option>
			<?php
			}
			?>
		</select>
		<br>

		<button class="button" type="submit">Add</button class="button">

	</form>

</main>

<?php require_once('./common/view/partials/footer.php'); ?>