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
        $models = modelInfo::select('model_id', 'model_name', 'color', 'price')->get();
        //    dd($cost);
        //    dd();
        return view('admin.showroom.confirmorder')->with(['p' => $orders])->with(['provines' => $province])->with(['models' => $models])->with('cost', $cost)->with('oldprovine', $old_provine->name);
    }


    //cập nhat65 info khách
    public function checkinfo(Request $request)
    {
        $request->validate([
            'email' => array('required', 'regex:/^[^\s@-]+@[^\s@-]+\.[^\s@]+$/', 'unique:customer_accounts,email'),
            'fullname' => array('required', 'regex:/^[A-Za-z\s\.]+$/'),
            'citizen_id' => array('required', 'regex:/^[0-9]*$/'),
            'phone_number' => array('required', 'regex:/^[0-9]{10,11}$/'),
            'address' => array('required', 'regex:/^[a-zA-Z0-9,\-\s\.]*$/'),
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
        $car = $orders->orders->cars->first();
        if ($car === null) {
            $orders->order_status = 'canceled';
            $message = 'Hủy đơn thành công!';
            $orders->save();
        } else if ($car->car_status === 'showroom') {
            $orders->order_status = 'canceled';
            $car->car_status = 'custcanceled';
            $car->save();
            $orders->save();
            $message = 'Hủy Đơn Thành Công';
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
