<?php

namespace Core\Services\Contract;

interface CartServiceContract
{
    public function addCart($id, $data);

    public function destroy($id);

    public function checkout($data);

    public function update($data);
}
