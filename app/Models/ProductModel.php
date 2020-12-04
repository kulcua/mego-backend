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
}
