<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'user_id',
        'address',
        'total_amount',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(UserModel::class, 'id', 'user_id');
    }
}
