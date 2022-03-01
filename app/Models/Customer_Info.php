<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Customer_Info extends Model
{
    use HasFactory;
    protected $table = 'customer_infos';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'email',
        'phone_number',
        'address',
        'citizen_id',
        'fullname'
    ];

    public function Customer_Account()
    {
        
        return $this->hasOne(User::class,'foreign_key');
        
    }
}
