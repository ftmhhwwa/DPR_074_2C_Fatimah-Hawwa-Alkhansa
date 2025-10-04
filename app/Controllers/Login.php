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

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->findUserByUsername($username);

        if ($user) {

            $full_name = $user['nama_depan'] . ' ' . $user['nama_belakang'];
            $user['full_name'] = $full_name;
        
            // Verifikasi password dengan password_verify()
            if (password_verify($password, $user['password'])) {
                // Password cocok, buat session
                $session_data = [
                    'id_pengguna'    => $user['id_pengguna'],
                    'username'       => $user['username'],
                    'full_name'     => $user['full_name'],
                    'role'           => $user['role'],
                    'isLoggedIn'    => TRUE
                ];
                $session->set($session_data);

                // Redirect ke halaman dashboard
                return redirect()->to('/dashboard');
            } else {
                // Password salah
                $session->setFlashdata('error', 'Login gagal! Password salah.');
                return redirect()->to('/login');
            }
        } else {
            // Pengguna tidak ditemukan
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