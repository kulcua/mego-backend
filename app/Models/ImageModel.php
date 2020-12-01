<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    public $timestamps = false;
    
    protected $table = "images";

    protected $fillable = [
        'name',
        'origin_name',
        'product_detail_id'
    ];

    public function product_detail() {
        return $this->belongsTo(ProductDetailModel::class);
    }
}
