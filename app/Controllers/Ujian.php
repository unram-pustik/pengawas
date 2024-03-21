<?php

namespace App\Controllers;

use App\Models\UjianModel;
use App\Models\fakultasModel;
use App\Models\LimitModel;
use App\Models\PengawasModel;
use App\Models\PjlModel;

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
        $limitModel = new LimitModel();
        $pengawasModel = new PengawasModel();
        $pjlModel   = new PjlModel();
        $data_ujian = $ujianModel->where('kode_ujian', $kode_ujian)->first();
       
        $data_pengawas = $pengawasModel->getPengawas();
        
        $data_pjl = $pjlModel->getpjl();
      
        $session = session();
        $role = $_SESSION['role'];
        $fakultas = $_SESSION['fakultas'];

        $data_pengawas_op = $pengawasModel->getPengawasByFakultas($fakultas);
        $data_pjl_op = $pjlModel->getpjlByFakultas($fakultas);
        
        $data_limit = $limitModel->getDataLimit($kode_ujian, $fakultas);

        if ($role == 1) {
            return view('v_detail_ujian_admin', ['data_ujian' => $data_ujian, 'data_pengawas'=>$data_pengawas, 'data_pjl'=>$data_pjl, 'data_limit' => $data_limit]);
        } else {
            return view('v_detail_ujian', ['data_ujian' => $data_ujian, 'data_pengawas'=>$data_pengawas_op, 'data_limit' => $data_limit, 'data_pjl'=>$data_pjl_op,]);
        }
        
    }

    
    public function limit()
    {
        $fakultasModel = new FakultasModel();
        $ujianModel = new UjianModel();
        $limitModel = new LimitModel();
        $data_fakultas = $fakultasModel->findAll();
        $data_ujian = $ujianModel->findAll();
        $data_limit = $limitModel->getDataLimit();

        $data = [
            'kode'          => $this->request->getPost('kode'),
            'fakultas_nama' => $this->request->getPost('fakultas_nama'),
            'data_limit'    => $data_limit, 
            'data_ujian'    => $data_ujian, 
            'data_fakultas'=>$data_fakultas,
        ];
        return view('form\v_tambah_limit', $data);
    }

    public function show_limit()
    {
        $fakultasModel = new FakultasModel();
        $limitModel = new LimitModel();
        $ujianModel = new UjianModel();
        $data_ujian = $ujianModel->findAll();
        $data_fakultas = $fakultasModel->findAll();
        $data_limit = $limitModel->getDataLimit();
        // dd($data_limit);

        return view('form\v_tambah_limit', ['data_limit' => $data_limit, 'data_ujian' => $data_ujian, 'data_fakultas'=>$data_fakultas]);
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


