<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailModel extends Model
{
    public $timestamps = false;

    protected $table = "product_details";

    protected $fillable = [
        'product_id',
        'price',
        'color_id',
        'size_id',
    ];

    public function product()
    {
        return $this->belongsTo(ProductModel::class); 
    }
    
    public function size()
    {
        return $this->hasOne(SizeModel::class, 'id', 'size_id'); 
    }

    public function color()
    {
        return $this->hasOne(ColorModel::class, 'id', 'color_id'); 
    }
}