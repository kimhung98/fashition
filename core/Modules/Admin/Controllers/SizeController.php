<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Modules\Admin\Requests\CreateSizeRequest;
use Core\Modules\Admin\Requests\EditSizeRequest;
use Core\Services\Contract\CategoryServiceContract;
use Core\Services\Contract\SizeServiceContract;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    protected $size_service;
    protected $category_service;

    public function __construct(SizeServiceContract $size_service, CategoryServiceContract $category_service)
    {
        $this->size_service = $size_service;
        $this->category_service = $category_service;
    }

    public function index()
    {
//        $brands = $this->size_service->index();
//        return view('Admin::size.index', compact('brands'));
    }

    public function create()
    {
        $categories = $this->category_service->getSubCategory();
        return view('Admin::size.create', compact('categories'));
    }

    public function store(CreateSizeRequest $request)
    {
        $this->size_service->store($request->all());
        return redirect()->route('sizes.create')->with('notification', 'Success');
    }

    public function edit($id)
    {
        $brand = $this->size_service->find($id);
        return view('Admin::size.edit', compact('brand'));
    }

    public function update(EditSizeRequest $request, $id)
    {
        $this->size_service->update($id, $request->all());
        return redirect()->route('brands.index')->with('notification', 'Success');
    }

    public function destroy($id)
    {
        $this->size_service->destroy($id);
        return redirect()->route('brands.index')->with('notification', 'Success');
    }
}
