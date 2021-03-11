<?php

namespace Core\Repositories\Contract;

interface CartRepositoryContract
{
    public function addCustomer($data);

    public function addOrder($data);

    public function addOrderDetails($data);
}
