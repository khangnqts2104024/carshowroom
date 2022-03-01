<?php

namespace App\Models;
use App\Models\Customer_Info;
use App\Models\orderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
   




    public function orderDetail(){
        return $this->hasMany(orderDetail::class);
    }
    public function customer(){
        return $this->belongsTo(Customer_Info::class,'customer_id','customer_id');
    }
    public function showrooms(){
        return $this->belongsTo(showroom::class,'showroom','id');
    }
}
