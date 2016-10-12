<?php 

namespace App\Helpers;
use DB;

class dbfunction
{
 
    public static function insertlogs($id,string $task){
    	DB::insert('insert into user_logs (user_id, task) values (?, ?)',[$id,$task]);
    }

}
?>