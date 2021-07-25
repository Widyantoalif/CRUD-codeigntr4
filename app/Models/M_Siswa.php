<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Siswa extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAllData()
    {
        return $this->db->table('siswa')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('siswa')->insert($data);
    }

    public function hapus($id)
    {
        return $this->db->table('siswa')->delete(['id' => $id]);
    }
}
