<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    public $timestamps = false;

    protected $table = "products";

    protected $fillable = [
        'name',
        'brand_id',
        'model_id',
        'description',
    ];

    public function collections()
    {
        return $this->belongsToMany(CollectionModel::class, 'product_collection', 'product_id', 'collection_id');
    }

    public function brand()
    {
        return $this->hasOne(BrandModel::class, 'id', 'brand_id'); 
    }

    public function model()
    {
        return $this->hasOne(ModelModel::class, 'id', 'model_id'); 
    }

    public function product_detail()
    {
        return $this->hasOne(ProductDetailModel::class, 'product_id', 'id');
    }

    public function colors()
    {
        return $this->belongsToMany(ColorModel::class, 'product_color', 'product_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(SizeModel::class, 'product_size', 'product_id', 'size_id');
    }
}
