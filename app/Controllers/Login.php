<?php

namespace App\Controllers;

use App\Models\M_user;

class Login extends BaseController
{

    public function __construct()
    {
        $this->session = session();
    }
    
    public function index()
    {
        return view('v_login');
    }

    public function process()
    {
        $request = service('request');

        // Ambil data dari form login
        $username = $request->getPost('username');
        $password = $request->getPost('password');
        // Panggil model Auth
        $authModel = new M_user();

        // Cek keberadaan pengguna dalam database
        $dataUser = $authModel->getUser($username, $password);
        //  dd($dataUser['role']);
        

        if ($dataUser) {
            
            $session = session();
            $session->set([
                'username' => $dataUser['username'],
                'isLoggedIn' => true,
                'role' => $dataUser['role'],
                'fakultas' => $dataUser['fakultas']
            ]);
            // dd($_SESSION);

            if ($dataUser["role"] == "1") {
                return redirect()->to(base_url('/user'));
            }
           
            elseif ($dataUser["role"] == "2") {
                return redirect()->to(base_url('/staf'));
            }
            } else {
                session()->setFlashdata('error', 'Username & Password Salah!!!!');
                return redirect()->back();
                // return redirect()->to(base_url('user'));
            }
        } 

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}