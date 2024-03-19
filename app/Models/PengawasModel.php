<?php

namespace App\Models;

use CodeIgniter\Model;

class PengawasModel extends Model
{
    protected $table            = 'pengawas';
    protected $primaryKey       = 'kode_pengawas';
    // protected $allowedFields = ['nama', 'nip', 'unit_kerja', 'gol', 'status', 'npwp','kode_fak','kode_ujian','pakta_integritas'];
    protected $allowedFields = ['kode_ujian','nip'];


    public function getPengawas($nip = false)
    {
        if ($nip == false) {
            return $this->findAll();
        }
 
        return $this->join('ujian', 'ujian.kode_ujian = pengawas.kode_ujian')
                    ->join('pegawai', 'pegawai.nip = pengawas.nip')
                    ->where('pengawas.nip', $nip)
                    ->find();
    }
}
