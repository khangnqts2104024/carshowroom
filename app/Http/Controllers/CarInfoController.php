<?php

namespace App\Http\Controllers;
use App\Models\carInfo;
use App\Models\orderDetail;
use App\Models\stock;
use Illuminate\Http\Request;

class CarInfoController extends Controller
{

    //tất cả xe ben warehouse
    public function show(){
    $cars = carInfo::all();
    return view('admin.warehouse.car')->with(['cars'=> $cars]);
}

//tat cả xe bên showroom
public function showroomcar(){
    $cars = carInfo::all();
    return view('admin.showroom.carreceive')->with(['cars'=> $cars]);
}


//xe trong qua trinh vận chuyển đi,về warehouse
public function showroomcarpending(){
    $cars = carInfo::whereIn('car_status',['pending','custcanceled'])->get();
    return view('admin.showroom.carreceive')->with(['cars'=> $cars]);
}


// xe showroom đã nhận
public function showroomcarreceived(){
    
    $cars = carInfo::whereIn('car_status',['sold','showroom'])->get();
    return view('admin.showroom.carreceive')->with(['cars'=> $cars]);
}

//xe  khach huy, sau khi dealer huy . status cuscanceled
public function carcancel(){
    $cars = carInfo::where('car_status','custcanceled')->get();
    return view('admin.warehouse.cardelete')->with(['cars'=> $cars]);
}
//xe đã xuat kho
public function released(){
    $cars = carInfo::whereIn('car_status',['pending','showroom','sold'])->get();
    return view('admin.warehouse.car_released')->with(['cars'=> $cars]);


}


// xoa xe 

public function cardelete($id){
    $car=carInfo::where('car_id',$id);
    $selectcar=$car->first();

    
//    dd($a->showrooms->region);// lấy werehouse id
    $stock=stock::where('repo_id',$selectcar->showrooms->region)->where('model_id',$selectcar->car_model)->first();
    $stock->quantity=$stock->quantity+1;
    $stock->save();
   //tim stock sau do tang len va xoa car id;
    $car->delete();

  
    return redirect()->action('CarInfoController@carcancel');
    

}

public function carcreate(Request $request){
    $info=$request->all();
    $car= new carInfo($info);

    $order=orderDetail::where('order_id',$info['order_id'])->where('model_id',$info['car_model'])->first();
    $order->update(['order_status'=>'released']);
    dd($order);
  

    
    $car->save();


    // dd($car);
    return redirect()->action('OrderDetailController@confirmtatus');


}


}
