<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Modules\Admin\Requests\CreateRepositoryRequest;
use Core\Services\Contract\ColorServiceContract;
use Core\Services\Contract\ProductServiceContract;
use Core\Services\Contract\RepositoryServiceContract;
use Core\Services\Contract\SizeServiceContract;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    protected $repository_service;
    protected $product_service;
    protected $size_service;
    protected $color_service;

    public function __construct(RepositoryServiceContract $repository_service,
                                ProductServiceContract $product_service,
                                SizeServiceContract $size_service,
                                ColorServiceContract $color_service)
    {
        $this->repository_service = $repository_service;
        $this->product_service = $product_service;
        $this->size_service = $size_service;
        $this->color_service = $color_service;
    }

    public function index()
    {
        $repositories = $this->repository_service->getRepository();
        return view('Admin::repository.index', compact('repositories'));
    }

    public function create()
    {
        $products = $this->product_service->index();
        $colors = $this->color_service->index();
        return view('Admin::repository.create', compact('products', 'colors'));
    }

    public function store(CreateRepositoryRequest $request)
    {
        $this->repository_service->store($request->all());
        return redirect()->route('repositories.index')->with('notification', 'Success');
    }

    public function edit($id)
    {
        $brand = $this->repository_service->find($id);
        return view('Admin::repository.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->repository_service->update($id, $request->all());
        return redirect()->route('repositories.index')->with('notification', 'Success');
    }

    public function destroy($id)
    {
        $this->repository_service->destroy($id);
        return redirect()->route('repositories.index')->with('notification', 'Success');
    }

    public function getAjax($id)
    {
        $size = $this->repository_service->getSize($id);
        echo '<option value="">--- Chọn size ---</option>';
        foreach ($size as $sz) {
            echo "<option value='" . $sz->id . "'>" . $sz->size . "</option>";
        }
    }
}
