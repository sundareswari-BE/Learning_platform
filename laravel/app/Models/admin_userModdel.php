<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class admin_userModdel extends Model
{
    protected $table = 'table_admin_user';
    protected $fillable = [
        'id',
        'name',
        'password',
        'email',
        'role',
    ];

    public static function addadmin($data)
    {
     admin_userModdel::create([
         'name' => $data['name'],
         'password' => $data['password'],
         'email' => $data['email'],
         'role' => $data['role'],
     ]);
     
    }
    public static function viewadmin()
    {
     $view_data=admin_userModdel::get();
     return $view_data;
    }
    public static function editadmindata($id)
    {
     $editadmin=admin_userModdel::where('id',$id)->first();
     return $editadmin;
    }
    public static function updateadmin($data)
    {
     admin_userModdel::where('id',$data['id'])->update([
         'name' => $data['name'],
         'password' => $data['password'],
         'email' => $data['email'],
         'role' => $data['role'],
     ]);
     
    }
    
  
}
