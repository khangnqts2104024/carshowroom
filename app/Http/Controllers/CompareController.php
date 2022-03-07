<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelInfo;

class CompareController extends Controller
{
    public function showProduct(){
        $product = ModelInfo::all();

         }
   
         
    
    // public function findProduct(Request $request){
    //     $pro = ModelInfo::find($request);
    //     $pro -> showProduct($request);
    // }

    public function index()
    {
        $cars = ModelInfo::all();
        return view('compare', compact('cars'));
    }

}
