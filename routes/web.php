<?php
use Illuminate\Support\Facades\Route;

Route::post('/user/register', [
    'middleware' => ['xss', 'https'],
    'uses' => 'App\Http\Controllers\RegisterController@user'
]);
