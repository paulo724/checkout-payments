<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'stripe_id', 'order_number', 'total', 'status', 'payment_status', 'payment_status', 'payment_method', 'products_count',
        'name', 'cpf', 'email', 'phone_number', 'address', 'city', 'country', 'post_code', 'notes'
    ];


    public function products()
    {
        return $this->hasMany(OrderProducts::class);
    }
}
