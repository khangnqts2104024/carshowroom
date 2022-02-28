<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ModelInfoController extends Controller
{


    public function addModel (){
        return view('admin.add_model');
    }
    public function allModel (){
        $all_model=DB::table('model_infos')->get();
     
        return view('admin.general.all_model',with(['all_model',$all_model]));
     
        
    }
    public function saveModel (Request $request){
        $data = array();
        $data['model_id'] = $request->model_id; //$data['model_id'] la ten cot trong bang, $request->model_id la name cua element
        $data['model_name'] = $request->model_name;
        $data['kich_thuoc'] = $request->kich_thuoc;
        $data['khoi_luong'] = $request->khoi_luong;
        $data['loai_dong_co'] = $request->loai_dong_co;
        $data['tu_dong_tat_dong_co'] = $request->tu_dong_tat_dong_co; //
        $data['dan_dong'] = $request->dan_dong;
        $data['ong_xa_doi'] = $request->ong_xa_doi; //
        $data['den_chieu'] = $request->den_chieu;
        $data['cho_ngoi'] = $request->cho_ngoi;
        $data['man_hinh'] = $request->man_hinh;
        $data['dieu_chinh_vo_lang'] = $request->dieu_chinh_vo_lang;
        $data['he_thong_giai_tri'] = $request->he_thong_giai_tri;
        $data['phanh_truoc'] = $request->phanh_truoc;
        $data['phanh_sau'] = $request->phanh_sau;

        DB::table('model_infos')->insert($data);
        session()->put('message', 'Thêm thành công!');
        return Redirect('admin.general.add-model');
    }

    public function editModel($model_id){
        $edit_model = DB::table('model_infos')->where('model_id', $model_id)->get();
        $manage_model = view('admin.general.edit_model')->with('edit_model', $edit_model);
        return view('admin.general.edit_model')->with(['manage_model'=> $manage_model]);
    }

    public function updateModel (Request $request, $model_id) {
        $data = array();
        // $data['model_id'] = $request->model_id; 
        // $data['model_name'] = $request->model_name;
        // $data['kich_thuoc'] = $request->kich_thuoc;
        // $data['khoi_luong'] = $request->khoi_luong;
        // $data['loai_dong_co'] = $request->loai_dong_co;
        // $data['tu_dong_tat_dong_co'] = $request->tu_dong_tat_dong_co; //
        // $data['dan_dong'] = $request->dan_dong;
        // $data['ong_xa_doi'] = $request->ong_xa_doi; //
        // $data['den_chieu'] = $request->den_chieu;
        // $data['cho_ngoi'] = $request->cho_ngoi;
        // $data['man_hinh'] = $request->man_hinh;
        // $data['dieu_chinh_vo_lang'] = $request->dieu_chinh_vo_lang;
        // $data['he_thong_giai_tri'] = $request->he_thong_giai_tri;
        // $data['phanh_truoc'] = $request->phanh_truoc;
        // $data['phanh_sau'] = $request->phanh_sau;

        DB::table('model_infos')->where('model_id', $model_id)->update($data);
        session()->put('message', 'Cập nhật thành công!');
        return Redirect('admin.general.all-model');
    }

    public function deleteModel($model_id){
        DB::table('model_infos')->where('model_id', $model_id)->delete();
        session()->put('message', 'Xóa thành công!');
        return Redirect('admin.general.all-model');
    }
}

