<?php

require_once './order/model/entity/Order.php';
require_once './order/model/repository/OrderRepository.php';

class ProcessShippingMethodController
{
    public function processShippingMethod()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();

        if (!$order) {
            require_once './order/view/404.php';
            return;
        }

        try {
            $orderRepository->persist($order);

            if (!isset($_POST['shippingMethod'])) {
                $errorMessage = "Can you at least fill the form?";

                require_once './order/view/order-error.php';
                return;
            }

            $shippingMethod = $_POST['shippingMethod'];

            $order->setShippingMethod($shippingMethod);

            $_SESSION['order'] = $order;

            require_once './order/view/shipping-method-added.php';
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './order/view/order-error.php';
        }
    }
}
