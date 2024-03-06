<?php

namespace App\Controllers;

use App\Models\StaffModel;
use App\Models\PengawasModel;
use CodeIgniter\Controller;
use CodeIgniter\Pager\PagerRenderer;

class Staf extends Controller
{
    public function index()
    {
        $session = session();

        // Dapatkan data dari sesi
        $data_fakultas = $session->get('fakultas');
        
        // dd($data_fakultas);
        $staffModel = new StaffModel();
        
        // Konfigurasi Paginasi
        $pager = \Config\Services::pager();
        $pager->setPath(''); // Menyembunyikan URL paginasi

        $data['staf'] = $staffModel->where('unit_kode_fakultas', $data_fakultas)
                            ->orderBy('kode', 'DESC')->findAll();
        $data['pager'] = $staffModel->pager;

        return view('staf_view', $data);
    }

    public function tambah_pengawas()
    {
        $request = $this->request;
        $pengawasModel = new PengawasModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nip'   => $this->request->getPost('nip'),
            'ujian' => $this->request->getPost('ujian'),
            'unit_kerja'    => $this->request->getPost('unit_kerja'),
        ];
        var_dump($this->request->getVar());
       
        // $pengawasModel->insert($data);
    }

   
}
