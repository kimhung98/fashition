<?php

namespace Core\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $fillable = [
        'category_id',
        'size',
    ];

    public function category()
    {
        return $this->belongsTo('Core\Models\Category', 'category_id', 'id');
    }
}
