<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;
use App\Models\OrdersModel;
use App\Models\OrderedItemsModel;
use App\Models\CartModel;

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

    public function addProduct()
    {
        // id, name, desc, img, price, stock
        $session = session();
        $request = service('request');
        $validation = \Config\Services::validation();

        $validation->setRule('name', 'name', 'required');
        $validation->setRule('price', 'price', 'required');
        $validation->setRule('stock', 'stock', 'required');

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }
        $productModel = new \App\Models\ProductModel();
        $data = [
            'name'          => $post['name'],
            'img'           => $post['img'],
            'description'   => $post['description'],
            'price'         => $post['price'],
            'stock'         => $post['stock'],
        ];

        $inserted = $productModel->insert($data);

        if ($inserted) {
            $session->setFlashdata('success', 'Product added successfully!');
            return redirect()->to('/products');
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
        $cartModel = new \App\Models\CartModel();

        $user = $session->get('user');
        if (!isset($user['id'])) {
            return redirect()->to('/login');
        }

        $data = [
            'customer_id'     => $session->get('user')['id'],
            'product_id'      => $post['product_id'],
            'quantity'        => $post['quantity']
        ];

        $existing = $cartModel
            ->where('customer_id', $data['customer_id'])
            ->where('product_id', $data['product_id'])
            ->first();

        if ($existing) {
            // Add the new quantity to the existing quantity
            $newQty = $existing->quantity + $post['quantity'];

            $cartModel->update($existing->id, [
                'quantity' => $newQty
            ]);
        } else {
            // Insert a new cart row
            $cartModel->insert([
                'customer_id' => $customerId,
                'product_id'  => $productId,
                'quantity'    => $quantity
            ]);
        }

        return redirect()->to('/cart');
    }

    public function updateQuantity()
    {
        $session = session();
        $user = $session->get('user');
        if (!isset($user['id'])) {
            return redirect()->to('/login');
        }
        $userId = $session->get('user')['id'];

        if (!$userId) {
            return redirect()->to('/login');
        }

        $post = $this->request->getPost();
        $productId = $post['product_id'];
        $change = (int) $post['change']; // -1 or 1

        $cartModel = new \App\Models\CartModel();

        $cartItem = $cartModel
            ->where('customer_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if (!$cartItem) {
            return redirect()->back();
        }

        $currentQty = $cartItem->quantity ?? 0;
        $quantity = max(1, $currentQty + $change);

        $cartModel->update($cartItem->id, ['quantity' => $quantity]);

        return redirect()->back();
    }

    public function deleteOrder($orderId)
    {
        $model = new \App\Models\OrdersModel();

        // Optional: check if the order exists
        $order = $model->find($orderId);
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        // Update deleted_at with timestamp
        $model->update($orderId, [
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/orders')->with('success', 'Order deleted successfully');
    }

    public function placeOrder()
    {
        $session = session();
        $userId = $session->get('user')['id'] ?? null;

        if (!$userId) {
            return redirect()->to('/login');
        }

        // Get POST values
        $paymentMethod = $this->request->getPost('payment_method') ?? "card";

        if (!$paymentMethod) {
            $session->setFlashdata('error', 'Please select a payment method.');
            return redirect()->back();
        }

        // Retrieve cart from session
        $cart = $session->get('cart_data');

        if (empty($cart)) {
            $session->setFlashdata('error', 'Your cart is empty.');
            return redirect()->to('/cart');
        }

        $orderModel = new OrdersModel();
        $orderItemModel = new OrderedItemsModel();
        $userModel = new UserModel();

        // Get user's saved address
        $user = $userModel->find($userId);
        $address = $user->address ?? '';

        // Create Order
        $orderData = [
            'customer_id'    => $userId,
            'address'        => $address,
            'payment_method' => $paymentMethod,
            'status'         => 'pending',
            'ordered_date'   => date('Y-m-d H:i:s')
        ];

        $orderId = $orderModel->insert($orderData);

        if (!$orderId) {
            $session->setFlashdata('error', 'Failed to place order.');
            return redirect()->back();
        }

        // Insert all cart items into order_items table
        foreach ($cart as $item) {
            $orderItemModel->insert([
                'order_id'          => $orderId,
                'product_id'        => $item['product_id'],
                'price_at_purchase' => $item['product_price'] * $item['quantity'],
                'quantity'          => $item['quantity'],
            ]);
        }

        // Clear cart from DB
        $cartModel = new CartModel();
        $cartModel->where('customer_id', $userId)->set([
            'deleted_at' => date('Y-m-d H:i:s')
        ])->update();

        // Clear cart from session
        $session->remove('cart_data');

        $session->setFlashdata('success', 'Order placed successfully!');
        return redirect()->to('/orders');
    }
    public function deleteUser($id)
    {
        $model = new \App\Models\UserModel();

        // Optional: check if the user exists
        $user = $model->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Update deleted_at with timestamp
        $model->update($id, [
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/dash')->with('success', 'User deleted successfully');
    }
}
