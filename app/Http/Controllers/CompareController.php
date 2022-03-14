<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\modelInfo;
class CompareController extends Controller
{
     
    // public function findProduct(Request $request){
    //     $pro = ModelInfo::find($request);
    //     $pro -> showProduct($request);
    // }

    public function index()
    {
        
        $cars = ModelInfo::get()->groupBy('model_name');
    
        return view('compare', compact('cars'));

    }

}
