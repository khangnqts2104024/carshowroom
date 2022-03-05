<?php

namespace App\Http\Controllers;

use App\Models\showroom;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    //lấy thông tin showroom cho trang create
    public function create() {
        $showrooms = showroom::select('id','showroom_name')->get();
        // dd($showrooms);

 
       
        return view('admin.general.empcreate')->with(['showrooms'=> $showrooms]);

    }
}
