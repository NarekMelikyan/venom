<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function loginPage(){
        return view('Backend.index');
    }
}
