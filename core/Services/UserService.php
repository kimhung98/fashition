<?php

namespace Core\Services;

use Core\Repositories\Contract\UserRepositoryContract;
use Core\Services\Contract\UserServiceContract;

class UserService implements UserServiceContract
{
    protected $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

}
