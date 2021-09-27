<?php


namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class UserRepository 
{

    public function all ()
   {
        return DB::table('users')
                   ->join('role_user','role_user.user_id','users.id')
                   ->join('roles','roles.id','role_user.role_id')
                   ->select('firstname','lastname','username','gender','contact','email','roles.name')
                   ->get();
   }

}