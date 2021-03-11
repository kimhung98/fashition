<?php

namespace Core\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'name_unsigned',
        'parent',
    ];

    public function product()
    {
        return $this->hasMany('Core\Models\Product', 'category_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('Core\Models\Category', 'parent', 'id');
    }

    public function size()
    {
        return $this->hasMany('Core\Models\Size', 'category_id', 'id');
    }
}
