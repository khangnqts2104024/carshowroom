<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Customer_Info;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\modelInfo;
use App\Models\Province;
use App\Models\showroom;
use App\Models\warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Session\Session;

class CostEstimateController extends Controller
{
    public function index(Request $request){
       
        $model_id_from_url = $request->id;
        $matp_from_url = $request->matp;
        $car_images = modelInfo::select('image')->where('model_id',$model_id_from_url)->get();
        $models = modelInfo::select("*")->where('released','=','active')->get();
        $provinces = Province::select('*')->get();
        return view('dashboard.user/CostEstimate')->with(['matp_from_url'=>$matp_from_url,'models'=>$models,'model_id_from_url'=>$model_id_from_url,'car_images'=>$car_images,'provinces'=>$provinces]);;
    }

    public function getModelInfo(Request $request){
        $model_id = $request->model_id;
        $model = modelInfo::select("*")
        ->where("model_id",$model_id)
        ->get();
        if($model){
            return response()->json([
                'status' => 200,
                'model'=>$model,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message'=>'Something went wrong',
            ]);
        }
    }

    public function getFees(Request $request){
        $province_matp = $request->province_matp;
        
        $fees = Province::join('cost_estimates','cost_estimates.matp','=','provinces.matp')
        ->where('provinces.matp','=',$province_matp)
        ->get('*');
        
        return response()->json([
            'status' => 200,
            'fees'=>$fees,
        ]);
    }

    
}
