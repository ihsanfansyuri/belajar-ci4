<?php

namespace App\Models;

use CodeIgniter\Model;

class BelajarMvc extends Model
{
    public function hasilKali($a, $b)
    {
        return $a * $b;
    }
}
