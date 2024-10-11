<?php require_once('./order/view/partials/header.php'); ?>

<main>
	<p>Choose your Shipping Method : </p>


	<form method="POST" action="http://localhost:8888/esd-oop-php-main/process-shipping-method">

		<label for="shippingMethod">Shipping Method</label>

		<select id="shippingMethod" name="shippingMethod">
			<option value="Chronopost Express">Chronopost Express</option>
			<option value="Point relais">Relay Point</option>
			<option value="Domicile">At Home</option>

		</select>

		<button type="submit">Confirm</button>

	</form>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>