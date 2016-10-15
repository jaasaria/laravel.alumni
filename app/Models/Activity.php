<?php

namespace iloilofinest\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    
    protected $table = 'tbl_activity';
    protected $fillable = ['title','description','xstatus'];


    public function user(){
    	return $this->belongsTo(Users::class,'user_id');

    }


}

