<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
      public $table = "role_user";
      public $timestamps = false;
    	protected $fillable = [
    		'role_name', 'created_at', 'updated_at','user_id','role_id'
    	];
      /*
    	* Method untuk yang mendefinisikan relasi antara model user dan model Role
    	*/
    	public function getUserObject()
    	{
    		return $this->belongsToMany(User::class)->using(UserRole::class);
    	}
}
