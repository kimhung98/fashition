<?php

namespace Core\Repositories;

use Core\Models\Size;
use Core\Repositories\Contract\SizeRepositoryContract;

class SizeRepository implements SizeRepositoryContract
{
    protected $model;

    public function __construct(Size $model)
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

    public function getSizeByCategory($id)
    {
        return $this->model->where('category_id', $id)->get();
    }
}
