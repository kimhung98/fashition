<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Modules\Admin\Requests\CreateUserRequest;
use Core\Modules\Admin\Requests\EditUserRequest;
use Core\Services\Contract\UserServiceContract;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserServiceContract $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $users = $this->service->index();
        return view('Admin::user.index', compact('users'));
    }

    public function create()
    {
        return view('Admin::user.create');
    }

    public function store(CreateUserRequest $request)
    {
        $this->service->store($request->all());
        return redirect()->route('users.index')->with('notification', 'Success');
    }

    public function edit($id)
    {
        $user = $this->service->find($id);
        return view('Admin::user.edit', compact('user'));
    }

    public function update(EditUserRequest $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('users.index')->with('notification', 'Success');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('users.index')->with('notification', 'Success');
    }
}
