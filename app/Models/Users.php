<?php
// namespace App;
namespace iloilofinest\Models;
// namespace App;

// use App\Models\UserLog;


use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    
    protected $table = 'users';
    protected $fillable = ['name','address','mobile','citizenship','designation','email','note','avatar','middlename','lastname','campus','program','yeargraduated','companyname','companyadd','created_at', 'email', 'password'];


  
	protected $dates = ['yeargraduated'];

	 // public function getDateOfBirthAttribute($value)
  //   {
  //       return Carbon::parse($value)->format('m/d/Y');
  //   }
  //   public function formDateOfBirthAttribute($value)
  //   {
  //       return Carbon::parse($value)->format('Y-m-d');
  //   }



// other than id , call slug
// public function getRouteKeyName()
// {
//     return 'slug';
// }

 protected $hidden = [
        'password', 'remember_token',
    ];


	public function getFullNameAttribute() {
        return ucwords($this->name) . ' ' . ucwords($this->middlename). ' ' . ucwords($this->lastname);
    }

	public function scopeAlumni($query)
	{
		return $query->where('role', '=', 'alumni');
	}
	public function scopeAdmin($query)
	{
		return $query->where('role', '=', 'admin');
	}
	public function scopeVerified($query)
	{
		return $query->where('xstatus', '=', 1);
	}


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
