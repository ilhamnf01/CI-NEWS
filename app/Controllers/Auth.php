<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session   = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Verifikasi password hash
            if (password_verify($password, $user['password_hash'])) {
                $sessionData = [
                    'id'         => $user['id'],
                    'username'   => $user['username'],
                    'fullname'   => $user['fullname'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah!')->withInput();
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan!')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Anda telah berhasil logout.');
    }
}

