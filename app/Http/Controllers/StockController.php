<?php

namespace App\Http\Controllers;

use App\Models\stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
  

    public function show() {
        $stocks = stock::all();
        
        return view('admin.warehouse.stock')->with(['stocks'=> $stocks]);

    }
}
