<?php

namespace Core\Services;

use Core\Repositories\Contract\BrandRepositoryContract;
use Core\Services\Contract\BrandServiceContract;


class BrandService implements BrandServiceContract
{
    protected $repository;

    public function __construct(BrandRepositoryContract $repository)
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
        $data['name_unsigned'] = changeTitle($data['name']);
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        $data['name_unsigned'] = changeTitle($data['name']);
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
