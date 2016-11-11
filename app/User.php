<?php

namespace iloilofinest;

use Illuminate\Foundation\Auth\User as Authenticatable;
use iloilofinest\Models\UserLog;

class User extends Authenticatable
{
    // use Authenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','middlename','lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //double entries from USERS class -> need to fix this 
    public function getFullNameAttribute() {
        return ucwords($this->name) . ' ' . ucwords($this->middlename). ' ' . ucwords($this->lastname);
    }

    public function userlog(){
        return $this->hasMany(UserLog::class,'user_id');
    }
    


}
