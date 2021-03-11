<?php

namespace Core\Services;

use Core\Repositories\Contract\ProductRepositoryContract;
use Core\Services\Contract\ProductServiceContract;


class ProductService implements ProductServiceContract
{
    protected $product_repository;

    public function __construct(ProductRepositoryContract $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function index()
    {
        return $this->product_repository->index();
    }

    public function find($id)
    {
        return $this->product_repository->find($id);
    }

    public function store($data)
    {
        $file = $data['images'];
        $arr_product_image = [];
        foreach ($file as $file) {
            $image_name = $file->getClientOriginalName();
            $image_name_change = random_int(1000, 9999) . '_' . $image_name;
            while (file_exists('image/product/' . $image_name_change)) {
                $image_name_change = random_int(1000, 9999) . "_" . $image_name;
            }
            $file->move('image/product/', $image_name_change);
            array_push($arr_product_image, $image_name_change);
        }
        $data['images'] = implode(',', $arr_product_image);
        $data['name_unsigned'] = changeTitle($data['name']);
        return $this->product_repository->store($data);
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $files = $data['image'];
            $arr_product_image = [];
            foreach ($files as $file) {
                $image_name = $file->getClientOriginalName();
                $image_name_change = random_int(1000, 9999) . '_' . $image_name;
                while (file_exists('img/details/' . $image_name_change)) {
                    $image_name_change = random_int(1000, 9999) . "_" . $image_name;
                }
                $file->move('image/product', $image_name_change);
                array_push($arr_product_image, $image_name_change);
            }
            $data['images'] = implode(',', $arr_product_image);
            $product = $this->product_repository->find($id);
            foreach (explode(',', $product->image) as $value) {
                unlink("image/product" . $value);
            }
        }
        $data['name_unsigned'] = changeTitle($data['name']);
        return $this->product_repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->product_repository->destroy($id);
    }

    public function getProductRandom($id)
    {
        return $this->product_repository->getProductRandom($id);
    }

    public function getProductByCategoryParent($key)
    {
        if ($key == 'nam') {
            return $this->product_repository->getProductByCategoryParent(1);
        } elseif ($key == 'nu') {
            return $this->product_repository->getProductByCategoryParent(2);
        }
    }
}
