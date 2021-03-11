<?php

namespace Core\Services;

use Core\Repositories\Contract\RepositoryContract;
use Core\Services\Contract\ProductServiceContract;
use Core\Services\Contract\RepositoryServiceContract;
use Core\Services\Contract\SizeServiceContract;


class RepositoryService implements RepositoryServiceContract
{
    protected $repository;
    protected $product_service;
    protected $size_service;

    public function __construct(RepositoryContract $repository,
                                ProductServiceContract $product_service,
                                SizeServiceContract $size_service)
    {
        $this->repository = $repository;
        $this->product_service = $product_service;
        $this->size_service = $size_service;
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

    public function getRepository()
    {
        return $this->repository->getRepository();
    }

    public function getSize($id)
    {
        $product = $this->product_service->find($id);
        $category_id = $product->category->id;
        return $this->size_service->getSizeByCategory($category_id);
    }
}
