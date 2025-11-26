<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\OrderedItemsModel;

class Users extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();
        return view('user/landingpage', ['products'=> $products]);
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
        $OrderedItemsModel = new OrderedItemsModel();
        $ProductModel = new ProductModel();
        $OrderedItems = $OrderedItemsModel->findAll();
        $Product = $ProductModel->findAll();
        return view('user/cart', ['cart'=> $OrderedItems, "products"=> $Product]);

    }
        public function checkout(): string
    {
        return view('user/checkout');
    }
}
