<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Modules\Admin\Requests\CreateBrandRequest;
use Core\Modules\Admin\Requests\EditBrandRequest;
use Core\Services\Contract\BrandServiceContract;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brand_service;

    public function __construct(BrandServiceContract $brand_service)
    {
        $this->brand_service = $brand_service;
    }

    public function index()
    {
        $brands = $this->brand_service->index();
        return view('Admin::brand.index', compact('brands'));
    }

    public function create()
    {
        return view('Admin::brand.create');
    }

    public function store(CreateBrandRequest $request)
    {
        $this->brand_service->store($request->all());
        return redirect()->route('brands.index')->with('notification', 'Success');
    }

    public function edit($id)
    {
        $brand = $this->brand_service->find($id);
        return view('Admin::brand.edit', compact('brand'));
    }

    public function update(EditBrandRequest $request, $id)
    {
        $this->brand_service->update($id, $request->all());
        return redirect()->route('brands.index')->with('notification', 'Success');
    }

    public function destroy($id)
    {
        $this->brand_service->destroy($id);
        return redirect()->route('brands.index')->with('notification', 'Success');
    }
}
