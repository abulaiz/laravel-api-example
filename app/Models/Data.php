<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
	protected $table = "datas";

	protected $guarded = [''];

    public $timestamps = false; 

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
