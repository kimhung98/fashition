<?php

namespace Core\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'name_unsigned',
        'images',
        'price',
        'price_sale',
        'highlights',
        'brand_id',
        'category_id',
        'short_description',
        'description',
    ];

    public function brand()
    {
        return $this->belongsTo('Core\Models\Brand', 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('Core\Models\Category', 'category_id', 'id');
    }

    public function repository()
    {
        return $this->hasMany('Core\Models\Repository', 'product_id', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany('Core\Models\OrderDetails', 'product_id', 'id');
    }

    public function size()
    {
        return $this->hasMany('Core\Models\Size', 'product_id', 'id');
    }
}
