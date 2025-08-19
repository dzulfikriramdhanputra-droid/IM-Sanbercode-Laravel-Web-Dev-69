<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;

class BiodataController extends Controller
{
    public function formdaftar()
    {
        return view('page.daftar');
    }

    public function home(Request $request)
    {
        $firstname = $request->input("FirstName");
        $lastname = $request->input("LastName");

        return view('page.home',['FirstName' => $firstname, 'LastName' => $lastname]);
    }
}
