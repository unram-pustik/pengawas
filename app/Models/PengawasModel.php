<?php

namespace App\Models;

use CodeIgniter\Model;

class PengawasModel extends Model
{
    protected $table            = 'pengawas';
    protected $primaryKey       = 'kode';
    protected $allowedFields = ['nama', 'nip', 'unit_kerja', 'ujian','pakta_integritas'];

}
