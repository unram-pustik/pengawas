<?php

namespace App\Controllers;

use App\Models\UjianModel;
use App\Models\PengawasModel;
use App\Models\PegawaiModel;
use App\Models\PjlModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
        // $staffModel = new StaffModel();
        $ujianModel = new UjianModel();
        $data['ujian'] = $ujianModel->findAll();
        
        // Konfigurasi Paginasi
        $pager = \Config\Services::pager();
        $pager->setPath(''); // Menyembunyikan URL paginasi

        // $data['staf'] = $staffModel->where('unit_kode_fakultas', $data_fakultas)
        //                     ->orderBy('kode', 'DESC')->findAll();
        // $data['pager'] = $staffModel->pager;

        return view('form/v_tambah_pengawas');
    }

    
    public function get_Pegawai()
    {
        // Mendapatkan request dari nama 
        $nama = $this->request->getGet('nama');
        $fakultas = $this->request->getGet('fakultas');
       
        // Mengambil data pegawai berdasarkan nama
        $pegawaiModel = new PegawaiModel();
        $dataPegawai = $pegawaiModel->like('nama', '%'.$nama.'%')
                                     ->where('kode_fakultas', $fakultas)
                                     ->findAll();
        // dd($dataPegawai);
        // Mengembalikan data pegawai dalam format json
        return json_encode($dataPegawai);
    }

    public function get_Pegawai_admin()
    {
        // Mendapatkan request dari nama 
        $nama = $this->request->getGet('nama');
        $fakultas = $this->request->getGet('fakultas');
       
        // Mengambil data pegawai berdasarkan nama
        $pegawaiModel = new PegawaiModel();
            $dataPegawai = $pegawaiModel->like('nama', '%'.$nama.'%')
                                     ->findAll();
        
        // dd($dataPegawai);
        // Mengembalikan data pegawai dalam format json
        return json_encode($dataPegawai);
    }


    public function get_Pjl()
    {
        // Mendapatkan request dari nama 
        $nama = $this->request->getGet('nama');
        $fakultas = $this->request->getGet('fakultas');
     
        // Mengambil data pegawai berdasarkan nama
        $pjlModel = new PjlModel();
        $dataPjl = $pjlModel->like('nama', '%'.$nama.'%')
                                     ->where('kode_fakultas', $fakultas)
                                     ->findAll();
        dd($dataPjl);
        // Mengembalikan data pegawai dalam format json
        return json_encode($dataPjl);
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
        // return (empty($data)) ? : array() ; $data;
    }

    
    public function export_pengawas()
    {
        $pengawasModel = new PengawasModel();
        $data_pengawas = $pengawasModel->getPengawas();
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Ujian');
        $sheet->setCellValue('C1', 'Nip');
        $sheet->setCellValue('D1','Nama');
        $sheet->setCellValue('E1','Gol');
        $sheet->setCellValue('F1','Status');
        $sheet->setCellValue('G1','Unit Kerja');
        $sheet->setCellValue('H1', 'Npwp');

        $column = 2;
        foreach ($data_pengawas as $data => $value) {
            $sheet->setCellValue('A' . $column, ($column-1));
            $sheet->setCellValue('B' . $column, $value['nama_ujian']);
            $sheet->setCellValue('C' . $column, $value['nip']);
            $sheet->setCellValue('D' . $column, $value['nama']);
            $sheet->setCellValue('E' . $column, $value['gol']);
            $sheet->setCellValue('F' . $column, $value['status']);
            $sheet->setCellValue('G' . $column, $value['unit_kerja']);
            $sheet->setCellValue('H' . $column, $value['npwp']);
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d'). '-Data-Pengawas';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit();
    }

    public function export_pjl()
    {
        $pjlModel = new PjlModel();
        $data_pjl = $pjlModel->getpjl();
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Ujian');
        $sheet->setCellValue('C1', 'Nip');
        $sheet->setCellValue('D1','Nama');
        $sheet->setCellValue('E1','Gol');
        $sheet->setCellValue('F1','Status');
        $sheet->setCellValue('G1','Unit Kerja');
        $sheet->setCellValue('H1', 'Npwp');

        $column = 2;
        foreach ($data_pjl as $data => $value) {
            $sheet->setCellValue('A' . $column, ($column-1));
            $sheet->setCellValue('B' . $column, $value['nama_ujian']);
            $sheet->setCellValue('C' . $column, $value['nip']);
            $sheet->setCellValue('D' . $column, $value['nama']);
            $sheet->setCellValue('E' . $column, $value['gol']);
            $sheet->setCellValue('F' . $column, $value['status']);
            $sheet->setCellValue('G' . $column, $value['unit_kerja']);
            $sheet->setCellValue('H' . $column, $value['npwp']);
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d'). '-Data-PJL-WPJL';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit();
    }



    public function show_pengawas()
    {
        $ujianModel = new UjianModel();
        $pengawasModel = new PengawasModel();
        $renderer = service('renderer');
        $data_pengawas = $pengawasModel->findAll();
        $data = [
            'pengawas' => $data_pengawas,
        ];
        $name = 'v_list_pengawas';
        $options = [];
        // dd($data);

        return $renderer->setData($data, 'raw')->render($name, $options);
    }

    public function detail_ujian($kode_ujian)
    {
        $ujianModel = new UjianModel();
        $data_ujian = $ujianModel->where('kode_ujian', $kode_ujian)->first();
        // dd($data_ujian);
        
        $data_pengawas = $ujianModel->db->table('pengawas')->where('kode_ujian', $kode_ujian)->get()->getResult();
        
        // $data_ujian['pengawas'] = $data_pengawas;
        // dd($data_pengawas);
        return view('v_list_pengawas', ['data_ujian' => $data_ujian, 'data_pengawas'=>$data_pengawas]);
        
    }

    
    
    



 
}