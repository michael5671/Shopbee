<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHas extends Model
{
    use HasFactory;
    protected $table = 'cart_has';

    public function carts()
    {
        return $this->hasMany(Cart::class, 'CART_ID', 'CART_ID');
    }

    public function books()
    {
        return $this->hasMany(book::class, 'BOOK_ID', 'BOOK_ID');
    }
}
