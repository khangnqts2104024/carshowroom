<?php

namespace App\Http\Controllers;

use App\Models\carInfo;
use App\Models\Cost_Estimate;
use App\Models\modelInfo;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use App\Mail\DepositRequire;

class OrderDetailController extends Controller
{



    public function show()
    {
        $orders = orderDetail::all();

        return view('admin.showroom.order')->with(['orders' => $orders]);
    }

    public function orderedstatus()
    {
        $orders = orderDetail::where('order_status', 'ordered')->get();

        // $useremail = Auth::guard('employee')->user()->role;
        // dd($useremail);

        return view('admin.showroom.ordercheck')->with(['orders' => $orders]);
    }
    public function takeorder($id)
    {
        $order = orderDetail::find($id);
        $message = 'Bạn đã nhận đợn hàng thành công';
        if ($order->order_status == 'ordered') {
            $order->order_status = 'checked';
            $order->emp_received = Auth::guard('employee')->user()->email;
        } else {
            $message = "có gì đó sai sai! check lại rồi hỏi sếp nha!";
        }
        $order->save();
        return redirect()->back()->with(['message' => $message]);
    }

    // 

    public function myorder()
    {
        $orders = orderDetail::where('emp_received', Auth::guard('employee')->user()->email)->get();

        return view('admin.showroom.myorder')->with(['orders' => $orders]);
    }


    public function custcanceledtatus()
    {
        $orders = orderDetail::where('order_status', 'custcanceled')->get();
        return view('admin.showroom.ordercancel')->with(['orders' => $orders]);
    }

    public function confirmstatus()
    {



        $orders = orderDetail::where('order_status', 'confirm')->get();
        return view('admin.warehouse.car_ordering')->with(['orders' => $orders]);
    }


    public function orderdetail($order_id, $model_id)
    {
        $p = orderDetail::where('model_id', $model_id)->firstWhere('order_id', $order_id);
        $provine = Province::find($p->matp);

        return view('admin.showroom.orderdetail')->with(['p' => $p])->with('provine', $provine);
    }


    //confirm order
    public function confirmorder($id)
    {
        $orders = orderDetail::find($id);
        $old_provine = Province::find($orders->matp);

        $province = Province::all();
        $cost = Cost_Estimate::select('matp', 'Inspectionfee', 'Licenseplatefee', 'Roadusagefee', 'Civilliabilityinsurance')->get();
        $models = modelInfo::select('model_id', 'model_name', 'color', 'price')->where('released','active')->get();
        //    dd($cost);
        //    dd();
        return view('admin.showroom.confirmorder')->with(['p' => $orders])->with(['provines' => $province])->with(['models' => $models])->with('cost', $cost)->with('oldprovine', $old_provine->name);
    }


    //cập nhat65 info khách
    public function checkinfo(Request $request)
    {
        $request->validate([
            'email' => array('required', 'regex:/^[^\s@-]+@[^\s@-]+\.[^\s@]+$/'),
            'fullname' => array('required', 'regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\.\-\,]+)$/i'),
            'citizen_id' => array('required', 'regex:/^[0-9]*$/'),
            'phone_number' => array('required', 'regex:/^[0-9]{10,11}$/'),
            'address' => array('required','regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\-\,]+)$/i'),
            'orderprice' => 'required',
            'modelnote' => 'required',
        ]);

        $order_detail = orderDetail::find($request->orderdetail_id);
        if ($order_detail->order_status == "checked") {
            // update info customer
            $customer = $order_detail->orders->customer;
            $customer->email = $request->email;
            $customer->fullname = $request->fullname;
            $customer->citizen_id = $request->citizen_id;
            $customer->phone_number = $request->phone_number;
            $customer->address = $request->address;
            $customer->save();
            $order_detail->order_price = $request->orderprice;
            $order_detail->order_status = "checkinfo";
            $order_detail->matp = $request->provines;
            $order_detail->save();
            $order=$order_detail->orders;
            $order->note=$request->modelnote;
            $order->save();
            $message = "Cập Nhật Đơn Hàng Thành Công!";

           //test
                $order_infos = orderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id',)
                    ->join('model_infos', 'model_infos.model_id', '=', 'order_details.model_id')
                    ->join('customer_infos', 'customer_infos.customer_id', '=', 'orders.customer_id')
                    ->join('showrooms', 'showrooms.id', '=', 'orders.showroom')
                    ->where('orders.order_code', '=', $order_detail->orders->order_code)
                    ->where('model_infos.released', '=','active')
                    ->get(['model_infos.model_name', 'model_infos.price', 'customer_infos.fullname', 'customer_infos.address', 'customer_infos.email', 'customer_infos.phone_number', 'order_details.order_status', 'orders.order_id', 'orders.order_code', 'orders.order_date', 'showrooms.showroom_name', 'showrooms.address as showroom_address', 'showrooms.phone as showroom_phone', 'order_details.order_price']);
                foreach ($order_infos as $order_info) {
                    $model_name = $order_info->model_name;
                    $customer_fullname = $order_info->fullname;
                    $customer_address = $order_info->address;
                    $customer_email = $order_info->email;
                    $order_id = $order_info->order_id;
                    $order_code = $order_info->order_code;
                    $order_price = $order_info->order_price;
                    $showroom_name = $order_info->showroom_name;
                    $showroom_address = $order_info->showroom_address;
                    $showroom_phone = $order_info->showroom_phone;
                }
        
        
                $deposit_nonFormat = round($order_price * (1 / 100)); //lam tron so
                $deposit_format = number_format($deposit_nonFormat);
        
                $details = [
                    'Model Name' => $model_name,
                    'Deposit Non Format' => $deposit_nonFormat,
                    'Deposit' => $deposit_format,
                    'Customer Name' => $customer_fullname,
                    'Customer Address' => $customer_address,
                    'Customer Email' => $customer_email,
                    'Order ID' => $order_id,
                    'Order Code' => $order_code,
                    'ShowRoom Name' => $showroom_name,
                    'ShowRoom Address' => $showroom_address,
                    'ShowRoom Phone' => $showroom_phone,
                ];
        
        
        //dưa về mail customer
                Mail::to('leanhtrung97@gmail.com')->send(new DepositRequire($details));
       
            

//test



        } else {
            $message = "có gì đó sai sai!ko thể update thành công!Check Lại Đơn Hàng Hỏi Sếp nha";
        };

        return redirect('admin/showroom/myorder')->with(['message' => $message]);
    }




    public function confirmdeposited($id)
    {
        $orders = orderDetail::find($id);
        if ($orders->order_status = 'deposited') {
            $orders->order_status = 'confirm';
            $message = 'Bạn đã xác nhận đơn thành công!';
        } else {
            $message = 'Có gì đó sai sai!, hỏi lại sếp nha!';
        }
        $orders->save();
        //    dd($orders);
        return redirect()->back()->with(['message' => $message]);
    }


    public function soldorder($id)
    {
        $orders = orderDetail::find($id);
        $car = carInfo::find($orders->orders->cars->first()->car_id);


        if ($orders->order_status === "released" && $car->car_status === 'showroom') {
            $orders->order_status = "sold";
            $car->car_status = 'sold';
            $orders->save();
            $car->save();
            $message = 'Bạn đã xác nhận giao xe thành công!';
        } else {
            $message = 'Bạn xác nhậ không thành công!Kiểm tra lại xe đã tới showroom chưa!';
        }
        return redirect()->back()->with(['message' => $message]);
    }


    // huy don
    public function ordercanceled($id)
    {
        $orders = orderDetail::find($id);
        $car = $orders->orders->cars;
 
        if ($car === null) {
            $orders->order_status = 'canceled';
            $message = 'Hủy đơn thành công!';
            $orders->save();
        } else if ($car->car_status === 'showroom'){
            $orders->order_status = 'canceled';
            $car->car_status = 'custcanceled';
            $car->save();
            $orders->save();
            $message = 'Hủy Đơn Thành Công!Xe Được Trả Về Kho!';
        } else if ($car->car_status === 'pending') {
            $message = 'Hủy chưa thành công, xe vẫn đang trên đường đến showroom!Hãy đợi xe tới rồi mới hoàn lại!';
        } else {
            $message = 'có gì đó sai sai nha!';
        }


        return redirect()->back()->with(['message' => $message]);
    }

    public function empcancel($id)
    {

        $order_detail = orderDetail::find($id);
        $order = $order_detail->orders;
        if ($order_detail->order_status == "checked") {
            $order_detail->order_status = "canceled";
            $order->note = "Đã Qúa Hạn Đặt Cọc Hoặc Khách Không Đồng Ý Thanh Toán";
            $order_detail->save();
            $order->save();
         
            $message = "Đã Hủy Đơn Hàng Thành Công!";
        } else {
            $message = "Hủy Đơn Hàng Không Thành Công!";
        }
        return redirect('admin/showroom/myorder')->with(['message' => $message]);
    }
}
