<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Product
{
    public string $id;
    private string $productName;
    private string $description;
    private float $price;
    private bool $active;
    private array $products = [];

    public function __construct(string $productName, string $description, float $price, bool $active, string $id)
    {
        $this->id = $id;
        $this->productName = $productName;
        $this->description = $description;
        $this->price = ($price == 0) ? 2 : $price;
        $this->active = (bool) $active;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getActive(): bool
    {
        return $this->active;
    }
    public function createProduct()
    {
        $product = new Product($this->productName, $this->description, $this->price, $this->active, $this->id);
        return $product;
    }

    public function listActiveProduct()
    {
        foreach ($this->products as $product) {
            if ($product->getActive()) {
                $this->products[] = $product;
            }
        }
        return $this->products;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
