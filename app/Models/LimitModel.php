<?php

namespace App\Models;

use CodeIgniter\Model;
class LimitModel extends Model
{

    protected $table = 'limit';
    protected $allowedFields = ['kode_ujian', 'kode_fak', 'limit'];

    
    public function getDataLimit($kode_ujian = null, $kode_fak = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('limit');
        $builder->select('ujian.kode_ujian,ujian.nama_ujian,fakultas.kode,fakultas.fakultas_nama,limit.limit');
        $builder->join('ujian', 'ujian.kode_ujian = limit.kode_ujian');
        $builder->join('fakultas', 'fakultas.kode = limit.kode_fak');
        if ($kode_ujian != null) {
            $builder->where('limit.kode_ujian', $kode_ujian);
        }
        if ($kode_fak != null) {
            $builder->where('limit.kode_fak', $kode_fak);
        }
        $query = $builder->get();
        return $query->getResultArray();
    }

  
}




