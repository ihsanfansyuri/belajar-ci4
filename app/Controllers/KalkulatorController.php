<?php

namespace App\Controllers;

use App\Models\BelajarMvc;

class KalkulatorController extends BaseController
{
    private function kali($a, $b)
    {
        $model = new BelajarMvc();
        $hasil = $model->hasilKali($a, $b);
        return $hasil;
    }

    public function index($a, $b)
    {
        $data = [
            'a' => $a,
            'b' => $b,
            'hasil' => $this->kali($a, $b)
        ];

        return view("BelajarView/kalkulatorView", $data);
    }
}
