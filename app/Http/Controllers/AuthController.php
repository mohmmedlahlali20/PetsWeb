<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
            return redirect()->route('Home.index')->with('success','Login Success');
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
   
        return redirect()->route('Home.index')->with('success', 'Registration successful');
    }
    

    public function Logout(){
        session::flush();
        Auth::Logout();
        return redirect()->route('login')->with('success','Logout succes');

    }

    public function Forget(){
        return view('auth.forgetPassword');

    }

    public function ForgetPassword(Request $request){
        $request->validate([
            'email' => "required|email|exists:users,email",
        ]);

        $token = Str::random(64);
        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        
        Mail::send("emails.ForgetPasswordEmail", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Reset Your Password');
        });
        
        return  redirect()->to(route('forget.password'))->with("success" , "hayd t7awa");
    }

    function resetPassword($token){
        return view('auth.newPassword' , compact('token'));

    }
 
    public function ResetPasswordPost(Request $request){

        $request->validate([
              "email" => "required|email|exists:users",
              "password" => "required|string|min:8|confirmed",
              "password_confirmed" => "required"
        ]);

        

        $resetPassword = DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        //dd($request);

        if(!$resetPassword){
         return redirect()->to(route('reset.password'))->with('error' , "fucking invalid");
        }

        User::where("email" , $request->email)->update(["password" => Hash::make($request->password)]);

        DB::table('password_reset_tokens')
        ->where(["email" => $request->email])
        ->delete();

        return redirect()->route('login')->with('success', 'hello');

    }
    
}
