<?php

namespace App\Controllers;
use App\Models\UjianModel;
use App\Models\PengawasModel;

class Form extends BaseController
{
    public function index()
    {
        return view('v_login');
    }


    public function tambah_pengawas()
    {
        
        $pengawasModel = new PengawasModel();
        $data['pengawas'] = $_POST['pengawas'];

        foreach ($_POST['pengawas'] as $pngwas) {
            var_dump($pngwas);
            $pengawas_decode = json_decode($pngwas, true);
            
            $nama_pengawas = $pengawas_decode["text"];
            $kode_pengawas = $pengawas_decode["id"];
            $unit_pengawas = $pengawas_decode["unit"] ?? "";
            $fak_pengawas   = $pengawas_decode["kode_fak"] ?? "";
            
            // dd($pengawas_decode);

            $data_input = [
                'nama' => $nama_pengawas,
                'nip'   => $kode_pengawas,
                'unit_kerja' => $unit_pengawas,
                'kode_fak' => $fak_pengawas,
                'kode_ujian' => $_POST['kode_ujian'],
                
            ];
            $pengawasModel->insert($data_input);
            
        }
        // return view('v_pengawas', $data);
        
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
    public function form_ujian()
    {
        //
    }
    
    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        //
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


