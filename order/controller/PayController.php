<?php

require_once './order/model/repository/OrderRepository.php';

class PayController
{
    public function pay()
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->find();


        if (!$order) {
            require_once '.common/view/404.php';
            return;
        }

        // Pass the $order variable to the view
        $this->renderPayView($order);
    }

    private function renderPayView($order)
    {
        // Extract the $order variable to make it available in the view
        extract(['order' => $order]);
        require_once './order/view/pay.php';
    }
}
