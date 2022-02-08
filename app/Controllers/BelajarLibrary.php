<?php

namespace App\Controllers;

use App\Models\ModelLib;

class BelajarLibrary extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $model = new ModelLib();

        $data["opsi"] = $model->opsiPendidikan();
        $data["validasi"] = "";
        echo view('BelajarLib/ViewFormVal', $data);
    }

    public function kirimForm()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $model = new ModelLib();

        $dataInput = [
            'username' => $this->request->getPost('username'),
            'pendidikan' => $this->request->getPost('pendidikan')
        ];

        if (!$validation->run($dataInput, "formBelajarLib")) {
            $data["opsi"] = $model->opsiPendidikan();
            $data["validasi"] = $validation->getErrors();

            echo view('BelajarLib/ViewFormVal', $data);
        } else {
            echo "Halo, " . $dataInput['username'] . " pendidikan terakhir anda " . $dataInput['pendidikan'];
        }
    }
}
