<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;

    protected $table = 'order_products';

    protected $fillable = [
        'order_id', 'product_id', 'stripe_id', 'stripe_product', 'stripe_price', 'quantity'
    ];

    public function products()
    {
        $this->belongsTo(Product::class, 'product_id');
    }
}
