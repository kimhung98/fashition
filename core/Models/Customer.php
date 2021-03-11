<?php

namespace Core\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    public function order()
    {
        return $this->hasOne('Core\Models\Order', 'customer_id', 'id');
    }
}
