<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccess;
use App\Mail\TestMail;
use App\Models\modelInfo;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class MailController extends Controller
{
    public function sendmail_ordersuccess($order_code){
        

            $order_infos = orderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id',)
              ->join('model_infos', 'model_infos.model_id', '=', 'order_details.model_id')
              ->join('customer_infos','customer_infos.customer_id','=','orders.customer_id')
              ->join('showrooms','showrooms.id','=','orders.showroom')
              ->where('orders.order_code','=',$order_code)
              ->get(['model_infos.model_name','model_infos.price','customer_infos.fullname','customer_infos.address','customer_infos.email','customer_infos.phone_number','order_details.order_status','orders.order_code','orders.order_date','showrooms.showroom_name','showrooms.address as showroom_address','showrooms.phone as showroom_phone','order_details.order_price']);
              foreach($order_infos as $order_info){
                  $model_name = $order_info->model_name;
                  $model_price = $order_info->price;
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
              

              $deposit_nonFormat = $order_price*(5/100);
              $deposit_format = number_format($deposit_nonFormat);

              $order_price_format = number_format($order_price);
              
        $details = [
            'Title'=> ' Thank You For Your Order! ',
            'Sub_Content_Top' =>'We have received your order, the staff will receive and confirm the order. Please wait for a confirmation email from us.',
            'Model Name'=> $model_name ,
            'Order Price'=>$order_price_format,
            'Deposit' =>$deposit_format,
            'Shipping' =>'Free Shipping',
            'Customer Name'=>$customer_fullname,
            'Customer Address'=>$customer_address,
            'Customer Email'=>$customer_email,
            'Customer Phone'=>$customer_phone_number,
            'Order Code'=>$order_code,
            'Order Date'=>$order_date,
            'Order Status'=>$order_status,
            'ShowRoom Name'=>$showroom_name,
            'ShowRoom Address'=>$showroom_address,
            'ShowRoom Phone'=>$showroom_phone,
        ];

        

        Mail::to('leanhtrung97@gmail.com')->send(new OrderSuccess($details));
       return redirect()->back();
    }
}
