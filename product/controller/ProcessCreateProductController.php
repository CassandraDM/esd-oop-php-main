<?php

require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';

class ProcessCreateProductController
{
    public function processCreateProduct()
    {
        try {
            if (!isset($_POST['productName']) || !isset($_POST['description'])) {
                $errorMessage = "Do you want to create a product or not ? Yes ? So please fill the form.";
                require_once './product/view/product-error.php';
                return;
            }
            if (!preg_match('/^.{3,100}$/', $_POST['productName'])) {
                $errorMessage = "Between 3 and 100 characters! It's not that hard! ";
                require_once './product/view/product-error.php';
                return;
            }
            $id = uniqid();
            $productName = $_POST['productName'];
            $description = $_POST['description'];
            $price = (float) $_POST['price'];
            $active = isset($_POST['active']) && $_POST['active'] === 'active';

            $product = new Product($productName, $description, $price, $active, $id);

            $productRepository = new ProductRepository();
            $productRepository->persist($product);

            // Pass the product object to the view
            require_once './product/view/product-created.php';
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './product/view/product-error.php';
        }
    }
}
