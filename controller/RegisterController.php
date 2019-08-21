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
            'password' => 'required|min:8'
        ]);


    }
}
