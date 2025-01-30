<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_userModdel;
class admin_userController extends Controller
{
    public function adminform()
    {
        $data['button'] = 'Add Admin';
        $data['title'] = 'Add Admin';
        $data['url'] = 'admin/addadmin';
        $data['name'] = '';
        $data['email'] = '';
        $data['password'] = '';
        $data['role'] = '';
        return view('admin.addadmin',compact('data'));
    }




    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'role.required' => 'Role is required',
        ]
        );
        $data=array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        );
        admin_userModdel::addadmin($data);
        return redirect()->back()->with('success','Admin added successfully');
    }



    public function viewadmin(){
       $view_data= admin_userModdel::viewadmin();
        return view('admin.viewadmin',compact('view_data'));
    }



    public function editadmin($id){
        
        $view_data= admin_userModdel::editadmindata($id);
        $data['button'] = 'Update Admin';
        $data['title'] = 'Update Admin';
        $data['url'] = 'admin/updateadmin/{id}';
        $data['name'] = $view_data->name;
        $data['email'] = $view_data->email;
        $data['password'] = $view_data->password;
        $data['role'] = $view_data->role;
        return view('admin.addadmin',compact('data'));
     }
        
    public function updateadmin(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'role.required' => 'Role is required',
        ]
        );
        $data=array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        );
        admin_userModdel::updateadmin($data);
        return view('admin.viewadmin')->with('success','Admin updated successfully');
    }
}
