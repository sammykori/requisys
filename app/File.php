<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    public $primaryKey = 'file_id';

    public $timestamps = true;

    public function record(){
        return $this->hasMany('App\Record', 'file_id', 'file_id');
    }
}
