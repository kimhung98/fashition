<?php

namespace Core\Services;

use Core\Repositories\Contract\OrderDetailsRepositoryContract;
use Core\Services\Contract\OrderDetailsServiceContract;


class OrderDetailsService implements OrderDetailsServiceContract
{
    protected $repository;

    public function __construct(OrderDetailsRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function getDetailsByOrderID($id)
    {
        return $this->repository->getDetailsByOrderID($id);
    }
}
