<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    public $primaryKey = 'staff_id';

    public $timestamps = true;

    public function record(){
        return $this->hasMany('App\Record', 'staff_id', 'staff_id');
    }
}
