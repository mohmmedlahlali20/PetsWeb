<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class AuthController extends Controller
{
    //login 
    public function LoginForm(){
        return view('auth.login');

    }

    public function login(){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
          
            return redirect()->intended('welcome');
        }
        dd(Auth::attempt($credentials));

              return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

//register
    public function RegisterForm() {
        return view('auth.register');
    }

    public function Register(UserRequest $request){


         $validatedData = $request->validated();
    
         $name = $validatedData['name'];
         $email = $validatedData['email'];
         $password = $validatedData['password'];
     

         $user = new User();
         $user->name = $name;
         $user->email = $email;
         $user->password = bcrypt($password);
         $user->save();
 
         return redirect()->route('welcome');

    }
}
