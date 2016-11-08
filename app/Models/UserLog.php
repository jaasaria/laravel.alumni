<?php

namespace iloilofinest\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'tbl_user_logs';
    protected $fillable = ['user_id','task'];
}
