<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{

    public function login(){
        return view('auth.login');
    }


    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    //dd($credentials);
        if(Auth::attempt($credentials)){
            return redirect()->route('welcome')->with('success','Login Success');
        }
    
        return redirect()->back()->with('error', 'Login Failed');
    }
    

    public function register(){
        return view('auth.register');
    }

    

    public function registerPost(AuthRequest $request){
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
    
        $user = User::create($data);
       
       
        if(!$user){
            return redirect()->back()->with('error', 'Registration failed');
        }
        auth()->login($user);
   
        // Rediriger l'utilisateur vers la page d'accueil (ou toute autre page authentifiée) avec actualisation de la page
        return redirect()->route('welcome')->with('success', 'Registration successful');
    }
    

    public function Logout(){
        session::flush();
        Auth::Logout();
        return redirect()->route('login')->with('success','Logout succes');

    }


    
}
