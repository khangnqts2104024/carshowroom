<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'model_id',
        'repo_id',
        'quantity',
        
    ];

public function warehouse(){
    return $this->belongsTo(warehouse::class,'repo_id');
}
public function model(){
    return $this->belongsTo(modelInfo::class,'model_id');
}
public $timestamps = false;
}
