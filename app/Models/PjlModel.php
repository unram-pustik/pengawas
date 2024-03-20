<?php

namespace App\Models;

use CodeIgniter\Model;

class PjlModel extends Model
{
    protected $table            = 'pjl';
    protected $primaryKey       = 'kode_pjl';
    protected $allowedFields = ['kode_ujian','nip'];


    public function getpjl($nip = false)
    {
        if ($nip == false) {
            return $this->table('pjl')
                        ->select('pjl.*, ujian.nama_ujian, pegawai.nama, pegawai.nip, pegawai.status, pegawai.gol, pegawai.unit_kerja, pegawai.npwp')
                        ->join('ujian', 'ujian.kode_ujian = pjl.kode_ujian')
                        ->join('pegawai', 'pegawai.nip = pjl.nip')
                        ->findAll();
        }
 
        return $this->table('pjl')
                    ->select('pjl.*, ujian.nama_ujian, pegawai.nama, pegawai.nip, pegawai.status, pegawai.gol, pegawai.unit_kerja, pegawai.npwp')
                    ->join('ujian', 'ujian.kode_ujian = pjl.kode_ujian')
                    ->join('pegawai', 'pegawai.nip = pjl.nip')
                    ->where('pjl.nip', $nip)
                    ->first();
    }

    
    public function getpjlByFakultas($kode_fakultas)
    {
        return $this->table('pjl')
                    ->select('pjl.*, ujian.nama_ujian, pegawai.nama, pegawai.nip, pegawai.status, pegawai.gol, pegawai.unit_kerja, pegawai.npwp, fakultas.kode')
                    ->join('ujian', 'ujian.kode_ujian = pjl.kode_ujian')
                    ->join('pegawai', 'pegawai.nip = pjl.nip')
                    ->join('fakultas', 'fakultas.kode = pegawai.kode_fakultas')
                    ->where('fakultas.kode', $kode_fakultas)
                    ->findAll();
    }

}
