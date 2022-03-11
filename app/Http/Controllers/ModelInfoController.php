<?php

namespace App\Http\Controllers;
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
        // $data['image'] = $request->image;
        // $data['gif'] = $request->gif;
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg:5048'
        ]);
        $path = public_path() . '/storage/files/Image_Car';
        $file = $request->file('image');
        $modelName = preg_replace('/\s+/', '', $request->model_name);
        $extension_img = $request->image->guessClientExtension();
        $newImageName = $modelName . '.' . $extension_img;
        $upload = $file->move($path, $newImageName);
        $data['image'] = $newImageName;

        // gif
        $path_gif = public_path() . '/storage/files/Image_Car/gif';
        $file_gif = $request->file('gif');
        $modelName = preg_replace('/\s+/', '', $request->model_name);
        $extension_gif = $request->gif->guessClientExtension();
        $newGifName = $modelName . '-' . $request->color . '.' . $extension_gif;
        $upload = $file_gif->move($path_gif, $newGifName);
        $data['gif'] = $newGifName;


        // if($request->hasFile('image_upload')){
        //     $path = 'files/Avatar_User';
        //     $file = $request->file('image_upload');
        //     $fullnameUser = preg_replace('/\s+/', '', $request->fullname);
        //     $extension_img = $request->image_upload->guessClientExtension();
        //     $file_name = time().'_'.$fullnameUser.'.'.$extension_img;
        //     $upload = $file->storeAs($path,$file_name,'public');
        //     $user = Customer_Info::find($request->customer_id);

        

        DB::table('model_infos')->insert($data);
        session()->put('message', 'Thêm thành công!');
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
        $data['active'] = $request->active;
        $data['image'] = $request->image;
        $data['gif'] = $request->gif;

        DB::table('model_infos')->where('model_id', $model_id)->update($data);
        session()->put('message', 'Cập nhật thành công!');
        return Redirect('admin/general/allmodel');
    }

    public function deleteModel($model_id){
        DB::table('model_infos')->where('model_id', $model_id)->delete();
        session()->put('message', 'Xóa thành công!');
        return Redirect('admin/general/allmodel');
    }

    public function showModel($model_id){
        $show_model = DB::table('model_infos')->where('model_id', $model_id)->get();
        $manage_model = view('dashboard.user.model_details')->with('show_model', $show_model);
        return view('dashboard.layouts.layout')->with('dashboard.user.model_details', $manage_model);
        // return view('model_details');
    }
}

