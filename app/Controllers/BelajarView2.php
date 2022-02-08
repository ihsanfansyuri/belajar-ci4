<?php

namespace App\Controllers;

class BelajarView2 extends BaseController
{
    public function index($nama, $hari)
    {
        $data = [
            'nama' => $nama,
            'hari' => $hari
        ];
        echo view("BelajarView/cobaLagi", $data);
    }

    public function indexKali($a, $b)
    {
        $data = [
            'a' => $a,
            'b' => $b
        ];
        echo view("BelajarView/cobaKali", $data);
    }
}
