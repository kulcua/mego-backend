<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelModel extends Model
{
    public $timestamps = false;
    
    protected $table = "models";

    protected $fillable = [
        'name',
        'gender_id'
    ];

    public function gender()
    {
        return $this->hasMany(GenderModel::class, 'id', 'gender_id');
    }
}
