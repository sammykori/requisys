<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Staff;

class StaffsController extends Controller
{
    public function index(){
        // return $staffs = Staff::find(4)->record;
        // return view('request')->with('staffs', $staffs);

        $staffs =DB::table('records')
        ->join('files', 'records.file_id', '=', 'files.file_id')
        ->join('staffs', 'records.staff_id', '=', 'staffs.staff_id')
        ->select('records.id','records.status','records.created_at','files.file_name', 'staffs.staff_id')
        ->where('staffs.staff_id', 4)
        ->get();

        return view('request')->with('staffs', $staffs);
    }
}
