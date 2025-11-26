<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\UserModel;

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
        $userModel = new UserModel();
        $user = $userModel->findAll();
        $ordersModel = new OrdersModel();
        $orders = $ordersModel->findAll();
        return view('admin/orderPage', ['orders' => $orders, 'user' => $user]);
    }
    public function adprod(): string
    {
        return view('admin/adminProducts');
    }
}
