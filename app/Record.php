<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';

    public $primaryKey = 'id';

    public $timestamps = true;


    public function staffs(){
        return $this->belongsTo('App\Staff', 'staff_id');
    }
    public function files(){
        return $this->belongsTo('App\File', 'file_id');
    }
}
