<?php

namespace iloilofinest\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{

    use SoftDeletes;

    protected $table = 'tbl_jobs';
    protected $fillable = ['title','description','xstatus','dudate'];


    public function setDueDateAttribute($date){
        $this->attributes['Duedate'] = Carbon::parse($date);
    }   

    public function user(){
    	return $this->belongsTo(Users::class,'user_id');
    }


}

