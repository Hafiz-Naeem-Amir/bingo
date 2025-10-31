<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Flasher\Laravel\Facade\Flasher;
class UserController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        // Password ko hash karna zaroori hai
        $data['password'] = Hash::make($data['password']);

        User::create($data);
        Flasher::success('You have registered successfully!');
        return redirect()->route('user.login');
    }

    public function loginform()
    {
        return view('login');
    }

 public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        Flasher::success('Login successful! Welcome back.');
        return redirect()->route('user.admin');
    }

    Flasher::error('Invalid email or password.');
    return back();
}

   public function admin()
{
    if (Auth::check()) {
        Flasher::success('Welcome to the Admin Dashboard!');
        return view('admin');
    } else {
        Flasher::error('Please login to access the admin panel.');
        return redirect()->route('user.login');
    }
}

    public function logout(){
        Auth::logout();
            Flasher::success('You have been logged out successfully.');
            return redirect()->route('user.login');

    }
}
