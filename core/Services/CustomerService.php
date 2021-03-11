<?php

namespace Core\Services;

use Core\Repositories\Contract\CustomerRepositoryContract;
use Core\Services\Contract\CustomerServiceContract;


class CustomerService implements CustomerServiceContract
{
    protected $repository;

    public function __construct(CustomerRepositoryContract $repository)
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
}
