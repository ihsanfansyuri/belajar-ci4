<?php

namespace App\Controllers;

use App\Models\ModelBelajar;

class BelajarModelController extends BaseController
{
    public function kalkulator()
    {
        $a = 5;
        $b = 9;
        $model  = new ModelBelajar();
        $hasilKali = $model->hasilKali($a, $b);

        echo "~ ~ ~ Kalkulator Sederhana ~ ~ ~";
        echo "<br ?>";
        echo "Bilangan pertama = $a";
        echo "<br ?>";
        echo "Bilangan kedua = $b";
        echo "<br ?>";
        echo "Hasil kali kedua bilangan = $hasilKali";
    }
}
