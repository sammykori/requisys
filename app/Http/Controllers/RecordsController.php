<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Record;
use App\File;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_id = auth()->user()->id;
        $staffs =DB::table('records')
        ->join('files', 'records.file_id', '=', 'files.file_id')
        ->join('users', 'records.user_id', '=', 'users.id')
        ->select('records.id','records.status','records.created_at','files.file_name')
        ->where('users.id', $user_id)
        ->get();

        return view('request')->with('staffs', $staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'purpose' => 'required',
            'sup' => 'required'
        ]);
        $file_name = $request->input('file');
        $file_id = File::where('file_name', $file_name)->pluck('file_id');
        //create
        $record = new Record;
        $record->file_id = $file_id[0];
        $record->purpose = $request->input('purpose');
        $record->user_id = auth()->user()->id;
        $record->sup_id = $request->input('sup');
        $record->status = 'pending';
        $record->save();

        return redirect('/request/files')->with('success', 'New requested submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::find($id);
        $record->delete();
        return redirect('request/files')->with('success', 'Record Deleted Successfully');
    }
}
