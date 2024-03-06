<?php namespace App\Models;
use CodeIgniter\Model;

class M_user extends Model
{
    protected $table = 'user';

    public function getUser($username, $password)
    {
        return $this->db->table($this->table)
                        ->where('username', $username)
                        ->where('password', $password)
                        ->get()->getRowArray();
    }
}


