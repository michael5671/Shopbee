<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $table = 'book';
    
    public function cartHas()
    {
        return $this->belongsTo(CartHas::class, 'BOOK_ID', 'BOOK_ID');
    }
}
