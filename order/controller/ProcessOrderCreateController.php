<?php

require_once './order/model/entity/Order.php';
require_once './order/model/repository/OrderRepository.php';
require_once './product/model/repository/ProductRepository.php';


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


			// pour chaque id récupéré : il faut récupérer le produit correspondant
			// en session
			// tu regroupes tous les produits en tableau


			$productRepository = new ProductRepository();
			$products = $productRepository->findByIds($products);
			if (count($products) == 0) {
				$errorMessage = "You must select at least one product";
				require_once './order/view/order-error.php';
				return;
			}






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
