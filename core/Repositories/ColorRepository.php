<?php

namespace Core\Repositories;

use Core\Models\Color;
use Core\Repositories\Contract\ColorRepositoryContract;

class ColorRepository implements ColorRepositoryContract
{
    protected $model;

    public function __construct(Color $model)
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
}
