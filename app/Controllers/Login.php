<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
   // Potongan kode di Login.php
public function index()
{
    // Cek Session
    if (session()->get('isLoggedIn')) { 
        return redirect()->to('/perpus'); 
    }
    return view('login_view');
}
    public function auth()
    {
        $session = session();
        $db = \Config\Database::connect();
        
        // Ambil input dari form
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Cek di database
        $user = $db->table('users')->where('username', $username)->get()->getRowArray();

        if ($user) {
            // Cek password
            if ($password == $user['password']) {
                $ses_data = [
                    'id'       => $user['id'],
                    'username' => $user['username'], 
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/perpus');
            } else {
                $session->setFlashdata('msg', 'Password Salah!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}