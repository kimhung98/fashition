<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Modules\Admin\Requests\CreateProductRequest;
use Core\Modules\Admin\Requests\EditProductRequest;
use Core\Services\Contract\BrandServiceContract;
use Core\Services\Contract\CategoryServiceContract;
use Core\Services\Contract\ProductServiceContract;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product_service;
    protected $brand_service;
    protected $category_service;

    public function __construct(ProductServiceContract $product_service,
                                BrandServiceContract $brand_service,
                                CategoryServiceContract $category_service)
    {
        $this->product_service = $product_service;
        $this->brand_service = $brand_service;
        $this->category_service = $category_service;
    }

    public function index()
    {
        $products = $this->product_service->index();
        return view('Admin::product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->category_service->index();
        $brands = $this->brand_service->index();
        return view('Admin::product.create', compact('brands', 'categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $this->product_service->store($request->all());
        return redirect()->route('products.index')->with('notification', 'Success');
    }

    public function edit($id)
    {
        $categories = $this->category_service->index();
        $brands = $this->brand_service->index();
        $product = $this->product_service->find($id);
        return view('Admin::product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(EditProductRequest $request, $id)
    {
        $this->product_service->update($id, $request->all());
        return redirect()->route('products.index')->with('notification', 'Success');
    }

    public function destroy($id)
    {
        $this->product_service->destroy($id);
        return redirect()->route('products.index')->with('notification', 'Success');
    }

    public function getDetails($id) {
        $product = $this->product_service->find($id);
        return view('Admin::product.details', compact('product'));
    }
}
