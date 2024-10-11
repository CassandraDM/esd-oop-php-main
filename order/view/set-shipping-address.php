<?php require_once('./order/view/partials/header.php'); ?>

<main>
	<p>Add your Shipping Address : </p>


	<form method="POST" action="http://localhost:8888/esd-oop-php-main/process-shipping-address">

		<label for="shippingCountry">Shipping Country</label>
		<input type="text" id="shippingCountry" name="shippingCountry" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="Le pays doit contenir entre 5 et 50 caractères et des espaces.">

		<br>
		<label for="shippingCity">Shipping City</label>
		<input type="text" id="shippingCity" name="shippingCity" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="La Ville doit contenir entre 5 et 50 caractères.">

		<br>
		<label for="shippingAddress">Shipping Address</label>
		<input type="text" id="shippingAddress" name="shippingAddress" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="L'adresse doit contenir entre 5 et 50 caractères et des espaces.">

		<button type="submit">Add</button>

	</form>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>