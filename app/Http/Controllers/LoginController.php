<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(Request $request){
        $users=User::where('email',$request->email)->where('password',$request->password)->first();
        if (isset($users)){
            session()->put('users',$users);
            return redirect()->route('admin.post.index');
        }
        else{
            return view('login');

        }

    }
    public function logout(){
        session()->flush();
        return view('login');
    }
}
