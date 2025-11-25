<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function dashBoard(): string
    {
        return view('admin/dashBoard');
    }
}
