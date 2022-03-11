<?php

namespace App\Http\Controllers;

use App\Models\carInfo;
use App\Models\orderDetail;
use App\Models\stock;
use App\Models\showroom;
use Illuminate\Http\Request;
use LaravelTreats\Model\Traits;


use Illuminate\Database\Eloquent\Builder;

class CarInfoController extends Controller
{

    //tất cả xe ben warehouse
    public function show()
    {
        $cars = carInfo::all();
        return view('admin.warehouse.car')->with(['cars' => $cars]);
    }

    //tat cả xe bên showroom
    public function showroomcar()
    {
        $cars = carInfo::all();
        return view('admin.showroom.carreceive')->with(['cars' => $cars]);
    }


    //xe trong qua trinh vận chuyển đi,về warehouse
    public function showroomcarpending()
    {
        $cars = carInfo::whereIn('car_status', ['pending', 'custcanceled'])->get();
        return view('admin.showroom.carreceive')->with(['cars' => $cars]);
    }


    // xe showroom đã nhận
    public function showroomcarreceived()
    {

        $cars = carInfo::whereIn('car_status', ['sold', 'showroom'])->get();
        return view('admin.showroom.carreceive')->with(['cars' => $cars]);
    }

    //xe  khach huy, sau khi dealer huy . status cuscanceled
    public function carcancel()
    {
        $cars = carInfo::where('car_status', 'custcanceled')->get();
        return view('admin.warehouse.cardelete')->with(['cars' => $cars]);
    }
    //xe đã xuat kho

    public function released()
    {
        $cars = carInfo::where('car_status', 'pending')->get();
        return view('admin.warehouse.car_released')->with(['cars' => $cars]);
    }


    // xoa xe 

    public function cardelete($id)
    {
        $car = carInfo::where('car_id', $id);
        $selectcar = $car->first();


        //    dd($a->showrooms->region);// lấy werehouse id
        $stock = stock::where('repo_id', $selectcar->showrooms->region)->where('model_id', $selectcar->car_model)->first();
        $stock->quantity = $stock->quantity + 1;
        $stock->save();
        //tim stock sau do tang len va xoa car id;
        $car->delete();


        return redirect()->action('CarInfoController@carcancel');
    }
    //xuất kho
    public function carcreate(Request $request)
    {
        $info = $request->all();
        $car = new carInfo($info);

        $order = orderDetail::where('order_id', $info['order_id'])->where('model_id', $info['car_model'])->first();
        $order->order_status = 'released';

        $region = showroom::select('region')->where('id', $info['car_branch'])->first();

        $stock = stock::where('model_id', $info['car_model'])->where('repo_id', $region['region'])->first();

        if($stock==null){
            $a="Có gì đó sai sai! Dòng xe này chưa được cập nhật dữ liệu tồn kho!model chưa actived, tìm thằng dealer gỏ đầu nó nha!^_^";
        } 
        else if ( $stock->quantity > 0) {
            $stock->quantity -= 1;
           $carsave= $car->save();
           $ordersave= $order->save();
            $stocksave=$stock->save();
            if (
                $carsave && $ordersave && $stocksave
            ) {
                $a = "Xe Đã Xuất Kho!";
            } else {
                $a = "có gì đó sai sai!,đề nghị kiểm tra lại!";
            }
        } else {
            $a =  "Model " . $stock->model->model_name . "-".$stock->model->color." tai kho " . $stock->warehouse->warehouse_name . " đã hết, mời đặt thêm!";
        }
        return redirect()->back()->with(['a' => $a]);
    }

    public function carpending($id)
    {
        $car = carInfo::find($id);
        if ($car->car_status === 'pending') {
            $car->car_status = 'showroom';
            $message = 'Đã Xác nhận xe đến showroom';
            $car->save();
        } else {
            $message = 'Có gì đó sai sai, check lại hỏi sếp nha!';
        }

        return redirect()->back()->with(['message' => $message]);
    }
}
