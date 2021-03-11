<?php

namespace Core\Repositories;

use Core\Models\Product;
use Core\Repositories\Contract\ProductRepositoryContract;

class ProductRepository implements ProductRepositoryContract
{
    protected $model;

    public function __construct(Product $model)
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

    public function getProductRandom($id)
    {
        return $this->model
            ->select('products.id', 'products.name', 'products.images', 'products.price', 'products.category_id', 'products.price_sale', 'products.short_description')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('repositories', 'repositories.product_id', '=', 'products.id')
            ->where('categories.parent', $id)
            ->where('products.highlights', 1)
            ->where('repositories.quantity', '<>', 0)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function getProductByCategoryParent($id)
    {
        return $this->model
            ->select('products.id', 'products.name', 'products.images', 'products.price', 'products.category_id', 'products.price_sale', 'products.short_description')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('repositories', 'repositories.product_id', '=', 'products.id')
            ->where('categories.parent', $id)
            ->where('repositories.quantity', '<>', 0)
            ->get();
    }
}
