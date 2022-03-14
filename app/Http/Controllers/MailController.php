<?php

namespace App\Http\Controllers;

use App\Mail\CancelCode;
use App\Mail\OrderSuccess;
use App\Mail\TestMail;
use App\Models\modelInfo;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\DepositRequire;
use PDO;
use Illuminate\Support\Facades\App;

class MailController extends Controller
{
    public function sendmail_ordersuccess($order_code)
    {


        $order_infos = orderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id',)
            ->join('model_infos', 'model_infos.model_id', '=', 'order_details.model_id')
            ->join('customer_infos', 'customer_infos.customer_id', '=', 'orders.customer_id')
            ->join('showrooms', 'showrooms.id', '=', 'orders.showroom')
            ->where('orders.order_code', '=', $order_code)
            ->where('model_infos.released', '=','active')
            ->get(['model_infos.model_name', 'model_infos.price', 'customer_infos.fullname', 'customer_infos.address', 'customer_infos.email', 'customer_infos.phone_number', 'order_details.order_status', 'orders.order_code', 'orders.order_date', 'showrooms.showroom_name', 'showrooms.address as showroom_address', 'showrooms.phone as showroom_phone', 'order_details.order_price']);
        foreach ($order_infos as $order_info) {
            $model_name = $order_info->model_name;
            $customer_fullname = $order_info->fullname;
            $customer_address = $order_info->address;
            $customer_email = $order_info->email;
            $customer_phone_number = $order_info->phone_number;
            $order_status = $order_info->order_status;
            $order_date = $order_info->order_date;
            $order_code = $order_info->order_code;
            $order_price = $order_info->order_price;
            $showroom_name = $order_info->showroom_name;
            $showroom_address = $order_info->showroom_address;
            $showroom_phone = $order_info->showroom_phone;
        }


        $deposit_nonFormat = round($order_price * (1 / 100)); //lam tron so 
        $deposit_format = number_format($deposit_nonFormat);

        $order_price_format = number_format($order_price);

        if(App::getLocale() == 'en'){
            $details = [
                'Title' => ' Thank You For Your Order! ',
                'Sub_Content_Top' => 'In the next 72 hours, the showroom will check the existing status of the ' . $model_name . ' model and at the same time confirm your personal information. When the order is eligible for payment, we will notify and instruct how to deposit via email. To tracking your order, go to Homepage, click <i class="fas fa-bars"></i> , then choose "Order Tracking"',
                'Model Name' => $model_name,
                'Order Price' => $order_price_format,
                'Deposit' => $deposit_format,
                'Shipping' => 'Free Shipping',
                'Customer Name' => $customer_fullname,
                'Customer Address' => $customer_address,
                'Customer Email' => $customer_email,
                'Customer Phone' => $customer_phone_number,
                'Order Code' => $order_code,
                'Order Date' => $order_date,
                'Order Status' => $order_status,
                'ShowRoom Name' => $showroom_name,
                'ShowRoom Address' => $showroom_address,
                'ShowRoom Phone' => $showroom_phone,
            ];
        }else{
            $details = [
                'Title' => ' Cảm Ơn Bạn Đã Đặt Hàng! ',
                'Sub_Content_Top' => 'Trong 72 giờ tới, chúng tôi sẽ kiểm tra tình trạng hiện có của dòng xe '.$model_name. ' và đồng thời xác nhận thông tin cá nhân của bạn. Khi đơn hàng đủ điều kiện thanh toán, chúng tôi sẽ thông báo và hướng dẫn cách đặt cọc qua email.',
                'Model Name' => $model_name,
                'Order Price' => $order_price_format,
                'Deposit' => $deposit_format,
                'Shipping' => 'Miễn Phí',
                'Customer Name' => $customer_fullname,
                'Customer Address' => $customer_address,
                'Customer Email' => $customer_email,
                'Customer Phone' => $customer_phone_number,
                'Order Code' => $order_code,
                'Order Date' => $order_date,
                'Order Status' => $order_status,
                'ShowRoom Name' => $showroom_name,
                'ShowRoom Address' => $showroom_address,
                'ShowRoom Phone' => $showroom_phone,
            ];
        }
        



        Mail::to('leanhtrung97@gmail.com')->send(new OrderSuccess($details));
        return redirect()->back();
    }

    //khang
    // public function sendmail_deposit_require($order_code)
    // {
    //     $order_infos = orderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id',)
    //         ->join('model_infos', 'model_infos.model_id', '=', 'order_details.model_id')
    //         ->join('customer_infos', 'customer_infos.customer_id', '=', 'orders.customer_id')
    //         ->join('showrooms', 'showrooms.id', '=', 'orders.showroom')
    //         ->where('orders.order_code', '=', $order_code)
    //         ->where('model_infos.released', '=','active')
    //         ->get(['model_infos.model_name', 'model_infos.price', 'customer_infos.fullname', 'customer_infos.address', 'customer_infos.email', 'customer_infos.phone_number', 'order_details.order_status', 'orders.order_id', 'orders.order_code', 'orders.order_date', 'showrooms.showroom_name', 'showrooms.address as showroom_address', 'showrooms.phone as showroom_phone', 'order_details.order_price']);
    //     foreach ($order_infos as $order_info) {
    //         $model_name = $order_info->model_name;
    //         $customer_fullname = $order_info->fullname;
    //         $customer_address = $order_info->address;
    //         $customer_email = $order_info->email;
    //         $order_id = $order_info->order_id;
    //         $order_code = $order_info->order_code;
    //         $order_price = $order_info->order_price;
    //         $showroom_name = $order_info->showroom_name;
    //         $showroom_address = $order_info->showroom_address;
    //         $showroom_phone = $order_info->showroom_phone;
    //     }


    //     $deposit_nonFormat = round($order_price * (1 / 100)); //lam tron so
    //     $deposit_format = number_format($deposit_nonFormat);

    //     $details = [
    //         'Model Name' => $model_name,
    //         'Deposit Non Format' => $deposit_nonFormat,
    //         'Deposit' => $deposit_format,
    //         'Customer Name' => $customer_fullname,
    //         'Customer Address' => $customer_address,
    //         'Customer Email' => $customer_email,
    //         'Order ID' => $order_id,
    //         'Order Code' => $order_code,
    //         'ShowRoom Name' => $showroom_name,
    //         'ShowRoom Address' => $showroom_address,
    //         'ShowRoom Phone' => $showroom_phone,
    //     ];



    //     Mail::to('leanhtrung97@gmail.com')->send(new DepositRequire($details));
    //     return 'Email sent';
    // }

    // public function send_cancel_code($order_code)
    // {
    //     $order_infos = orderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id',)
    //         ->join('model_infos', 'model_infos.model_id', '=', 'order_details.model_id')
    //         ->join('customer_infos', 'customer_infos.customer_id', '=', 'orders.customer_id')
    //         ->join('showrooms', 'showrooms.id', '=', 'orders.showroom')
    //         ->where('orders.order_code', '=', $order_code)
    //         ->where('model_infos.released', '=','active')
    //         ->get(['model_infos.model_name', 'model_infos.price', 'customer_infos.fullname', 'customer_infos.address', 'customer_infos.email', 'customer_infos.phone_number', 'order_details.order_status', 'orders.order_id', 'orders.order_code', 'orders.order_date', 'showrooms.showroom_name', 'showrooms.address as showroom_address', 'showrooms.phone as showroom_phone', 'order_details.order_price']);
    //     foreach ($order_infos as $order_info) {
    //         $model_name = $order_info->model_name;
    //         $customer_fullname = $order_info->fullname;
    //         $customer_address = $order_info->address;
    //         $customer_email = $order_info->email;
    //         $order_id = $order_info->order_id;
    //         $order_code = $order_info->order_code;
    //         $order_price = $order_info->order_price;
    //         $showroom_name = $order_info->showroom_name;
    //         $showroom_address = $order_info->showroom_address;
    //         $showroom_phone = $order_info->showroom_phone;
    //     }

    //     //generate cancel confirm code
    //     $string = "0123456789abcdefghijklmnopqrstuvwxyz";
    //     $cancel_code = substr(str_shuffle($string), 0, 8);
    //     $order = order::where('order_code', $order_code)->first();
    //     $order->cancel_code = $cancel_code;
    //     $order->update();

    //     $deposit_nonFormat = round($order_price * (1 / 100)); //lam tron so
    //     $deposit_format = number_format($deposit_nonFormat);

    //     $details = [
    //         'Model Name' => $model_name,
    //         'Deposit Non Format' => $deposit_nonFormat,
    //         'Deposit' => $deposit_format,
    //         'Customer Name' => $customer_fullname,
    //         'Customer Address' => $customer_address,
    //         'Customer Email' => $customer_email,
    //         'Order ID' => $order_id,
    //         'Order Code' => $order_code,
    //         'ShowRoom Name' => $showroom_name,
    //         'ShowRoom Address' => $showroom_address,
    //         'ShowRoom Phone' => $showroom_phone,
    //         "Cancel Code" => $cancel_code,
    //     ];

    //     Mail::to('leanhtrung97@gmail.com')->send(new CancelCode($details));
    //     return redirect()->back()->with(['order_code'=>$order_code,'order_id'=>$order_id]);
    // }



    public function send_cancel_code($order_code)
    {
        $order_infos = orderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id',)
            ->join('model_infos', 'model_infos.model_id', '=', 'order_details.model_id')
            ->join('customer_infos', 'customer_infos.customer_id', '=', 'orders.customer_id')
            ->join('showrooms', 'showrooms.id', '=', 'orders.showroom')
            ->where('orders.order_code', '=', $order_code)
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

        //generate cancel confirm code
        $string = "0123456789abcdefghijklmnopqrstuvwxyz";
        $cancel_code = substr(str_shuffle($string), 0, 8);
        $order = order::where('order_code', $order_code)->first();
        $order->cancel_code = $cancel_code;
        $order->update();

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
            "Cancel Code" => $cancel_code,
        ];

        Mail::to('leanhtrung97@gmail.com')->send(new CancelCode($details));
        return response()->json([
            'status' => 200,
            'message'=> 'ok'
        ]);
    }
    
}
