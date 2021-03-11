<?php

namespace Core\Repositories;

use Core\Models\Repository as Repo;
use Core\Repositories\Contract\RepositoryContract;

class Repository implements RepositoryContract
{
    protected $model;

    public function __construct(Repo $model)
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

    public function getRepository()
    {
        return $this->model
            ->selectRaw('row_number() over ( order by product_id) stt, product_id, sum(quantity) as quantity')
            ->groupBy('product_id')
            ->get();
    }
}
