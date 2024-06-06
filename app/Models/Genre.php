<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $primaryKey = 'GENRES_NAME';
    protected $keyType = 'string'; 
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['GENRES_NAME'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_belong', 'GENRES_NAME', 'BOOK_ID');
    }
}
