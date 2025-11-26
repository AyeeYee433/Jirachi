<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{

    public function login()
    {
        $request = service('request');
        $session = session();
        $validation = \Config\Services::validation();
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required');

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $email = $request->getPost('email');
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();

        if (! $user) {
            $session->setFlashdata('errors', ['email' => 'No account found for that email']);
            $session->setFlashdata('old', ['email' => $email]);
        }
        $userArr = is_array($user) ? $user : (method_exists($user, 'toArray') ? $user->toArray() : (array) $user);

        if (! password_verify($request->getPost('password'), $userArr['password_hash'] ?? '')) {
            $session->setFlashdata('errors', ['password' => 'Incorrect password']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        $session->set('user', [
            'id' => $userArr['id'] ?? null,
            'email' => $userArr['email'] ?? null,
            'type' => $userArr['type'] ?? 'user',
            'username' => $userArr['username'] ?? null,
        ]);

        $type = strtolower($userArr['type'] ?? 'user');
        if ($type === 'admin') {
            return redirect()->to('/dashboard');
        }

        return redirect()->to('/');
    }

    public function logout()
    {
        $errors = $errors ?? [];
        $old = $old ?? [];
        session()->destroy();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'] ?? '/', $params['domain'] ?? '', isset($_SERVER['HTTPS']), true);
        return redirect()->to('/');
    }

    public function signup()
    {
        $session = session();
        $request = service('request');
        $validation = \Config\Services::validation();
        $validation->setRule('username', 'Username', 'required|min_length[3]|is_unique[userTable.username]');
        $validation->setRule('email', 'Email', 'required|valid_email|is_unique[userTable.email]');
        $validation->setRule('password', 'Password', 'required|min_length[8]');
        $validation->setRule('confirmPassword', 'Confirm Password', 'required|matches[password]');

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }
        $userModel = new \App\Models\UserModel();

        $data = [
            'first_name'      => $post['first_name'],
            'last_name'       => $post['last_name'],
            'username'        => $post['username'],
            'email'           => $post['email'],
            'address'         => $post['address'],
            'type'            => 'user',
            'password_hash'   => password_hash($post['password'], PASSWORD_DEFAULT)
        ];

        $inserted = $userModel->insert($data);

        if ($inserted) {
            $session->setFlashdata('success', 'Account created successfully! You can now log in.');
            return redirect()->to('/login');
        } else {
            $session->setFlashdata('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function adProd()
    {
        // id, name, desc, img, price, stock
        $session = session();
        $request = service('request');
        $validation = \Config\Services::validation();

        $validation->setRule('name', 'name', 'required|is_unique[ProductsTable.name]');
        $validation->setRule('price', 'price', 'required');
        $validation->setRule('stock', 'stock', 'required');

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }
        $cartModel = new \App\Models\CartModel();

        $data = [
            'name'      => $post['name'],
            'img'       => $post['img'],
            'price'     => $post['price'],
            'stock'     => $post['stock'],
        ];

        $inserted = $userModel->insert($data);
        
        if ($inserted) {
            $session->setFlashdata('success', 'Account created successfully! You can now log in.');
            return redirect()->to('/dash');
        } else {
            $session->setFlashdata('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function productPage()
    {
        $session = session();
        $request = service('request');
        $productId = $request->getPost('product_id');

        if ($session->has('user')) {
            return redirect()->to('/productPage?productId=' . $productId);
        } else {
            return redirect()->to('/login');
        }
    }

    public function addToCart()
    {
        $session = session();
        $request = service('request');
        $post = $request->getPost();

        $data = [
            'customer_id'     => $session["id"],
            'product_id'      => $post['product_id'],
            'quantity'        => $post['quantity']
        ];
        $inserted = $cartModel->insert($data);

        if ($inserted) {
            return redirect()->to('/cart');
        } else {
            $session->setFlashdata('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }
}
