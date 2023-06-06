<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sessions extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'sessions';
    protected $guarded = [];

	public function login_session()
	{
		return $this->hasOne(login_sessions::class,'session_id','id');
	}
}
