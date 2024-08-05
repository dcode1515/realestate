<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function login(){
        return view('auth.login');
    }
    public function login_post(Request $request){
        $validator = Validator::make($request->all(), [
            'email'            => 'required',
            'password'         => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }else{
    	    if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                
                $login = User::find(Auth::user()->id);
			
				$login->save();

              
                if (Auth::user()->user_type == "Administrator" ){
                    
                    return redirect()->route('property');
                }
               
    	    }else{
                Session::flash('message','Your login credentials dont match an account in our system.');
    	        return redirect()->back();
    	    }
        }
    }
    public function logout()
    {
        
        Auth::logout();
        return redirect('/');

    }
    


    	
}
