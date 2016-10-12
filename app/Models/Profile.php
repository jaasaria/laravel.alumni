<?php

namespace iloilofinest\models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = "users";
    protected $fillable = ['name','email','password','address','mobile','citizenship','designation','note'];
    
}
