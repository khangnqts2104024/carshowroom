<?php

namespace App\Http\Controllers;

use App\Models\modelInfo;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ModelInfoController extends Controller
{


    public function addModel (){
        return view('admin.general.add_model');
    }
    public function allModel (){
        // $all_model=DB::table('model_infos')->get();
     
        // return view('admin.general.all_model',with(['all_model',$all_model]));
        $all_model = DB::table('model_infos')->get();
        $manage_model = view('admin.general.all_model')->with('all_model', $all_model);
        // dd($manage_model);
        return view('layouts_admin.layoutadmin')->with('admin.general.all_model', $manage_model);
     
        
    }
    public function saveModel (Request $request){
        $data = array();
        // $data['model_id'] = $request->model_id; //$data['model_id'] la ten cot trong bang, $request->model_id la name cua element
        $data['model_name'] = $request->model_name;
        $data['car_type'] = $request->car_type;
        $data['price'] = $request->price;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['engine_shutdown_function'] = $request->engine_shutdown_function; //
        $data['weight'] = $request->weight;
        $data['engine'] = $request->engine; //
        $data['wattage'] = $request->wattage;
        $data['car_gearbox'] = $request->car_gearbox;
        $data['fuel_consumption'] = $request->fuel_consumption;
        $data['lamp'] = $request->lamp;
        $data['automatic_lights'] = $request->automatic_lights;
        $data['alluminum_alloy_lazang'] = $request->alluminum_alloy_lazang;
        $data['exhaust_pipe'] = $request->exhaust_pipe;
        $data['seat'] = $request->seat;
        $data['central_screen'] = $request->central_screen;
        $data['air_conditioning'] = $request->air_conditioning;
        $data['front_wheel_brake'] = $request->front_wheel_brake;
        $data['rear_wheel_brake'] = $request->rear_wheel_brake;
        $data['image'] = $request->image;
        $data['gif'] = $request->gif;
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg:5048'
        ]);

        if($request->hasFile('image')){
        $path = public_path() . '/storage/files/Image_Car';
        $file = $request->file('image');
        $modelName = preg_replace('/\s+/', '', $request->model_name);
        $extension_img = $request->image->guessClientExtension();
        $newImageName = $modelName . '-' . $request->color . '.' . $extension_img;
        $upload = $file->move($path, $newImageName);
        $data['image'] = $newImageName;
        }

        
        
        if($request->hasFile('gif')){
            // gif
            $path_gif = public_path() . '/storage/files/Image_Car/gif';
            $file_gif = $request->file('gif');
            $modelName = preg_replace('/\s+/', '', $request->model_name);
            $extension_gif = $request->gif->guessClientExtension();
            $newGifName = $modelName . '-' . $request->color . '.' . $extension_gif;
            $upload = $file_gif->move($path_gif, $newGifName);
            $data['gif'] = $newGifName;
        
        }

        

        DB::table('model_infos')->insert($data);
        

        session()->put('message1', 'Thêm thành công!');
        return Redirect('admin/general/addmodel');
    }

    public function editModel($model_id){
        $edit_model = DB::table('model_infos')->where('model_id', $model_id)->get();
        $manage_model = view('admin.general.edit_model')->with('edit_model', $edit_model);
        return view('layouts_admin.layoutadmin')->with(['manage_model'=> $manage_model]);
    }

    public function updateModel (Request $request, $model_id) {
        $data = array();
        // $data['model_id'] = $request->model_id; //$data['model_id'] la ten cot trong bang, $request->model_id la name cua element
        $data['model_name'] = $request->model_name;
        $data['car_type'] = $request->car_type;
        $data['price'] = $request->price;
        // $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['engine_shutdown_function'] = $request->engine_shutdown_function; //
        $data['weight'] = $request->weight;
        $data['engine'] = $request->engine; //
        $data['wattage'] = $request->wattage;
        $data['car_gearbox'] = $request->car_gearbox;
        $data['fuel_consumption'] = $request->fuel_consumption;
        $data['lamp'] = $request->lamp;
        $data['automatic_lights'] = $request->automatic_lights;
        $data['alluminum_alloy_lazang'] = $request->alluminum_alloy_lazang;
        $data['exhaust_pipe'] = $request->exhaust_pipe;
        $data['seat'] = $request->seat;
        $data['central_screen'] = $request->central_screen;
        $data['air_conditioning'] = $request->air_conditioning;
        $data['front_wheel_brake'] = $request->front_wheel_brake;
        $data['rear_wheel_brake'] = $request->rear_wheel_brake;
        $data['active'] = $request->active;
        $data['released'] = $request->released; 
        $data['image'] = $request->image;
        $data['gif'] = $request->gif;

        DB::table('model_infos')->where('model_id', $model_id)->update($data);

        // khang
        // if ($request->release = 'active') {
            
        //     $stock1 = new stock();
        //     $stock1->model_id = $request->model_id;
        //     $stock1->repo_id = 1;
        //     $stock1->quantity = 0;
        //     $stock1->save(); 
        //     $stock2 = new stock();
        //     $stock2->model_id = $request->model_id;
        //     $stock2->repo_id = 2;
        //     $stock2->quantity = 0;
        //     $stock2->save(); 
        //     $stock3 = new stock();
        //     $stock3->model_id = $request->model_id;
        //     $stock3->repo_id = 3;
        //     $stock3->quantity = 0;
        //     $stock3->save(); 
        // }
        // end khang
        
        session()->put('message1', 'Cập nhật thành công!');
        return Redirect('admin/general/allmodel');
    }

    public function deleteModel($model_id){
        // $model=DB::table('model_infos')->where('model_id', $model_id)->get();
        $model=modelInfo::find($model_id);
        // dd($model);
        if($model->released==='active'){
            $message='Bạn không được xóa dòng xe đã được kích hoạt!';
        }
        else{$model->delete();
        $message='Xóa Thành Công!';
       }
        
        
        return Redirect('admin/general/allmodel')->with(['message'=>$message]);
    }

    public function showModel($model_id){
        $show_model = DB::table('model_infos')->where('model_id', $model_id)->get();
        $manage_model = view('dashboard.user.model_details')->with('show_model', $show_model);
        return view('dashboard.layouts.layout')->with('dashboard.user.model_details', $manage_model);
        // return view('model_details');
    }
}

