<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public $timestamps = false;
    protected $primaryKey = 'CART_ID';
    protected $fillable = [
        'CUSTOMER_ID',
        'QUANTITY'
    ];
    public function books()
    {
        return $this->belongsToMany(Book::class, 'cart_has', 'CART_ID', 'BOOK_ID')
            ->as('item')
            ->withPivot('QUANTITY');
    }
    public function items()
    {
        return $this->hasMany(CartItem::class, 'CART_ID');
    }
}
