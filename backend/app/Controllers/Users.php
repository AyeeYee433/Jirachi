<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index(): string
    {
        return view('user/landingpage');
    }

    public function moodBoard(): string
    {
        return view('user/moodboard');
    }
    public function signUp(): string
    {
        return view('user/signUp');
    }
    public function login(): string
    {
        return view('user/login');
    }
}
