<?php

namespace App\Models;
use App\Models\order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
   use HasFactory;
   protected $fillable=[ 
      'model_id',
      'order_id',
      'order_price',
      'emp_received',
      'order_status',];	

      // public $primaryKey=array('model_id','order_id',);

      public $timestamps = false;
   public function orders(){
   return $this->belongsTo(order::class,'order_id','order_id');
   }
   public function modelInfos(){
      return $this->belongsTo(modelInfo::class,'model_id','model_id');
   }
 
   


}
