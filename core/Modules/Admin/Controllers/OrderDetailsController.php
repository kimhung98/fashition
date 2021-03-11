<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Services\Contract\BrandServiceContract;
use Core\Services\Contract\OrderDetailsServiceContract;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    protected $order_details_service;

    public function __construct(OrderDetailsServiceContract $order_details_service)
    {
        $this->order_details_service = $order_details_service;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
