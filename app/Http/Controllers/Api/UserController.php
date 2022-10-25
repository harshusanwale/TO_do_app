<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;






class UserController extends Controller
{
   
    
    // user register
    public function customRegistration(Request $request)
    {

        $validator = Validator::make($request->all(), [ 
            'name' => 'required|regex:/^[A-Za-z. -]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 422);            
        }
        $input = $request->all(); 
        $input['password'] = Hash::make($request->password); 
        $user = User::create($input); 
        

        $success =  $user;
        $success['token'] = $user->createToken('MyApp')-> accessToken;
        $data = array(
            'id' => $user->id,
            'name' => $user->name,
            'password' => $user->password,
            'token' =>  $user->token,
            'created_at' => date('d-m-Y H:i:s ',strtotime($user->created_at)),
            'updated_at' => date('d-m-Y H:i:s ',strtotime($user->updated_at))
        );
        $result = $data;
        $response = [
            'status'  => 1,
            'message'   => 'successfully created',
            'success'   => $result
        ];
        return response()->json($response, 200); 
       
    }
    

    // user login
    public function customLogin(Request $request)
    {
        $loginArray = array(
            'email' => request('email'),
            'password' => request('password')
        );
        
        if (Auth::attempt($loginArray)) {
            
            $user = User::find(Auth::user()->id);
            $token_data =  $user->createToken('MyApp')->accessToken;
            $user['token'] = $token_data;
        } else {
            return response()->json(['status' => 0,'error'=>'Something went wrong.'], 422); 
        }
        
        $data = array(
            'id' => $user->id,
            'name' => $user->name,
            'token' =>  $user->token,
            'created_at' => date('d-m-Y H:i:s ',strtotime($user->created_at)),
            'updated_at' => date('d-m-Y H:i:s ',strtotime($user->updated_at))
        );
        $result = $data;
        $response = [
            'status'  => 1,
            'message'   => 'successfully login',
            'success'   => $result
        ];
        return response()->json($response, 200);
    }
}
