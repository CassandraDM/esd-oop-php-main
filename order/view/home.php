<?php require_once('./order/view/partials/header.php'); ?>
<main>

	<form method="POST" action="http://localhost:8888/esd-oop-php-main/create-order">

		<label for="customerName">Client Name</label>
		<input type="text" id="customerName" name="customerName" required>
		<br>

		<label for="product">Products</label>

		<select id="product" name="products[]" multiple>
			<option value="tshirt">T-shirt</option>
			<option value="jeans">Jeans</option>
			<option value="shoes">Shoest</option>
			<option value="short">Shorts</option>
			<option value="cap">Cap</option>
			<option value="pull">Sweatshirt</option>
		</select>
		<br>

		<button type="submit">Add</button>

	</form>

</main>

<?php require_once('./order/view/partials/footer.php'); ?>