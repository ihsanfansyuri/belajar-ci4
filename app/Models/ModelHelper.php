<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHelper extends Model
{
    public function jenjang()
    {
        $opsi = [
            'sd' => 'Sekolah Dasar',
            'smp' => 'Sekolah Menengah Pertama',
            'sma' => 'Sekolah Menengah Atas',
            's1' => 'Strata 1'
        ];

        return $opsi;
    }
}
