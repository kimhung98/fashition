<?php

namespace Core\Repositories\Contract;

interface CustomerRepositoryContract
{
    public function index();

    public function find($id);

    public function store($data);

    public function update($id, $data);

    public function destroy($id);
}
