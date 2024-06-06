<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class Customer extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = 'customer';
    public $timestamps = false;
    protected $primaryKey = 'CUSTOMER_ID';

    public static function paginate(int $int)
    {
    }


    public function getAuthIdentifierName()
    {
        return 'CUSTOMER_ID';
    }

    public function getAuthIdentifier(): string
    {
        return $this->CUSTOMER_ID;

    }

    public function getAuthPassword()
    {
        return Hash::make($this->PASSWORD);
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        return null;
    }

    public function getRememberTokenName()
    {
        return null;
    }
    protected $fillable = [
        'USERNAME',
        'EMAIL',
        'PASSWORD',
        'CART_ID',
        'WISHLIST_ID'
    ];
    public function cart()
    {
        return $this->hasOne(Cart::class, 'CART_ID', 'CART_ID');
    }
}
