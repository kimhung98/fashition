<?php

namespace Core\Repositories;

use Core\Models\Customer;
use Core\Models\Order;
use Core\Models\OrderDetails;
use Core\Repositories\Contract\CartRepositoryContract;

class CartRepository implements CartRepositoryContract
{
    protected $customer;
    protected $order;
    protected $order_details;

    public function __construct(Customer $customer, Order $order, OrderDetails $order_details)
    {
        $this->customer = $customer;
        $this->order = $order;
        $this->order_details = $order_details;
    }

    public function addCustomer($data)
    {

        return $this->customer->create($data);
    }

    public function addOrder($data)
    {
        return $this->order->create($data);
    }

    public function addOrderDetails($data)
    {
        return $this->order_details->create($data);
    }
}
