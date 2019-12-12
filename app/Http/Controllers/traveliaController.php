<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class traveliaController extends Controller
{
    public function index(){
        return view('travelia.index');
    }
}
