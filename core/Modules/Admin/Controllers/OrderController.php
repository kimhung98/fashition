<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Services\Contract\OrderServiceContract;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order_service;

    public function __construct(OrderServiceContract $order_service)
    {
        $this->order_service = $order_service;
    }

    public function index()
    {
        $orders = $this->order_service->index();
        return view('Admin::order.index', compact('orders'));
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
