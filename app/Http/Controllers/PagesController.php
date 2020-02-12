<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function request(){
        return view('request');
    }
    public function record(){
        return view('record');
    }
    public function water(){
        return view('water');
    }
    public function vehicle(){
        return view('vehicle');
    }
}
