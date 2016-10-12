<?php

namespace iloilofinest\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    
    protected $table = 'notes';
    protected $fillable = ['title','note','xstatus'];


    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');

    }


}

