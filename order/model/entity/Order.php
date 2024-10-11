<?php

class Order
{

	public static $CART_STATUS = "CART";
	public static $SHIPPING_ADDRESS_SET_STATUS = "SHIPPING_ADDRESS_SET";
	public static $SHIPPING_METHOD_SET_STATUS = "SHIPPING_METHOD_SET";
	public static $PAID_STATUS = "PAID";
	public static $MAX_PRODUCTS_BY_ORDER = 5;
	public static $BLACKLISTED_CUSTOMERS = ['David Robert'];
	public static $UNIQUE_PRODUCT_PRICE = 5;
	public static $AUTORIZED_SHIPPING_COUNTRIES = ['France', 'Belgique', 'Luxembourg'];
	public static $AVAILABLE_SHIPPING_METHODS = ['Chronopost Express', 'Point relais', 'Domicile'];
	public static $PAID_SHIPPING_METHOD = 'Chronopost Express';
	public static $PAID_SHIPPING_METHODS_COST = 5;

	private array $products = [];

	private string $customerName;

	private float $totalPrice;

	private int $id;
	private DateTime $createdAt;

	private string $status;

	private ?string $shippingMethod;

	private ?string $shippingCity;

	private ?string $shippingAddress;

	private ?string $shippingCountry;

	public function __construct(string $customerName, array $products)
	{

		if (count($products) > Order::$MAX_PRODUCTS_BY_ORDER) {
			throw new Exception("Vous ne pouvez pas commander plus de " . Order::$MAX_PRODUCTS_BY_ORDER . " produits");
		}

		if (in_array($customerName, Order::$BLACKLISTED_CUSTOMERS)) {
			throw new Exception("Vous êtes blacklisté");
		}

		$this->status = Order::$CART_STATUS;
		$this->createdAt = new DateTime();
		$this->id = rand();
		$this->customerName = $customerName;
		$this->totalPrice = count($products) * Order::$UNIQUE_PRODUCT_PRICE;
		$this->products = $products;
	}

	public function getCustomerName(): string
	{
		return $this->customerName;
	}
	public function getProducts(): array
	{
		return $this->products;
	}

	public function getTotalPrice(): float
	{
		return $this->totalPrice;
	}

	public function getShippingMethod(): ?string
	{
		return $this->shippingMethod;
	}
	public function getShippingCity(): ?string
	{
		return $this->shippingCity;
	}
	public function getShippingAddress(): ?string
	{
		return $this->shippingAddress;
	}
	public function getShippingCountry(): ?string
	{
		return $this->shippingCountry;
	}


	private function calculateTotalCart(): float
	{
		return count($this->products) * Order::$UNIQUE_PRODUCT_PRICE;
	}


	public function removeProduct(string $product)
	{
		$this->removeProductFromList($product);
		$this->totalPrice = $this->calculateTotalCart();

		$productsAsString = implode(',', $this->products);
		echo "Product List : {$productsAsString}</br></br>";
	}

	private function removeProductFromList(string $product)
	{
		if (($key = array_search($product, $this->products)) !== false) {
			unset($this->products[$key]);
		}
	}


	public function addProduct(string $product): void
	{

		if ($this->isProductInCart($product)) {
			throw new Exception('Product already in cart');
		}

		if ($this->status === Order::$CART_STATUS) {
			throw new Exception('You can no longer add products to the cart');
		}

		if (count($this->products) >= Order::$MAX_PRODUCTS_BY_ORDER) {
			throw new Exception('You can\'t add more than ' . Order::$MAX_PRODUCTS_BY_ORDER . ' products');
		}

		$this->products[] = $product;
		$this->totalPrice = $this->calculateTotalCart();
	}

	private function isProductInCart(string $product): bool
	{
		return in_array($product, $this->products);
	}

	public function setShippingAddress(string $shippingCity, string $shippingAddress, string $shippingCountry): void
	{
		if ($this->status !== Order::$CART_STATUS) {
			throw new Exception(message: 'You can no longer change your address');
		}

		if (!in_array($shippingCountry, Order::$AUTORIZED_SHIPPING_COUNTRIES)) {
			throw new Exception(message: 'You can\'t be delivered in this country');
		}

		$this->shippingAddress = $shippingAddress;
		$this->shippingCity = $shippingCity;
		$this->shippingCountry = $shippingCountry;
		$this->status = Order::$SHIPPING_ADDRESS_SET_STATUS;
	}

	public function setShippingMethod(string $shippingMethod): void
	{
		if ($this->status !== Order::$SHIPPING_ADDRESS_SET_STATUS) {
			throw new Exception(message: 'You can\'t choose a shipping method before setting the address');
		}

		if (!in_array($shippingMethod, Order::$AVAILABLE_SHIPPING_METHODS)) {
			throw new Exception(message: 'This shipping method is not available');
		}

		if ($shippingMethod === Order::$PAID_SHIPPING_METHOD) {
			$this->totalPrice = $this->totalPrice + Order::$PAID_SHIPPING_METHODS_COST;
		}
		$this->shippingMethod = $shippingMethod;
		$this->status = Order::$SHIPPING_METHOD_SET_STATUS;
	}


	public function pay(): void
	{
		if ($this->status !== Order::$SHIPPING_METHOD_SET_STATUS) {
			throw new Exception(message: 'You can\'t pay before setting the shipping method');
		}

		$this->status = Order::$PAID_STATUS;
	}
}
