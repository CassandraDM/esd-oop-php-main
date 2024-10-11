<?php require_once('./order/view/partials/header.php'); ?>

<main>
	<p>Pay (I hope it will work this time) </p>


	<form method="POST" action="http://localhost:8888/esd-oop-php-main/process-payment">

		<label for="payment"></label>

		<button type="submit">Pay</button>

	</form>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>