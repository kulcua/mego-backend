<?php

namespace App\Models;

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
        return $this->belongsToMany(ProductModel::class, 'product_collection', 'collection_id', 'product_id');
    }

    public function gender()
    {
        return $this->hasMany(GenderModel::class, 'id', 'gender_id');
    }
}