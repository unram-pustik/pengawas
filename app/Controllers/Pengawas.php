<?php

namespace App\Controllers;

use App\Models\StaffModel;
use App\Models\PengawasModel;
use CodeIgniter\Controller;
use CodeIgniter\Pager\PagerRenderer;

class Pengawas extends Controller
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

        return view('v_daftar_pengawas', $data);
    }

    public function tambah_pengawas()
    {
        
        $pengawasModel = new PengawasModel();
        $request = $this->request->getVar();
        foreach ($request['staf'] as $kode) {
            $data = [
                'nip'   => $kode,
                'ujian' => $request['ujian'],
            ];
            $pengawasModel->insert($data);
            
        }
        // return view('staf_view', $data);
    }
    

   
}
