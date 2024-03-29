<?php

namespace App\Models;

use CodeIgniter\Model;

class PengawasModel extends Model
{
    protected $table            = 'pengawas';
    protected $primaryKey       = 'kode_pengawas';
    // protected $allowedFields = ['nama', 'nip', 'unit_kerja', 'gol', 'status', 'npwp','kode_fakultas','kode_ujian','pakta_integritas'];
    protected $allowedFields = ['kode_ujian','nip'];


    public function getPengawas($nip = false, $kode_ujian = false)
    {
        if ($nip == false && $kode_ujian == false) {
            return $this->table('pengawas')
                        ->select('pengawas.*, ujian.nama_ujian, pegawai.nama, pegawai.nip, pegawai.status, pegawai.gol, pegawai.unit_kerja, pegawai.npwp')
                        ->join('ujian', 'ujian.kode_ujian = pengawas.kode_ujian')
                        ->join('pegawai', 'pegawai.nip = pengawas.nip')
                        ->findAll();
        }
 
        $builder = $this->table('pengawas')
                    ->select('pengawas.*, ujian.nama_ujian, pegawai.nama, pegawai.nip, pegawai.status, pegawai.gol, pegawai.unit_kerja, pegawai.npwp')
                    ->join('ujian', 'ujian.kode_ujian = pengawas.kode_ujian',)
                    ->join('pegawai', 'pegawai.nip = pengawas.nip');

        if ($nip) {
            $builder = $builder->where('pengawas.nip', $nip);
        }

        if ($kode_ujian) {
            $builder = $builder->where('pengawas.kode_ujian', $kode_ujian);
        }
        // dd($builder->findAll);
        return $builder->findAll();
    }

    
    public function getPengawasByFakultas($kode_fakultas)
    {
        return $this->table('pengawas')
                    ->select('pengawas.*, ujian.nama_ujian, pegawai.nama, pegawai.nip, pegawai.status, pegawai.gol, pegawai.unit_kerja, pegawai.npwp, fakultas.kode')
                    ->join('ujian', 'ujian.kode_ujian = pengawas.kode_ujian')
                    ->join('pegawai', 'pegawai.nip = pengawas.nip')
                    ->join('fakultas', 'fakultas.kode = pegawai.kode_fakultas')
                    ->where('fakultas.kode', $kode_fakultas)
                    ->findAll();
    }

}
