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

   public function findById ($id)
   {
        return DB::table('users')
                   ->join('role_user','role_user.user_id','users.id')
                   ->join('roles','roles.id','role_user.role_id')
                   ->select('firstname','lastname','username','gender','contact','email','roles.name as role')
                   ->where('users.id',$id)
                   ->get();
   }

   public function findByRole ($role)
   {
        return DB::table('users')
                   ->join('role_user','role_user.user_id','users.id')
                   ->join('roles','roles.id','role_user.role_id')
                   ->select('firstname','lastname','username','gender','contact','email','roles.name as role')
                   ->where('roles.name',$role)
                   ->get();
   }



}