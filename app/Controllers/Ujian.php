<?php

namespace App\Controllers;

use App\Models\UjianModel;
use App\Models\M_user;

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
        
        $data_pengawas = $ujianModel->db->table('pengawas')->where('kode_ujian', $kode_ujian)->get()->getResult();
        $session = session();
        $role = $_SESSION['role'];
        // dd($role);
        if ($role == 1) {
            return view('v_detail_ujian_admin', ['data_ujian' => $data_ujian, 'data_pengawas'=>$data_pengawas]);
        } else {
            return view('v_detail_ujian', ['data_ujian' => $data_ujian, 'data_pengawas'=>$data_pengawas]);
        }
        
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


