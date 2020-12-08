<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use Filterable;

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

    public function product_detail_min_price()
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

    protected $filterable = [
        'brand' => 'brand_id',
        'model' => 'model_id',
    ];
}
