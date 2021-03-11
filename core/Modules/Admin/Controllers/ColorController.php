<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Modules\Admin\Requests\CreateBrandRequest;
use Core\Modules\Admin\Requests\EditBrandRequest;
use Core\Services\Contract\BrandServiceContract;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $color_service;

    public function __construct(BrandServiceContract $color_service)
    {
        $this->color_service = $color_service;
    }

    public function index()
    {
        $brands = $this->color_service->index();
        return view('Admin::brand.index', compact('brands'));
    }

    public function create()
    {
        return view('Admin::brand.create');
    }

    public function store(CreateBrandRequest $request)
    {
        $this->color_service->store($request->all());
        return redirect()->route('brands.index')->with('notification', 'Success');
    }

    public function edit($id)
    {
        $brand = $this->color_service->find($id);
        return view('Admin::brand.edit', compact('brand'));
    }

    public function update(EditBrandRequest $request, $id)
    {
        $this->color_service->update($id, $request->all());
        return redirect()->route('brands.index')->with('notification', 'Success');
    }

    public function destroy($id)
    {
        $this->color_service->destroy($id);
        return redirect()->route('brands.index')->with('notification', 'Success');
    }
}
