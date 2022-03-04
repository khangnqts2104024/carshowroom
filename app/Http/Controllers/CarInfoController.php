<?php

namespace App\Http\Controllers;
use App\Models\carInfo;
use Illuminate\Http\Request;

class CarInfoController extends Controller
{
    public function show(){
    $cars = carInfo::all();
    return view('admin.warehouse.car')->with(['cars'=> $cars]);
}
public function showroomcar(){
    $cars = carInfo::all();
    return view('admin.showroom.carreceive')->with(['cars'=> $cars]);
}
public function showroomcarpending(){
    $cars = carInfo::whereIn('car_status',['pending','custcanceled'])->get();
    return view('admin.showroom.carreceive')->with(['cars'=> $cars]);
}
public function showroomcarreceived(){
    
    $cars = carInfo::whereIn('car_status',['sold','showroom'])->get();
    return view('admin.showroom.carreceive')->with(['cars'=> $cars]);
}


public function carcancel(){
    $cars = carInfo::where('car_status','sold')->get();
    return view('admin.warehouse.cardelete')->with(['cars'=> $cars]);
}

public function released(){
    $cars = carInfo::whereIn('car_status',['pending','showroom','sold'])->get();
    return view('admin.warehouse.car_released')->with(['cars'=> $cars]);


}
}
