<?php

namespace Core\Modules\Webview\Controllers;

use App\Http\Controllers\Controller;
use Core\Services\Contract\ProductServiceContract;

class ShopController extends Controller
{
    protected $product_service;

    public function __construct(ProductServiceContract $product_service)
    {
        $this->product_service = $product_service;
    }

    public function index()
    {
        $products = $this->product_service->index();
        return view('Webview::page.shop', compact('products'));
    }

    public function getProductByCategory($key)
    {
        $products = $this->product_service->getProductByCategoryParent($key);
        return view('Webview::page.collection', compact('products'));
    }

    public function getProductDetails($id)
    {
        $product = $this->product_service->find($id);
        return view('Webview::page.product', compact('product'));
    }
}
