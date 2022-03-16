<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelInfo extends Model
{  use HasFactory;
    protected $fillable=[ 
        'model_id',
        'model_name',
        'car_type',
        'price',
        'color',
        'size',
        'weight',
        'engine',
        'wattage',
        'engine_shutdown_function',
        'car_gearbox',
        'fuel_consumption',
        'lamp',
        'automatic_lights',
        'alluminum_alloy_lazang',
        'exhaust_pipe',
        'seat',
        'central_screen',
        'air_conditioning',
        'front_wheel_brake',
        'rear_wheel_brake',
        'image',
        'gif',
        ];	
        public $timestamps = false;
        protected $primaryKey='model_id';
         public function model_stock()
        {
            return $this->hasMany(stock::class,'id','model_id');
        }
									

}
