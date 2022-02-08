<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLib extends Model
{
    public function opsiPendidikan()
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
