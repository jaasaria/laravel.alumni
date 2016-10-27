<?php

namespace iloilofinest\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    protected $table = 'tbl_request_message';
    protected $fillable = ['user_id','request_id','description'];


    public function user(){
    	return $this->belongsTo(Users::class,'user_id');
    }

   

    public function request(){
    	return $this->belongsTo(RequestDocu::class,'request_id');
    }


}

