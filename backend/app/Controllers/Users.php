<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function moodBoard(): string
    {
        return view('user/moodboard');
    }
}
