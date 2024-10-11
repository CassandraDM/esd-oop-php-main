<?php require_once('./order/view/partials/header.php'); ?>

<main>
	<h3>Pay (I hope it will work this time)</h3>
	<p class="sum">To sum up:</p>
	<div class="product-summary">
		<p><strong>Client Name:</strong> <?php echo htmlspecialchars($clientName); ?></p>
		<p><strong>Products:</strong> <?php echo htmlspecialchars($products); ?></p>
		<p><strong>Shipping Address:</strong> <?php echo htmlspecialchars($shipingAddress); ?>, <?php echo htmlspecialchars($shipingCity); ?>, <?php echo htmlspecialchars($shipingCountry); ?></p>
		<p><strong>Shipping Method:</strong> <?php echo htmlspecialchars($shippingMethod); ?></p>
		<p><strong>Total Price:</strong> <?php echo htmlspecialchars($totalPrice); ?></p>
	</div>

	<form method="POST" action="http://localhost:8888/esd-oop-php-main/process-payment">

		<label for="payment"></label>

		<button type="submit">Pay</button>

	</form>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>