<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouse extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id',
        'warehouse_name',
        'address',
        'phone',
    ];


public function cars(){
    return $this->hasManyThrough(
        carInfo::class,showroom::class,'region','car_branch','id'
    );

}
  public function showrooms(){
      return $this->hasMany(showroom::class,'region','id' );}


    public $timestamps = false;





}
