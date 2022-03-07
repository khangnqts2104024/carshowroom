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
    public function addstock(Request $request,$id) {
        $add = $request->all();
       
       
        // dd($stocks);
        $s=stock::find($id);
        $s->quantity+= $add['stock'];
       $s->save();

        return redirect()->back();

    }
}
