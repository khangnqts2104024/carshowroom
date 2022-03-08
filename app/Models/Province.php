<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cost_Estimate;


class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'matp';
    protected $fillable = [
        'matp',
        'name'
    ];

    public function cost_estimates()
    {
        return $this->hasOne(Cost_Estimate::class,'matp','matp');   
    }
}
