<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model
{
    protected $table = 'dosen-1';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['nip', 'nama', 'jumlah_anak'];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function ambilData()
    {
        $query = $this->db->query("select * from dosen");
        return $query;
    }

    public function cariData($keyword)
    {
        $keyword = $this->db->escapeLikeString($keyword);
        $query = "select * from dosen where nip like '%$keyword%' or nama like '%$keyword%'";
        return $this->db->query($query);
    }
}
