<?php

namespace Core\Services\Contract;

interface OrderDetailsServiceContract
{
    public function index();

    public function find($id);

    public function store($data);

    public function update($id, $data);

    public function destroy($id);

    public function getDetailsByOrderID($id);
}
