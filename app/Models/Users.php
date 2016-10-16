<?php
// namespace App;
namespace iloilofinest\Models;
// namespace App;

// use App\Models\UserLog;


use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    
    protected $table = 'users';
    protected $fillable = ['name','address','mobile','citizenship','designation','email','note','tmcno','avatar'];


	public function userlog(){
		return $this->hasMany(UserLog::class,'user_id');
	}

	public function jobs(){
		return $this->hasMany(Jobs::class,'user_id');
	}	
	public function activity(){
		return $this->hasMany(Activity::class,'user_id');
	}
	public function request(){
		return $this->hasMany(RequestDocu::class,'user_id');
	}

	public function notes(){
		return $this->hasMany(Note::class,'user_id');
	}

	public function tickets(){
		return $this->hasMany(Ticket::class,'user_id');
	}




}
