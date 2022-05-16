<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function signup(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if admin$admin already exists
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            return response('The provided email already exists.', 403);
            
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $admin = Admin::create($input);
        
        $response['token'] =  $admin->createToken($request->email)->plainTextToken;
        $response['admin$admin'] = $admin;
        return response(json_encode($response), 201);
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
            
        $admin = Admin::where('email', $request->email)->first();
    
        if (! $admin || ! Hash::check($request->password, $admin->password)) { 
            return response('The provided credentials are incorrect.', 403);
            // throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect.'],
            // ]);
        }
    
        $response['token'] =  $admin->createToken($request->email)->plainTextToken;
        $response['admin$admin'] = $admin;
        return response(json_encode($response));
    }
    // public function logout(Request $request) {
    //     auth()->admin$admin()->tokens()->delete();

    //     return [
    //         'message' => 'Logged out'
    //     ];
    // }
}
