<?php

namespace App\Http\Controllers;
use App\Models\orderDetail;
use App\Models\Customer_Info;
use App\Models\carInfo;
use App\Models\order;
use App\Models\warehouse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function report(){
  
    
        $report1= warehouse::select('id','warehouse_name')->get()->load('cars');
        $report3=Customer_Info::select('customer_role')->get();
        $num1=order::select('order_id','order_date')->wherebetween('order_date',['2021-01-01','2021-03-31'])->count();
        $num2=order::select('order_id','order_date')->wherebetween('order_date',['2021-04-01','2021-06-30'])->count();
        $num3=order::select('order_id','order_date')->wherebetween('order_date',['2021-07-01','2021-09-30'])->count();
        $num4=order::select('order_id','order_date')->wherebetween('order_date',['2021-10-01','2021-12-31'])->count();
        $report2=[$num1,$num2,$num3,$num4];
// dd($report2);
    



        return view ('admin.general.report')->with(['report1'=>$report1])->with(['report2'=>$report2])->with(['report3'=>$report3]);
    }

    // dd($a);

}
