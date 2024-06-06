<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;
    protected $table = 'order_item';

    public function order()
    {
        return $this->belongsTo(Order::class, 'ORDER_ID', 'ORDER_ID');
    }

    public function book()
    {
        return $this->hasMany(book::class, 'BOOK_ID', 'BOOK_ID');
    }

    public function caculateTotalBooksPrice()
    {
        $book = $this->book->first();

        return $book->PRICE * $this->QUANTITY;
    }
}
