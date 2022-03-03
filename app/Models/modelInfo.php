<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ModelInfo extends Model
{
    protected $table = 'model_infos';
    protected $primaryKey = 'model_id';
    protected $fillable = [
        'size',
        'weight',
        'engine',
        'wattage',
        'engine_shutdown_function',
        'car_gearbox',
        'Fuel_Consumption',
        'lamp',
        'automatic_lights',
        'aluminum_alloy_lazang',
        'exhaust_pipe',
        'seats',
        'central_screen',
        'air_conditioning',
        'front_wheel_brake',
        'rear_wheel_brake',

    ];

}
