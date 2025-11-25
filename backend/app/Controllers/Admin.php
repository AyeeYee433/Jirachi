<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function dashBoard(): string
    {
        return view('admin/dashBoard');
    }

    public function products(): string
    {
        return view('admin/products');
    }
    public function orders(): string
    {
        return view('admin/orderPage');
    }
}
