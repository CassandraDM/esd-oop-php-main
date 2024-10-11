<?php

require_once './order/model/entity/Order.php';
require_once './order/model/repository/OrderRepository.php';

class ProcessShippingAddressController
{
    public function processShippingAddress()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './order/view/404.php';
            return;
        }

        try {
            $orderRepository->persist($order);
            if (
                !isset($_POST['shippingCountry']) ||
                !isset($_POST['shippingCity']) ||
                !isset($_POST['shippingAddress'])
            ) {
                $errorMessage = "Can you at least fill the form?";

                require_once './order/view/order-error.php';
                return;
            }

            $shippingCountry = $_POST['shippingCountry'];
            $shippingCity = $_POST['shippingCity'];
            $shippingAddress = $_POST['shippingAddress'];

            $order->setShippingAddress($shippingAddress, $shippingCity, $shippingCountry);

            $_SESSION['order'] = $order;

            require_once './order/view/shipping-address-added.php';
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './order/view/order-error.php';
        }
    }
}
