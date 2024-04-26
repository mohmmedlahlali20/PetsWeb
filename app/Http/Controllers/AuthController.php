<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\commends;
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
use Illuminate\Support\Facades\Storage;
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
        
        $data = $request->validated();
        
        $image = null; 
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('Avatars', 'public');
        } 
    
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $image, // Assign the image variable
        ]);
    
        if (!$user) {
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
    
        $imagePath = public_path('assets/images/logo.jpg');

        Mail::send("emails.ForgetPasswordEmail", ['token' => $token, 'imagePath' => $imagePath], function ($message) use ($request, $imagePath) {
            $message->to($request->email)
                    ->subject('Reset Your Password')
                    ->embed($imagePath);
        });
    
        return redirect()->to(route('forget.password'))->with("success", "Password reset email sent");
    }

    public function resetPassword($token){
        return view('auth.newPassword', compact('token'));
    }
 


public function ResetPasswordPost(Request $request){
    $request->validate([
          "email" => "required|email|exists:users",
          "password" => "required|string|min:8|confirmed",
    ]);

    $resetPassword = PasswordResetToken::where('email', $request->email)
                                         ->where('token', $request->token)
                                         ->first();

    if(!$resetPassword){
        return redirect()->route('reset.password')->with('error', "Invalid or expired token");
    }

    $dd = User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);
//dd($dd);
    $resetPassword->delete();

    return redirect()->route('login')->with('success', 'Password reset successfully');
}


public function Profile(){
    $user = Auth::user();
    $userCommands = $user->commands()->get();
    $totalPrice = $user->commands()->sum('total_price');
    $allcommands = commends::where('user_id', $user->id)->get(); 
    
    return view('auth.profile', compact('user', 'userCommands', 'totalPrice' , 'allcommands'));
}

public function updateProfile(Request $request) {
    $user = Auth::user();
    
    $user->update([
        'name' => $request->input('name'),
    ]);
    
    return redirect()->route('profile')->with('success', 'Profile updated successfully');
}


public function updatePassword(Request $request) {
    //dd($request->all());
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|string|min:8',
    ]);

    $user = Auth::user();
//dd($user);

if (!Hash::check($request->input('old_password'), $user->password)) {
    return redirect()->back()->with('error', 'The old password you entered is incorrect.');
}

$newPassword = $request->input('new_password');

if (Hash::needsRehash($newPassword)) {
    $user->password = Hash::make($newPassword);
} else {
    $user->password = $newPassword; 
}

$user->save();


    return redirect()->back()->with('success', 'Password updated successfully.');
}


public function updateImage(Request $request) {
    $user = Auth::user();

    $request->validate([
        'image' => 'required|image', 
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('Avatrs', 'public');
        
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->update([
            'image' => $imagePath,
        ]);
    }

    return redirect()->back()->with('success', 'Image updated successfully.');
}




}
