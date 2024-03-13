<?php

namespace App\Controllers;

use App\Models\UjianModel;

class Ujian extends BaseController
{
    public function index()
    {
        return view('form/v_tambah_ujian');
    }

    public function tambah_ujian()
    {
        $ujianModel = new UjianModel();
        $data = [
            'kode_ujian' => $this->request->getPost('kode_ujian'),
            'nama_ujian' => $this->request->getPost('nama_ujian'),
            'tahun_ujian' => $this->request->getPost('nama_ujian'),
            'ket_ujian' => $this->request->getPost('ket_ujian'),
            'tgl_mulai_ujian'  => date('Y-m-d'),
            'tgl_akhir_ujian'  => date('Y-m-d'),
            // 'tgl_selesai' => $this->request->getPost('tgl_selesai'),
        ];
        // dd($data);
        $ujianModel->insert($data);
    
        return redirect()->to(base_url('/ujian'));
    }

    public function list_ujian()
    {
        $ujianModel = new UjianModel();
        $data_ujian = $ujianModel->findAll();
        
        return view('v_list_ujian', ['data_ujian' => $data_ujian]);
    }

    public function detail_ujian($kode_ujian)
    {
        $ujianModel = new UjianModel();
        $data_ujian = $ujianModel->where('kode_ujian', $kode_ujian)->first();
        // dd($data_ujian);
        return view('v_detail_ujian', ['data_ujian' => $data_ujian]);
        
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}


