<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use PDO;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $resultCode = $request->resultCode;
        $message = $request->message;
        $momo_id = $request->orderId; //get order_code
        if ($resultCode != 0) {
            if (App::getLocale() == 'vi') {
                $message = 'Thanh Toán Thất Bại. Vui lòng thử lại.';
                return view('dashboard.user.payment.checkout', compact('message', 'resultCode'));
            } else {
                $message = 'Payment failed. Please try again.';
                return view('dashboard.user.payment.checkout', compact('message', 'resultCode'));
            }
        } else {
            $order_by_momo_id = order::where('momo_id', $momo_id)->first();

            $order_details = orderDetail::find($order_by_momo_id->order_id);

            $update_status_order_detail = $order_details->update([
                'order_status' => "deposited",
            ]);

            if ($update_status_order_detail) {
                if (App::getLocale() == 'vi') {
                    $message = 'Thanh toán thành công. Đơn hàng của bạn đã được xác nhận.';
                    return view('dashboard.user.payment.checkout', compact('message', 'resultCode'));
                } else {
                    $message = 'Payment success. Your order has been confirmed.';
                    return view('dashboard.user.payment.checkout', compact('message', 'resultCode'));
                }
            } else {
                if (App::getLocale() == 'vi') {
                    $message = 'Thanh Toán Thất Bại. Vui lòng thử lại.';
                    return view('dashboard.user.payment.checkout', compact('message', 'resultCode'));
                } else {
                    $message = 'Payment failed. Please try again.';
                    return view('dashboard.user.payment.checkout', compact('message', 'resultCode'));
                }
            }
        }

        return view('dashboard.user.payment.checkout', compact('message', 'resultCode'));
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
        $order_dt = orderDetail::where('order_id',$request->order_id)->first();
        $order_status = $order_dt->order_status;
        if($order_status == 'checkinfo'){
            $order = order::where('order_id', '=', $request->order_id)->first();
            $momo_id = $order->momo_id;
            // generate new one'
            $momo_id = rand(0, 400) . time();
            //check if momo_id exists.
            $momoIDExist = order::where('momo_id', $momo_id)->exists();
            //generate another Momo ID
            if ($momoIDExist) {
                $momo_id = rand(0, 400) . time(); // generate new one
            }
            $order->momo_id = $momo_id;
            $order->update();
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $request->deposit;
            $orderId = $order->momo_id;
    
            $redirectUrl = "http://127.0.0.1:8000/user/checkout";
            $ipnUrl = "http://127.0.0.1:8000/user/checkout";
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
            if ($jsonResult['resultCode'] != 0) {
                $order = order::where('momo_id', '=', $orderId)->first();
    
                //generate another Momo ID
                $momo_id = $order->momo_id;
                $momo_id = rand(0, 400) . time();
                //check if momo_id exists.
                $momoIDExist = order::where('momo_id', $momo_id)->exists();
                //generate another Momo ID
                if ($momoIDExist) {
                    $momo_id = rand(0, 400) . time(); // generate new one
                }
                $order->momo_id = $momo_id;
                $order->update();
    
                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua MoMo";
                $amount = $request->deposit;
                $orderId = $momo_id;
    
                $redirectUrl = "http://127.0.0.1:8000/user/checkout";
                $ipnUrl = "http://127.0.0.1:8000/user/checkout";
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
                // dd($result);
                $jsonResult = json_decode($result, true);  // decode json
                return redirect()->to($jsonResult['payUrl']);
            }
    
    
            //Just a example, please check more in there
            return  redirect()->to($jsonResult['payUrl']);
        }else{
            return redirect()->route('user.transaction_expired');
        }
        
        

       
    }

    public function transaction_expired(){
        
        return view('dashboard.user.payment.transaction_expired');
    }
}
