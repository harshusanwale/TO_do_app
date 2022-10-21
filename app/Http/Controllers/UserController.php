<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;





class UserController extends Controller
{
    public function index()
    {
        $title = 'Login';
        return view('login', compact('title'));
    }

    public function register()
    {
        $title = 'Register';
        return view('register', compact('title'));
    }
    
    // for user dashboard
    public function dashboard()
    {
        $title = 'dashboard';
        if (Auth::check()) {
            $data =   Auth::user();
        }

        return view('dashboard', compact('title', 'data'));
    }
    
    // user register
    public function customRegistration(Request $request)
    {

        $request->validate([
            'name' => 'required|regex:/^[A-Za-z. -]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        );
        User::create($data);
        return redirect("register")->withSuccess('You have registered successfully.');
    }
    

    // user login
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("/")->with('error', 'Login details are not valid');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
