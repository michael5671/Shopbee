<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $table = 'book';
  
      protected $primaryKey = 'BOOK_ID';
    protected $keyType = 'int'; 
    
    public $timestamps = false;
    protected $fillable = [
        'NAME',
        'ISBN',
        'AUTHOR',
        'LANGUAGE',
        'RELEASE_YEAR',
        'DESCRIPTION',
        'PAGE_QUANTITY',
        'IS_SELLING',
        'PRICE',
    ];
    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_belong', 'BOOK_ID', 'GENRES_NAME');
    }

    public function images()
    {
        return $this->hasMany(book_image::class, 'BOOK_ID',  'BOOK_ID');
    }
    public function carts(){
        return $this->belongsToMany(Cart::class, 'cart_has', 'BOOK_ID', 'CART_ID')
            ->as('item')
            ->withPivot('QUANTITY');
    }
    public function cartHas()
    {
        return $this->belongsTo(CartHas::class, 'BOOK_ID', 'BOOK_ID');
    }
}
