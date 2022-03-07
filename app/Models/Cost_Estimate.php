<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;

class Cost_Estimate extends Model
{
    use HasFactory;
    protected $table = 'cost_estimates';
    protected $fillable = [
        'Inspection fee',
        'Civil liability insurance',
        'License plate fee',
        'Inspection fee'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class,'foreign_key');
    }
}

