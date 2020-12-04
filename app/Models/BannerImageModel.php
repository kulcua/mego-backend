<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerImageModel extends Model
{
    public $timestamps = false;
    
    protected $table = "banner_images";

    protected $fillable = [
        'name',
        'origin_name',
        'priority'
    ];
}
