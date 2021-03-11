<?php

namespace Core\Services;

use Core\Repositories\Contract\CategoryRepositoryContract;
use Core\Services\Contract\CategoryServiceContract;


class CategoryService implements CategoryServiceContract
{
    protected $repository;

    public function __construct(CategoryRepositoryContract $repository)
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

    public function getParents()
    {
        return $this->repository->getParents();
    }

    public function getSubCategory()
    {
        return $this->repository->getSubCategory();
    }
}
