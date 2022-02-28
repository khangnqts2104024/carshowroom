<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ChangeLanguageController extends Controller
{
    public function switch($locale){


    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
         Session::put('locale', $locale);
    }
    
    return redirect()->back();

    }
}
