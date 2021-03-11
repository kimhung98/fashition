<?php

namespace Core\Repositories;

use Core\Models\OrderDetails;
use Core\Repositories\Contract\OrderDetailsRepositoryContract;

class OrderDetailsRepository implements OrderDetailsRepositoryContract
{
    protected $model;

    public function __construct(OrderDetails $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->find($id);
        return $model->destroy($id);
    }

    public function getDetailsByOrderID($id)
    {
        return $this->model->where('order_id', $id)->get();
    }
}
