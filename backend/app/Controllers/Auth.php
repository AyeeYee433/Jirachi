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

    public function logout(){
        $errors = $errors ?? [];
        $old = $old ?? [];
        session()->destroy();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'] ?? '/', $params['domain'] ?? '', isset($_SERVER['HTTPS']), true);
        return redirect()->to('/');
    }

    public function signup(){
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
            'username'        => $post['username'],
            'email'           => $post['email'],
            'password_hash'   => password_hash($post['password'], PASSWORD_DEFAULT),
            'type'            => $post['type'],
            'account_status'  => 1,
            'email_activated' => 0
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
}
