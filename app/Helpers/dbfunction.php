<?php

namespace App\Helpers;

use iloilofinest\Models\UserLog;

class dbfunction
{

    public static function insertlogs($id, $task){

        UserLog::create([
        	'user_id'=> $id,
        	'task'=> $task,
        	]);
        

    }





}
?>