<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Users extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();
        return view('user/landingpage', ['products' => $products]);
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

    public function cart(): string
    {
        $session = session();
        $userCheck = $session->get('user');
        if (!isset($userCheck['id'])) {
            return redirect()->to('/login');
        }

        $user = $session->get('user')['id'];

        if (!$user) {
            return redirect()->to('/login');
        }

        $cartModel = new \App\Models\CartModel();
        $cartItems = $cartModel
            ->select('Cart.*, Products.name AS product_name, Products.img AS product_img, Products.price AS product_price')
            ->join('Products', 'Products.id = Cart.product_id')
            ->where('Cart.customer_id', $user)
            ->findAll();
        $cart = [];

        foreach ($cartItems as $item) {
            $cart[] = $item->toArray();   // convert entity → array
        }

        return view('user/cart', ['cart' => $cart]);
    }

    public function checkout(): string
    {
        $session = session();
        $userCheck = $session->get('user');
        if (!isset($userCheck['id'])) {
            return redirect()->to('/login');
        }

        $user = $session->get('user')['id'];

        if (!$user) {
            return redirect()->to('/login');
        }

        $cartModel = new \App\Models\CartModel();
        $cartItems = $cartModel
            ->select('Cart.*, Products.name AS product_name, Products.img AS product_img, Products.price AS product_price')
            ->join('Products', 'Products.id = Cart.product_id')
            ->where('Cart.customer_id', $user)
            ->findAll();
        $cart = [];

        foreach ($cartItems as $item) {
            $cart[] = $item->toArray();
        }  // convert entity → array
        return view('user/checkout', ['cart' => $cart]);
    }

    public function productPage(): string
    {
        $request = service('request');
        $productId = $request->getGet('productId');

        $productModel = new ProductModel();
        $product = $productModel->find($productId);
        return view('user/productPage',  ['product' => $product]);
    }

    public function productReceipt(): string
    {
        return view('user/productReceipt');
    }
}
