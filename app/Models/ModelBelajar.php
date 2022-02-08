<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBelajar extends Model
{
    public function hasilKali($a, $b)
    {
        return $a * $b;
    }
}
