<?php

namespace Core\Models;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $table = 'repositories';

    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo('Core\Models\Product', 'product_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo('Core\Models\Color', 'color_id', 'id');
    }
}
