<?php

namespace Core\Services\Contract;

interface BrandServiceContract
{
    public function index();

    public function find($id);

    public function store($data);

    public function update($id, $data);

    public function destroy($id);
}
