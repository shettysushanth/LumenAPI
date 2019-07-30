<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\User;
 
class LoginController extends Controller
{

    /**
     * Login Action
     * 
     * @param $request data
     * @return array
     */
    public function login(Request $request)
    {
        // Required Inputs
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
 
        // Custom messages
        $customMessages = [
           'required' => ':attribute is required'
        ];

        // Validate the request data
        $this->validate($request, $rules, $customMessages);
        $email = $request->input('email');

        // Try the login
        try {

            $login = User::where('email', $email)->first();

            // Check if login email exists | false or invalid
            if ($login) {

                // Check if login email exists | valid email
                if ($login->count() > 0) {

                    // Match the hash password
                    if (Hash::check($request->input('password'), $login->password)) {

                        try {
                            $api_token = sha1($login->id_user.time());
 
                            $create_token = User::where('id', $login->id)->update(['api_token' => $api_token]);
                            $res['status'] = true;
                            $res['message'] = 'Success login';
                            $res['data'] =  $login;
                            $res['api_token'] =  $api_token;

                            return response($res, 200);
 
 
                        } catch (\Illuminate\Database\QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }

                    } else {
                        $res['success'] = false;
                        $res['message'] = 'Username / email / password wrong';
                        return response($res, 401);
                    }

                } else {
                    $res['success'] = false;
                    $res['message'] = 'Username / email / password  does not exist';
                    return response($res, 401);
                }

            } else {
                $res['success'] = false;
                $res['message'] = 'Username / email / password does not exist';
                return response($res, 401);
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
}