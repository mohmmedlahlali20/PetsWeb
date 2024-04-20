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

    

    public function registerPost(AuthRequest $request)
{
    // Validate the request data
    $data = $request->validated();
    
    if ($request->hasFile('avatar')) {
        $data['avatar'] = $request->file('avatar')->store('public/Avatars');
    }

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'avatar' => $data['avatar']
    ]);

    if (!$user) {
        return redirect()->back()->with('error', 'Registration failed');
    }
    
    // Log in the newly registered user
    auth()->login($user);

    // Redirect to the home page with a success message
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
    
        // Store the token in the database
        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );
    
        $imagePath = public_path('assets/images/logo.jpg');

        Mail::send("emails.ForgetPasswordEmail", ['token' => $token, 'imagePath' => $imagePath], function ($message) use ($request, $imagePath) {
            $message->to($request->email)
                    ->subject('Reset Your Password')
                    ->embed($imagePath);
        });
    
        return redirect()->to(route('forget.password'))->with("success", "Password reset email sent");
    }

    public function resetPassword($token){
        // Pass the token to the view
        return view('auth.newPassword', compact('token'));
    }
 


public function ResetPasswordPost(Request $request){
    $request->validate([
          "email" => "required|email|exists:users",
          "password" => "required|string|min:8|confirmed",
    ]);

    // Fetch the reset token from the database
    $resetPassword = PasswordResetToken::where('email', $request->email)
                                         ->where('token', $request->token)
                                         ->first();

    if(!$resetPassword){
        return redirect()->route('reset.password')->with('error', "Invalid or expired token");
    }

    // Update the user's password
    $dd = User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);
//dd($dd);
    // Delete the reset token from the database
    $resetPassword->delete();

    return redirect()->route('login')->with('success', 'Password reset successfully');
}
}
