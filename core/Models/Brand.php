<?php

namespace Core\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'name_unsigned',
    ];

    public function product()
    {
        return $this->hasMany('Core\Models\Product', 'brand_id', 'id');
    }
}
