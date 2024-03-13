<?php

namespace App\Models;

use CodeIgniter\Model;

class UjianModel extends Model
{
    protected $table      = 'ujian';
    protected $primaryKey = 'kode_ujian';

    protected $returnType = 'array';

    protected $allowedFields = ['kode_ujian','nama_ujian', 'tahun_ujian', 'ket_ujian', 'tgl_mulai_ujian', 'tgl_akhir_ujian'];
}
