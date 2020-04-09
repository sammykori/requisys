<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $div = auth()->user()->division;
        $pending = DB::table('records')
        ->join('files', 'records.file_id', '=', 'files.file_id')
        ->join('users', 'records.user_id', '=', 'users.id')
        ->select('users.name', 'users.rank', 'users.email', 'users.extension', 'files.file_name', 'files.company', 'files.service_type','records.id','records.status','records.created_at','records.purpose',)
        ->where('users.division', $div)
        ->get();
        if(auth()->user()->rank !== "Director"){
            return redirect('/dashboard')->with('error', 'Unauthorised page');
        }
        return view('/pending')->with('pending', $pending);
    }

    public function updateStatus(Request $request){
        $rec = Record::where('id', $request->record_id)->update([
            "status" => "approved"
        ]);

     
        return response()->json([
            "data" => "Status changed to approve"
        ], 200);
    }


    public function disapproveStatus(Request $request){
        $rec = Record::where('id', $request->record_id)->update([
            "status" => "disapproved"
        ]);

     
        return response()->json([
            "data" => "Status changed to Disapproved"
        ], 200);
    }
}
