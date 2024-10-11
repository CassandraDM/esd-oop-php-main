<?php


class IndexController
{

	public function index()
	{
		$productRepository = new ProductRepository();
		$products = $productRepository->findAllProducts();
		require_once('./order/view/home.php');
	}
}
