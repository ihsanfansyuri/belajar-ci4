<?php

namespace App\Controllers;

class BelajarController extends BaseController
{
    public function index()
    {
        echo "Halo, Dunia. Selamat malam minggu";
    }

    public function index2($nama, $hari)
    {
        echo "halo $nama, selamat hari $hari";
    }

    private function kali($a, $b)
    {
        echo $a * $b;
    }

    public function indexKali()
    {
        $this->kali(5, 6);
    }
}
