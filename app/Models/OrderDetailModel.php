<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    public $timestamps = false;

    protected $table = "order_details";

    protected $fillable = [
        'product_detail_id',
        'order_id',
        'number',
    ];

    public function product_detail()
    {
        return $this->hasOne(ProductDetailModel::class, 'id', 'product_detail_id');
    }

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'order_id', 'id');
    }
}
