<?php

namespace App\Http\Controllers;

use \http\Env\Response;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function user(Request $request)
    {
        $validation = $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|min:8|email'
        ]);

        $username = DB::table('users')
            ->where('username', '=', $request->input('username'));

        $email = DB::table('users')
            ->where('email', '=', $request->input('email'));

        if ($username->count() == 0 && $email->count() == 0) {
            $created = DB::table('users')
                ->insert([
                    'username' => $request->input('username'),
                    'username_hash' => sha1($request->input('username')),
                    'password' => password_hash($request->input('password'),  PASSWORD_BCRYPT),
                    'email' => $request->input('email')
                ]);

            if ($created) {
                $this->addMessage('success', 'User successfull created. Please check your mails to active the User.');
            } else {
                $this->addMessage('error', 'User creation failed');
            }
        } else if ($username->count() !== 0) {
            $this->addMessage('error', 'User with username already exists');
        } else {
            $this->addMessage('error', 'User with email already exists');
        }

        return $this->getResponse();
    }
}
