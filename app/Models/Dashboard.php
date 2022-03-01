<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'customer_infos';
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
