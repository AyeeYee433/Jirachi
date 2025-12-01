<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\OrdersModel;
use App\Models\UserModel;
use App\Models\ProductModel;

class Admin extends BaseController
{
    public function dashBoard(): string
    {
        $userModel = new UserModel();
        $user = $userModel->findAll();
        return view('admin/dashBoard', ['users' => $user]);
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
        $customer = $userModel->findAll();
        $ordersModel = new OrdersModel();
        $orders = $ordersModel->findAll();
        return view('admin/orderPage', ['orders' => $orders, 'customer' => $customer]);
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
    public function productForm($id = null)
    {
        $productModel = new \App\Models\ProductModel();

        if ($id !== null) {
            $product = $productModel->find($id);
        } else {
            $product = new \App\Models\ProductModel();
        }
        return view('admin/addProducts', ['product' => $product]);
    }
    public function saveProduct()
    {
        $request = service('request');
        $post = $request->getPost();
        $productModel = new ProductModel();

        $data = [
            'name' => $post['name'],
            'description' => $post['description'],
            'img' => $post['img'],
            'price' => $post['price'],
            'stock' => $post['stock']
        ];

        if (!empty($post['id'])) {
            $productModel->update($post['id'], $data);
            return redirect()->to('/products')->with('success', 'Product updated!');
        } else {
            $productModel->insert($data);
            return redirect()->to('/products')->with('success', 'Product updated!');
        }
    }
}
