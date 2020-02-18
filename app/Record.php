<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';

    public $primaryKey = 'id';

    public $timestamps = true;


    public function users(){
        return $this->belongsTo('App\User');
    }
    public function files(){
        return $this->belongsTo('App\File', 'file_id');
    }
}
