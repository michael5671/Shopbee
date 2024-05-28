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
        'username',
        'email',
        'password',
        'cart_id',
        'wishlist_id'
    ];
}
