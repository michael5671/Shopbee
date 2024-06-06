<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'book_image';
    protected $fillable = [
        'BOOK_ID',
        'IMAGE_LINK'
    ];
}
