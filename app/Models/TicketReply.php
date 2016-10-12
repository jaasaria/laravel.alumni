<?php

namespace iloilofinest\Models;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    
    protected $table = 'ticket_reply';
    protected $fillable = ['user_id','ticket_id','description','ifRead','created_at'];

}


