<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\employeeInfo;
use App\Models\employeeAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
class EmployeeInfoController extends Controller
{

    public function show() {
        $emp = employeeInfo::all();
        // foreach($emp->id as $item){
        //     $item->email;
        //     $item->password;
        //     $item->role;
        // }
   
       
        return view('admin.general.empmanage')->with(['emp'=>$emp]);
    }




    // public function postUpdate(Request $request, $id) {
    //     $product = $request->all();
    //     // xử lý upload hình vào thư mục
    //     if($request->hasFile('image'))
    //     {
    //         $file=$request->file('image');
    //         $extension = $file->getClientOriginalExtension();
    //         if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
    //         {
    //             return redirect('product/update')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
    //         }
    //         $imageName = $file->getClientOriginalName();
    //         $file->move("public/images",$imageName);
    //     } else { // không upload hình mới => giữ lại hình cũ
    //         $p = Product::find($id);
    //         $imageName = $p->image;
    //     }
    //     $p = new Product($product);
    //     $p->image = $imageName;
    //     $p->save();
    //     return redirect()->action('ProductController@index');
    // }
    public function delete($id) {
        $p = employeeInfo::find($id);
        $p->delete();
        return redirect()->action('ProductController@index');
    }
}
