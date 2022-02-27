<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeeInfo extends Model
{
    protected $table = 'employee_infos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'phone_number',
        'address',
        'fullname',
    ];
    
    public function employee_Account()
    {
        
        return $this->hasOne(employeeAccount::class,'foreign_key');
        
    }
}
