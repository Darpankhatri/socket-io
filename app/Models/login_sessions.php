<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class login_sessions extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'login_sessions';
    protected $guarded = [];  

	public function has_session()
	{
		return $this->belongsTo(sessions::class,'session_id')->where('user_id','!=',null);
	}
}
