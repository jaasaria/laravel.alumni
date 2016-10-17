<?php

namespace iloilofinest\Models;

use Illuminate\Database\Eloquent\Model;

class RequestDocu extends Model
{
    
    protected $table = 'tbl_request';
    protected $fillable = ['title','description','documents','xstatus'];


    public function user(){
    	return $this->belongsTo(Users::class,'user_id');

    }


}

