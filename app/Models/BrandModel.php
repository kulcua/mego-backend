<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    public $timestamps = false;

    protected $table = "brands";

    protected $fillable = [
        'name'
    ];
}
