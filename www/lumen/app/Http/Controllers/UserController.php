<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;

class UserController extends Controller
{
    /**
     * Register User
     * 
     * @param $request
     */
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
         ];
 
        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);
 
        try {
            $hasher = app()->make('hash');
            $username = $request->input('username');
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $hasher->make($request->input('password'));
 
            $save = User::create([
                'username'=> $username,
                'name'=> $name,
                'email'=> $email,
                'password'=> $password,
                'api_token'=> ''
            ]);
            $res['status'] = true;
            $res['message'] = 'Registration success!';
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
 
    /**
     * Get LoggedIn Users
     * 
     * @return json
     */
    public function get_current_user()
    {
        // Set user as authenticated user
        $user = app('Illuminate\Contracts\Auth\Guard')->user();
        
        if ($user) {
              $res['status'] = true;
              $res['message'] = $user;
 
              return response($res);
        }else{
          $res['status'] = false;
          $res['message'] = 'Cannot find user!';
 
          return response($res);
        }
    }

    /**
     * Get Users
     * 
     * @return json
     */
    public function get_users()
    {
        // Set users to all
        $user = User::all();
        
        if ($user) {
              $res['status'] = true;
              $res['message'] = $user;
 
              return response($res);
        }else{
          $res['status'] = false;
          $res['message'] = 'Cannot find user!';
 
          return response($res);
        }
    }
}