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

    public function findByIds(array $ids)
    {

        $allProducts = $this->findAllProducts();

        $products = [];
        foreach ($ids as $id) {
            $product = array_filter($allProducts, function ($product) use ($id) {
                return $product->getId() == $id;
            });
            if (!empty($product)) {
                $products[] = array_shift($product);
            }
        }
        return $products;
    }
}
