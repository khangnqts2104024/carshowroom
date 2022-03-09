<?php

namespace App\Models;
use App\Models\Customer_Info;
use App\Models\orderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
protected $primaryKey="order_id";
    protected $fillable=[ 
        'order_id',
        'showroom',
        'order_code',
        'customer_id',
        'order_date',	
        ];	

        public $timestamps = false;
    public function orderDetail(){
        return $this->hasMany(orderDetail::class,'order_id','order_id');
    } //tra mảng
    public function customer(){
        return $this->belongsTo(Customer_Info::class,'customer_id','customer_id');
    }
    public function showrooms(){
        return $this->belongsTo(showroom::class,'showroom','id');
    }
    public function cars(){
        return $this->hasMany(carInfo::class,'order_id','order_id');
    }
}
