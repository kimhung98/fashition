<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Services\Contract\CustomerServiceContract;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer_service;

    public function __construct(CustomerServiceContract $customer_service)
    {
        $this->customer_service = $customer_service;
    }

    public function index()
    {
        $customers = $this->customer_service->index();
        return view('Admin::customer.index', compact('customers'));
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
        return $this->customer_service->destroy($id);
    }
}
