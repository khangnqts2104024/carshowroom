<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showroom extends Model
{  use HasFactory;
    protected $fillable=[
    'id',
    'showroom_name',
    'address',
    'phone',
    'region',	
];

public $timestamps = false;
 public function warehouse()
{
    return $this->belongsTo(warehouse::class,'region','id');
}

}
