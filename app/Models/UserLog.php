<?php

namespace iloilofinest\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'user_logs';
    protected $fillable = ['user_id','task'];
}
