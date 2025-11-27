<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
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
        return view('admin/addProducts');
    }
    public function viewOrder($order_id): string
    {
        $orderModel = new OrdersModel();
        $userModel = new UserModel();

        $order = $orderModel->where('id', $order_id)->first();
        $customer = $userModel->where('id', $order->customer_id)->first();

        return view('admin/viewOrder', ['order' => $order, 'customer' => $customer]);
    }
}
