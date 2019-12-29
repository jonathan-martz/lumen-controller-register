<?php

namespace App\Http\Controllers;

use App\Mail\RegisterUser;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class RegisterController extends Controller
{
    /**
     * @return Response
     */
    public function user()
    {
        $validation = $this->validate($this->request, [
            'username' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|min:8|email'
        ]);

        $username = DB::table('users')
            ->where('username', '=', $this->request->input('username'));

        $email = DB::table('users')
            ->where('email', '=', $this->request->input('email'));

        if ($username->count() == 0 && $email->count() == 0) {

            if (Schema::hasTable('user_role')) {
                $role = DB::table('user_role')->where('name', '=', 'user');

                if ($role->count() !== 0) {
                    $created = DB::table('users')
                        ->insert([
                            'username' => $this->request->input('username'),
                            'username_hash' => sha1($this->request->input('username')),
                            'password' => password_hash($this->request->input('password'), PASSWORD_BCRYPT),
                            'email' => $this->request->input('email'),
                            'RID' => $role->first()->id
                        ]);

                    if ($created) {
                        $this->addMessage('success', 'User successfull created. Please check your mails to active the User.');
                        $this->sendMail($this->request->input('username'), $this->request->input('email'));
                    } else {
                        $this->addMessage('error', 'User creation failed');
                    }
                } else {
                    $this->addMessage('error', 'User Role User doesnt exists, please contact the Admin with this message.');
                }
            } else {
                $this->addMessage('error', 'User Role Table doesnt exists, please contact the Admin with this message.');
            }
        } else if ($username->count() !== 0) {
            $this->addMessage('error', 'User with username already exists');
        } else {
            $this->addMessage('error', 'User with email already exists');
        }

        return $this->getResponse();
    }

    public function sendMail($username, $email)
    {
        $token = bin2hex(openssl_random_pseudo_bytes(256));

        $user = DB::table('users')
            ->where('username', '=', $username)
            ->where('username_hash', '=', sha1($username))->get()->first();

        DB::table('user_activate_token')->insert(
            [
                'userid' => $user->id,
                'token' => $token,
                'date' => strtotime('now')
            ]
        );

        Mail::to($email)->send(new RegisterUser($username, $token, $email));
    }
}
