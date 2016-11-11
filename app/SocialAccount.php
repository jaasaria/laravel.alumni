<?php

namespace iloilofinest;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
	
	protected $table = 'tbl_socialaccount';
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
