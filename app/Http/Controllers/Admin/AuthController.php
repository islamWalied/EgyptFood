<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fileType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fileType === 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5|max:45',
            ], [
                'login_id.required' => 'Email or Username is required',
                'login_id.email' => 'Invalid Email Address',
                'login_id.exists' => 'This email does not exist in our database',
                'password.required' => 'Password is required',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5|max:45',
            ], [
                'login_id.required' => 'Email or Username is required',
                'login_id.exists' => 'This username does not exist in our database',
                'password.required' => 'Password is required',
            ]);
        }

        // Uncomment this line to use the credentials for authentication
        $credentials = [$fileType => $request->login_id, 'password' => $request->password];
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.home');
        }

        return redirect()->back()->with('fail', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flash('fail' , 'User logged out successfully');
        return redirect()->route('admin.login');
    }
}
