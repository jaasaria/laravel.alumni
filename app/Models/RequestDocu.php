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

    public function message(){
    	return $this->hasmany(Message::class,'request_id')->orderBy('id','desc');

    }

// $ReqPending = RequestDocu::where('xstatus','=','0')->count();

	public function getPendingAttribute() {

 		// return RequestDocu::where('xstatus','=','0')->count();
 		return RequestDocu::where('xstatus','=','0')->count();

    }

	public function Pending() {

 		return RequestDocu::where('xstatus','=','0')->count();

    }


}

