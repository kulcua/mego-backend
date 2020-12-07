<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    public $timestamps = false;

    protected $table = "colors";

    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'product_color', 'product_id', 'color_id');
    }
}
