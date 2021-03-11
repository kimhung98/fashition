<?php

namespace Core\Modules\Webview\Controllers;

use App\Http\Controllers\Controller;
use Core\Services\Contract\ProductServiceContract;

class HomeController extends Controller
{
    protected $product_service;

    public function __construct(ProductServiceContract $product_service)
    {
        $this->product_service = $product_service;
    }

    public function index()
    {
        $product_men = $this->product_service->getProductRandom(1);
        $product_women = $this->product_service->getProductRandom(2);
        return view('Webview::page.index', compact('product_women', 'product_men'));
    }
}
