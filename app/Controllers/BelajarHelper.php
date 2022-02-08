<?php

namespace App\Controllers;

use App\Models\ModelHelper;

class BelajarHelper extends BaseController
{
    public function index()
    {
        helper("form");
        echo view("BelajarHelper/ViewForm");
    }

    public function indexMvc()
    {
        $model = new ModelHelper();
        $data['opsi'] = $model->jenjang();

        helper("form");
        echo view("BelajarHelper/ViewFormMvc", $data);
    }
}
