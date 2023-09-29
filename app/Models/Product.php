<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table = 'products';

    protected $fillable = [
        'code', 'name', 'description', 'description_services', 'value', 'status', 'quantity', 'min_quantity', 'max_quantity', 'promotion', 'end_of_promotion',
        'stripe_prod', 'patner', 'img', 'category', 'type'
    ];

    protected $casts = [
        'description_services' => 'array'
    ];
}
