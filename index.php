<?php



require_once './order/controller/IndexController.php';
require_once './order/controller/ProcessOrderCreateController.php';
require_once './order/controller/PayController.php';
require_once './order/controller/ProcessPaymentController.php';
require_once './order/controller/ProcessShippingAddressController.php';
require_once './order/controller/ProcessShippingMethodController.php';
require_once './order/controller/SetShippingAddressController.php';
require_once './order/controller/SetShippingMethodController.php';
require_once './product/controller/CreateProductController.php';
require_once './product/controller/ProcessCreateProductController.php';
require_once './product/controller/ProductListController.php';

// Récupère l'url actuelle et supprime le chemin de base
// c'est à dire : http://localhost:8888/esd-oop-php-main/public/
// donc cela ne garde que la fin de l'url

$requestUri = $_SERVER['REQUEST_URI'];
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/esd-oop-php-main/', '', $uri);
$endUri = trim($endUri, '/');


if ($endUri === "") {
    $indexController = new IndexController();
    $indexController->index();
    return;
}

if ($endUri === "create-order") {
    $createOrderController = new CreateOrderController();
    $createOrderController->createOrder();
    return;
}


if ($endUri === "pay") {
    $payController = new PayController();
    $payController->pay();
    return;
}


if ($endUri === "process-payment") {
    $payController = new ProcessPaymentController();
    $payController->processPayment();
    return;
}

if ($endUri === "process-shipping-address") {
    $payController = new ProcessShippingAddressController();
    $payController->processShippingAddress();
    return;
}

if ($endUri === "process-shipping-method") {
    $payController = new ProcessShippingMethodController();
    $payController->processShippingMethod();
    return;
}

if ($endUri === "set-shipping-address") {
    $payController = new SetShippingAddressController();
    $payController->setShippingAddress();
    return;
}

if ($endUri === "set-shipping-method") {
    $payController = new SetShippingMethodController();
    $payController->setShippingMethod();
    return;
}

if ($endUri === "create-product") {
    $createProductController = new CreateProductController();
    $createProductController->createProduct();
    return;
}

if ($endUri === "product-created") {
    $processCreateProductController = new ProcessCreateProductController();
    $processCreateProductController->processCreateProduct();
    return;
}

if ($endUri === "product-list") {
    $productListController = new ProductListController();
    $productListController->productList();
    return;
}
