<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\Print_;

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

        return view('admin.dashboard', compact('title', 'data'));
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
     
    // logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    //for user dashboard
    public function userDashboard() 
    {
        if (Auth::check()) {
            $data =   Auth::user();
        }
        $task = Task::with('user')->get();       
        return view('admin.user.index', compact( 'data','task'));
    } 
    
    //for user add task
    public function userAddTask()  
    {       
        if (Auth::check()) {
            $data =   Auth::user();
        }
        return view('admin.user.add', compact( 'data'));
    }

    // store task
    public function storeTask(Request $request)
    {      
       $request->validate([
           'task'  => 'required',
       ]);
       
       if (Auth::check()) {
           $userid =   Auth::user();
       }
       $data = array(
           'task' => $request->task,
           'user_id' => $userid->id,     
       );
       
       Task::create($data);
       return response()->json(['success'=>' Added Successfully']); 
       }

    //for status change
    public function statusChange($id)  
    {       
        if (Auth::check()) {
            $data =   Auth::user();
        }
        $userID = Crypt::decrypt($id);
        $taskdata = Task::find($userID);
        return view('admin.user.edit', compact( 'data','taskdata'));
    }

    //for edit status 
    public function edit_status(Request $request,$id)  
    {       
        $request->validate([
            'status'  => 'required',
        ]);
       
        Task::where('id',$id)->update(array(
            'status'=>$request->status,
         ));
        return response()->json(['success'=>' update Successfully']); 
         }
  
  
}
