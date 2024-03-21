<?php

namespace App\Controllers;
use App\Models\UjianModel;
use App\Models\PengawasModel;
use App\Models\PjlModel;
use App\Models\LimitModel;
use App\Models\FakultasModel;

class Form extends BaseController
{
    public function index()
    {
        return view('v_login');
    }


    public function tambah_pengawas()
    {
        $pengawasModel = new PengawasModel();
        $pjlModel = new PjlModel();
        $limitModel = new LimitModel();
        $data['pengawas'] = $_POST['pengawas'];
        $kode_ujian = $_POST['kode_ujian'];

        //cek limit
        $session = session();
        $role = $_SESSION['role'];
        $fakultas = $_SESSION['fakultas'];

        $data_limit = $limitModel->getDataLimit($kode_ujian, $fakultas);
        if(isset($data_limit[0]['limit'])){
            $limit = (int) $data_limit[0]['limit'];
        }else{
            return redirect()->back()->with('error', 'Limit belum diatur');
        }
       
        
        $data_pengawas = $pengawasModel->getPengawasByFakultas($fakultas);
        $count_pengawas = count($data_pengawas);
        
        if($count_pengawas >= $limit){
            return redirect()->back()->with('error', 'Limit pengawas sudah penuh');
        }

        foreach ($_POST['pengawas'] as $pngwas) {
             var_dump($pngwas);
            $pengawas_decode = json_decode($pngwas, true);
            
            $kode_pengawas = $pengawas_decode["id"];

            $data_input = [
                'nip'   => $kode_pengawas,
                'kode_ujian' => $kode_ujian,
            ];
            
            $cek_data = $pengawasModel->where('nip', $kode_pengawas)->first();
            if($cek_data){
                // jika sudah ada, maka skip insert data
                continue;
            }
            $pengawasModel->insert($data_input);


            foreach ($_POST['pjl'] as $pjl) {
                
               $pjl_decode = json_decode($pjl, true);
               
               $kode_pjl = $pjl_decode["id"];
   
               $data_input = [
                   'nip'   => $kode_pjl,
                   'kode_ujian' => $kode_ujian,
               ];
               
               $cek_data = $pjlModel->where('nip', $kode_pjl)->first();
               if($cek_data){
                   // jika sudah ada, maka skip insert data
                   continue;
               }
               $pjlModel->insert($data_input);
            }

            
            $data_pengawas = $pengawasModel->getPengawasByFakultas($fakultas);
            $count_pengawas = count($data_pengawas);
            
            if($count_pengawas >= $limit){
                return redirect()->back()->with('error', 'Limit pengawas sudah penuh, data dibatalkan');
            }

        }
        return redirect()->to('ujian/detail_ujian/'.$_POST['kode_ujian']);
        
    }

    public function tambah_pengawas_byadmin()
    {
        $pengawasModel = new PengawasModel();
        $pjlModel = new PjlModel();
        $limitModel = new LimitModel();
        $data['pengawas'] = $_POST['pengawas'];
        $kode_ujian = $_POST['kode_ujian'];

        //cek limit
        $session = session();
        $role = $_SESSION['role'];
        $fakultas = $_SESSION['fakultas'];

        foreach ($_POST['pengawas'] as $pngwas) {
             var_dump($pngwas);
            $pengawas_decode = json_decode($pngwas, true);
            
            $kode_pengawas = $pengawas_decode["id"];

            $data_input = [
                'nip'   => $kode_pengawas,
                'kode_ujian' => $kode_ujian,
            ];
            
            $cek_data = $pengawasModel->where('nip', $kode_pengawas)->first();
            if($cek_data){
                // jika sudah ada, maka skip insert data
                continue;
            }
            $pengawasModel->insert($data_input);


            foreach ($_POST['pjl'] as $pjl) {
                
               $pjl_decode = json_decode($pjl, true);
               
               $kode_pjl = $pjl_decode["id"];
   
               $data_input = [
                   'nip'   => $kode_pjl,
                   'kode_ujian' => $kode_ujian,
               ];
               
               $cek_data = $pjlModel->where('nip', $kode_pjl)->first();
               if($cek_data){
                   // jika sudah ada, maka skip insert data
                   continue;
               }
               $pjlModel->insert($data_input);
            }

        }
        return redirect()->to('ujian/detail_ujian/'.$_POST['kode_ujian']);
        
    }

    public function tambah_ujian()
    {
        $ujianModel = new UjianModel();
        $data = [
            'kode_ujian' => $this->request->getPost('kode_ujian'),
            'nama_ujian' => $this->request->getPost('nama_ujian'),
            'tahun_ujian' => $this->request->getPost('tahun_ujian'),
            'ket_ujian' => $this->request->getPost('ket_ujian'),
            'tgl_mulai_ujian'  => date('Y-m-d'),
            'tgl_akhir_ujian'  => date('Y-m-d'),
            // 'tgl_selesai' => $this->request->getPost('tgl_selesai'),
        ];
        // dd($data);
        $ujianModel->insert($data);
    
        return redirect()->to(base_url('/ujian'));
    }

    public function hapus_pengawas($kode_pengawas)
    {
        $pengawasModel = new PengawasModel();
        $hapus = $pengawasModel->where('kode_pengawas', $kode_pengawas)->delete();

        if($hapus)
        {
            return redirect()->back()->with('sukses', 'Data pengawas berhasil dihapus');
        }
    }
    public function tambah_limit()
    {
        $limitModel = new LimitModel();
        $fakultasModel = new FakultasModel();
        $ujianModel = new UjianModel();

        $data_f = $fakultasModel->findAll();
        $data_ujian = $ujianModel->findAll();
        // dd($data_ujian);
        
        $data = [
            'kode_ujian' =>$_POST['kode_ujian'],
            'kode_fak' => $_POST['kode_fak'],
            'limit' => $this->request->getPost('limit'),
            'fakultas' => $data_f,
            'data_ujian' => $data_ujian,
        ];
        
        $limitModel->insert($data);
        
        // return redirect()->back()->with('sukses', 'Limit waktu berhasil ditambahkan');
     return redirect()->to('ujian/limit/'.$_POST['kode_ujian']);
    }
    
    public function edit_limit($id = '')
    {
        $limitModel = new LimitModel();
        $data = [
            'limit' => $this->request->getPost('limit'),
        ];
        if($id != '') {
            $limitModel->update($id, $data);
            $new_limit = $limitModel->find($id);
            return redirect()->to('ujian/limit/'.$new_limit['kode_ujian'])->with('sukses', 'Limit berhasil diedit');
        } else {
            return redirect()->back()->with('error', 'Limit gagal diedit');
        }
    }

    
    public function hapus_limit($id)
    {
        $limitModel = new LimitModel();

        $hapus = $limitModel->where('id', $id)->delete();
        // dd($hapus);
        
        if($hapus)
        {
            return redirect()->back()->with('sukses', 'Limit berhasil dihapus');
        }

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