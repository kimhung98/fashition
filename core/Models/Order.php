<?php

namespace Core\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'total',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo('Core\Models\Customer', 'customer_id', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany('Core\Models\OrderDetails', 'product_id', 'id');
    }
}
