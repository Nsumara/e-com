<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Auth;
class Admincontroller extends Controller
{
    public function admin_index(){
        
        // echo Hash::make('password');
        // exit();
        return view('admin.layouts.main');
    }
    
    public function admin_table()
    {
        return view('admin.layouts.table');
    }
    public function login(){
        return view('admin.layouts.login');

    }
    public function create_login(Request $request)
    {
        $data=
            array('email' => $request->email,
            'password' => $request->password,
           'role'=>$request->admin,
        );

        if (Auth::attempt($data))
        {
             return view('admin.layouts.main');
        }
        else{
            return back()->withError('Have Some error  in data form');
        }
       
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
