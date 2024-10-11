<?php require_once('./common/view/partials/header.php');
require_once './order/model/entity/Order.php';
$customerName = $order->getCustomerName();
$products = $order->getProducts();
$shippingAddress = $order->getShippingAddress();
$shippingCity = $order->getShippingCity();
$shippingCountry = $order->getShippingCountry();
$shippingMethod = $order->getShippingMethod();
$totalPrice = $order->getTotalPrice(); ?>

<main>
	<h1>Pay (I hope it will work this time)</h1>
	<p class="sum">To sum up:</p>
	<div class="product-summary">
		<p><strong>Customer Name:</strong> <?php echo htmlspecialchars($customerName); ?></p>
		<p><strong>Products:</strong>
		<ul>
			<?php foreach ($products as $product) { ?>
				<li><?php echo htmlspecialchars($product->getProductName()); ?></li>
			<?php } ?>
		</ul>
		</p>
		<p><strong>Shipping Address:</strong> <?php echo htmlspecialchars($shippingAddress); ?>, <?php echo htmlspecialchars($shippingCity); ?>, <?php echo htmlspecialchars($shippingCountry); ?></p>
		<p><strong>Shipping Method:</strong> <?php echo htmlspecialchars($shippingMethod); ?></p>
		<p><strong>Total Price:</strong> <?php echo htmlspecialchars($totalPrice); ?></p>
	</div>

	<form method="POST" action="http://localhost:8888/esd-oop-php-main/process-payment">

		<label for="payment"></label>

		<button class="button" type="submit">Pay</button class="button">

	</form>
</main>

<?php require_once('./common/view/partials/footer.php'); ?>