<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatalogModel extends Model
{
    public $timestamps = false;

    protected $table = "product_catalogs";

    protected $fillable = [
        'name',
        'gender_id',
    ];
}
