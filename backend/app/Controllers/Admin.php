<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\UserModel;
use App\Models\ProductModel;

class Admin extends BaseController
{
    public function dashBoard(): string
    {
        return view('admin/dashBoard');
    }
    public function products(): string
    {
        $model = new ProductModel();
        $products = $model->findAll();

        return view('admin/products', [
            'products' => $products
        ]);
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
        return view('admin/addProducts');
    }
}
