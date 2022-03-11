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
use Illuminate\Support\Arr;
use PhpParser\Node\Stmt\Foreach_;

class EmployeeInfoController extends Controller
{

    public function show() {
        $emp = employeeInfo::all();

 
       
        return view('admin.general.empmanage')->with(['emp'=> $emp]);

    }



    public function delete($id) {
        $p = employeeInfo::find($id);
        $p->delete();
        return redirect()->action('ProductController@index');
    }

//TEST PROFILE

public function fetchData()
{
    $employee = Auth::guard('employee')->user()->employeeinfo;
    // dd($employee);



    return view('admin.adminprofile.adminprofile')->with('employee',$employee);
   


}

//update name
public function updatename(Request $request){
    $request->validate([
        'fullname' => 'required|min:5|regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i',
       
    ]);
$employee=employeeInfo::find($request->id);
$employee->fullname=$request->fullname;
$employee->save();

    return redirect('admin/profile/myprofile');
}

public function updatephone(Request $request){
    $request->validate([
        'phone' => 'required|regex:/^[0-9]{10,11}$/',
    ]);
$employee=employeeInfo::find($request->id);
$employee->phone_number=$request->phone;
$employee->save();

    return redirect('admin/profile/myprofile');
}

public function updateaddress(Request $request){
    $request->validate([
        'address' => 'required',
    ]);
$employee=employeeInfo::find($request->id);
$employee->address=$request->address;
$employee->save();

    return redirect('admin/profile/myprofile');
}
public function updatepassword(Request $request){
    $request->validate([
        'oldpassword' => 'required|min:5|max:30',
        'password' => 'required|min:5|max:30',
        'confirmpass'=>'required|min:5|max:30|same:password',
    ]);


$employee_account=employeeInfo::find($request->id)->employee_Account;
// dd(Hash::check($request->oldpassword,$employee_account->password));

if(Hash::check($request->oldpassword,$employee_account->password)){
    $employee_account->password=Hash::make($request->password);
    $employee_account->save();
    $error="cập nhật mật khẩu thành công!";
}else{$error="Bạn Phải Nhập Đúng Mật Khẩu Cũ!";}

// $employee->address=$request->address;
// $employee->save();

    return redirect('admin/profile/myprofile')->with('error',$error);
}






}
