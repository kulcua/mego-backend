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
        'cost', //gia goc
        'price', //gia ban
        'color_id',
        'size_id',
        'product_cata_id',
    ];

    public function product_detail_photos()
    {
        return $this->hasMany(ImageModel::class); 
    }
}
