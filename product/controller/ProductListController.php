<?php
require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';

class ProductListController
{
    public function productList()
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->findAllProducts();

        require_once './product/view/product-list.php';
    }
}
