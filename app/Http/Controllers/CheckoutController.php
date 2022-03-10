<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{   

    public function checkout(Request $request){
        $resultCode = $request->resultCode;
        $message = $request->message;
        $orderId = $request->orderId; //get order_code
        if($resultCode != 0){
            if(App::getLocale() == 'vi'){
                $message = 'Thanh Toán Thất Bại. Vui lòng thử lại.';
                return view('dashboard.user.payment.checkout',compact('message','resultCode'));
            }else{
                $message = 'Payment failed. Please try again.';
                return view('dashboard.user.payment.checkout',compact('message','resultCode'));
            }

        }else{
            $order_details = orderDetail::find($orderId);
            $order_details->order_status="deposited";
            $order_details->update();
            if(App::getLocale() == 'vi'){
                $message = 'Thanh toán thành công. Đơn hàng của bạn đã được xác nhận.';
                return view('dashboard.user.payment.checkout',compact('message','resultCode'));
            }else{
                $message = 'Payment success. Your order has been confirmed.';
                return view('dashboard.user.payment.checkout',compact('message','resultCode'));
            }

        }
        return view('dashboard.user.payment.checkout',compact('message','resultCode'));
     
        
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request)
    {


        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $request->deposit;
        $orderId = $request->order_id;
        
        $redirectUrl = "http://127.0.0.1:8000/user/profile/checkout";
        $ipnUrl = "http://127.0.0.1:8000/user/profile/checkout";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Car Show Room",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        
        $jsonResult = json_decode($result, true);  // decode json
        
        //Just a example, please check more in there
        return  redirect()->to($jsonResult['payUrl']);
       
    }
}
