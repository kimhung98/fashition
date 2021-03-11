<?php

namespace Core\Services;

use Core\Repositories\Contract\SizeRepositoryContract;
use Core\Services\Contract\SizeServiceContract;


class SizeService implements SizeServiceContract
{
    protected $repository;

    public function __construct(SizeRepositoryContract $repository)
    {
        $this->repository = $repository;
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

    public function getSizeByCategory($id)
    {
        return $this->repository->getSizeByCategory($id);
    }
}
