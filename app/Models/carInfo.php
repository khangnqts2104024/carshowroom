<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id', 
        'car_model',
        'car_branch',
        'car_status', 
        'order_id',
        'manufactoring_date',
    ];

    public function showrooms()
    {
        return $this->belongsTo(showroom::class,'car_branch');
    }
    public function models()
    {
        return $this->belongsTo(modelInfo::class,'car_model','model_id');
    }
    public function orders()
    {
        return $this->belongsTo(order::class,'order_id','order_id');
    }

    protected $primaryKey = 'car_id';
    public $timestamps = false;
}
