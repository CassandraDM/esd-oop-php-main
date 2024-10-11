<?php

require_once './order/model/entity/Order.php';
require_once './order/model/repository/OrderRepository.php';


class CreateOrderController
{

	public function createOrder()
	{

		try {

			if (!isset($_POST['customerName']) || !isset($_POST['products'])) {
				$errorMessage = "Can you at least fill the form?";

				require_once './order/view/order-error.php';
				return;
			}

			$customerName = $_POST['customerName'];
			$products = $_POST['products'];

			$order = new Order($customerName, $products);

			$orderRepository = new OrderRepository();
			$orderRepository->persist($order);

			require_once './order/view/order-created.php';
		} catch (Exception $e) {
			$errorMessage = $e->getMessage();
			require_once './order/view/order-error.php';
		}
	}
}
