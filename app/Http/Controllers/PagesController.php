<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\User;
use App\File;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function record(){
        $div = auth()->user()->division;
        $sup = User::where('division', $div)->where('rank', 'Director')->get(['id','name']);
        $files = File::all()->pluck('file_name');
        return view('record')->with('sup', $sup)->with('files', $files);
    }
    public function water(){
        return view('water');
    }
    public function vehicle(){
        return view('vehicle');
    }
    public function pending(){
        // $id = auth()->user()->id;
        $pending = Record::where('status', 'pending')->get();
        if(auth()->user()->rank !== "Director"){
            return redirect('/dashboard')->with('error', 'Unauthorised page');
        }
        return view('/pending')->with('pending', $pending);
    }
}
