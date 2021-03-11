<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Modules\Admin\Requests\CreateCategoryRequest;
use Core\Modules\Admin\Requests\EditCategoryRequest;
use Core\Services\Contract\CategoryServiceContract;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category_service;

    public function __construct(CategoryServiceContract $category_service)
    {
        $this->category_service = $category_service;
    }

    public function index()
    {
        $categories = $this->category_service->index();
        return view('Admin::category.index', compact('categories'));
    }

    public function create()
    {
        $parents = $this->category_service->getParents();
        return view('Admin::category.create', compact('parents'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $this->category_service->store($request->all());
        return redirect()->route('categories.index')->with('notification', 'Success');
    }

    public function edit($id)
    {
        $parents = $this->category_service->getParents();
        $category = $this->category_service->find($id);
        return view('Admin::category.edit', compact('category', 'parents'));
    }

    public function update(EditCategoryRequest $request, $id)
    {
        $this->category_service->update($id, $request->all());
        return redirect()->route('categories.index')->with('notification', 'Success');
    }

    public function destroy($id)
    {
        $this->category_service->destroy($id);
        return redirect()->route('categories.index')->with('notification', 'Success');
    }
}
