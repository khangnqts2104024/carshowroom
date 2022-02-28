<?php

namespace App\Models;
use App\Models\order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
   public function orders(){
   return $this->belongsTo(order::class,'order_id','order_id');
   }
   public function modelInfos(){
      return $this->belongsTo(modelInfo::class);
   }
}
