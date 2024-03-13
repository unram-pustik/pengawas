<?php

namespace App\Models;

use CodeIgniter\Model;

class PengawasModel extends Model
{
    protected $table            = 'pengawas';
    protected $primaryKey       = 'kode_pengawas';
    protected $allowedFields = ['nama', 'nip', 'unit_kerja', 'kode_fak','kode_ujian','pakta_integritas'];

}
