<?php

require_once './product/model/entity/Product.php';


class ProductRepository
{

    public function __construct()
    {
        session_start();
    }
    public function persist(Product $product)
    {

        $id = $product->getId();

        $_SESSION['product'][$id] = $product;
        return $product;
    }

    public function find()
    {
        if (!isset($_SESSION['product'])) {
            return null;
        }
        return $_SESSION['product'];
    }

    public function findAllProducts()
    {
        if (!isset($_SESSION['product'])) {
            return null;
        }
        return $_SESSION['product'];
    }
}
