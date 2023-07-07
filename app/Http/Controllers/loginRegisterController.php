<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class loginRegisterController extends Controller
{
    public function registerForm()
    {

        return view('auth.register');
    }



    public function authregister(Request $request)
    {
        $inputs=$request->all();
        $inputs['password']=Hash::make($request->password);
        $result=User::create($inputs);

        if($result){
            return back()->with('success','you have registered successfully');
        }

        else{

            return back()->with('fail','something wrong');
        }
   
    }

    public function loginForm()
    {

        return view('auth.login');
    }


    public function authlogin(Request $request)
    {

        $user=User::where('email',$request->email)->first();
        if($user)
        {
            
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('loginid',$user->id);
                return redirect()->route('task.index');
            }
            else{
                return back();
            }
        }
        else{

            return back();
        }
    }


    public function logout()
    {
        if(session()->has('loginid')){

            session()->pull('loginid');
            return redirect()->route('login');
        }

    }
}
