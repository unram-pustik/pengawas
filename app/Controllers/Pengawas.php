<?php

namespace App\Controllers;

use App\Models\StaffModel;
use App\Models\PengawasModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Pager\PagerRenderer;

class Pengawas extends Controller
{


    protected $request;
    public function __construct()
    {
        $this->request = request();
    }

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

    
    public function get_api()
    {

        $key = $this->request->getGet('nama');
        $data = array();
        

        $curl_staf = curl_init();
        curl_setopt($curl_staf, CURLOPT_URL, 'https://sia.unram.ac.id/index.php/api/Staf?kode_nama=' . $key);
        curl_setopt($curl_staf, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_staf, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl_staf, CURLOPT_HTTPHEADER, array('authorization: Basic bXl1bnJhbTp3M3lSZkRuazloSmRKVg'));
        $staf = curl_exec($curl_staf);
        $data_staf = json_decode($staf);


        $curl_dosen = curl_init();
        curl_setopt($curl_dosen, CURLOPT_URL, 'https://sia.unram.ac.id/index.php/api/Dosen?kode_nama=' . $key);
        curl_setopt($curl_dosen, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_dosen, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl_dosen, CURLOPT_HTTPHEADER, array('authorization: Basic cHVzdGlrOnZhQ0FUZUlUeXJpSGFtRVlF'));
        $dosen = curl_exec($curl_dosen);
        $data_dosen = json_decode($dosen);

        $data = array_merge($data_staf, $data_dosen);
       
        return json_encode($data);
        
        // dd($data);

        // $data = array_merge($data_staf, $data_dosen);
        
        // return (empty($data)) ? : array() ; $data;
    }

    

   
}