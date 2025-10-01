<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        // Menampilkan halaman login
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (! $this->validate($rules)) {
            $session->setFlashdata('error', 'Username dan Password wajib diisi.');
            return redirect()->to('/login')->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->findUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                
                // Gabungkan nama depan dan belakang
                $fullName = $user['nama_depan'] . ' ' . $user['nama_belakang'];
                
                // Password cocok, buat session
                $session_data = [
                    'user_id'    => $user['id_pengguna'], 
                    'username'   => $user['username'],
                    'full_name'  => $fullName, 
                    'role'       => $user['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($session_data);

                // ROLE-BASED REDIRECT
                if ($user['role'] === 'Admin') {
                    return redirect()->to('/admin/dashboard');
                } else { // Public
                    return redirect()->to('/public/dashboard');
                }

            } else {
                $session->setFlashdata('error', 'Login gagal! Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Login gagal! Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}