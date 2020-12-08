<?php

namespace App\Models;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionModel extends Model
{
    public $timestamps = false;

    protected $table = "collections";

    protected $fillable = [
        'name',
        'gender_id',
    ];

    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'product_collection', 'product_id', 'collection_id');
    }

    public function gender()
    {
        return $this->hasMany(GenderModel::class, 'id', 'gender_id');
    }

    protected $filterable = [
        'brand' => 'brand_id',
        'model' => 'model_id',
    ];
}