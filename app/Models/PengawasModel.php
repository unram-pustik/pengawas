<?php

namespace App\Models;

use CodeIgniter\Model;

class PengawasModel extends Model
{
    protected $table            = 'pengawas';
    protected $primaryKey       = 'kode';
    protected $allowedFields = ['nama', 'nip', 'unit_kerja', 'kode_fak','ujian','pakta_integritas'];

}
