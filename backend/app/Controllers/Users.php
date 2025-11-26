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
        return view('user/cart');
    }
    public function checkout(): string
    {
        return view('user/checkout');
    }
    public function productPage(): string
    {
        $request = service('request');
        $productId = $request->getGet('productId');

        $productModel = new ProductModel();
        $product = $productModel->find($productId);
        return view('user/productPage',  ['product' => $product]);
    }
}
