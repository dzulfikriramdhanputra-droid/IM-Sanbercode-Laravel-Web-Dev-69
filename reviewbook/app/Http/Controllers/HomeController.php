<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;

class HomeController extends Controller
{
    public function utama () {
        return view('welcome');
    }
}
