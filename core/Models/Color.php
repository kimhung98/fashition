<?php

namespace Core\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    protected $fillable = [
        'name',
        'color',
    ];

    public function product()
    {
        return $this->belongsTo('Core\Models\Product', 'product_id', 'id');
    }
}
