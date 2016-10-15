<?php

namespace iloilofinest\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    
    protected $table = 'tbl_jobs';
    protected $fillable = ['title','description','xstatus'];


    public function username(){
    	return $this->belongsTo(Users::class,'user_id');

    }


}

