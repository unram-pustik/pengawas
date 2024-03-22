<?php

namespace App\Models;

use CodeIgniter\Model;

class FakultasModel extends Model
{
    protected $table      = 'fakultas';
    protected $primaryKey = 'kode';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode','fakultas_nama'];

}


