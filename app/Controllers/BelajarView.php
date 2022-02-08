<?php

namespace App\Controllers;

class BelajarView extends BaseController
{
    public function index()
    {
        return view('BelajarView/cobaView');
    }

    public function index2()
    {
        return view("BelajarView/cobaView2");
    }

    public function gabung()
    {
        echo view("BelajarView/cobaView");
        echo "<br />";
        echo view("BelajarView/cobaView2");
    }
}
