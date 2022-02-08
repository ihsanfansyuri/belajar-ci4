<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDosen;

class Dosen extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("select * from dosen");

        echo "Luaran berupa object : <br>";
        foreach ($query->getResult() as $row) {
            echo $row->nip;
            echo $row->nama;
            echo $row->jumlah_anak;
            echo "<br>";
        }
        echo "<br>";

        echo "Luaran berupa array : <br>";
        foreach ($query->getResult('array') as $row) {
            echo $row['nip'];
            echo $row['nama'];
            echo $row['jumlah_anak'];
            echo "<br>";
        }
    }

    public function indexDb()
    {
        helper(['form', 'url']);

        $dosenModel = new ModelDosen();
        $query = $dosenModel->ambilData();

        $data['dosen'] = $query;

        return view('Dosen/DataAwal', $data);
    }

    public function indexCari()
    {
        helper(['form', 'url']);

        $dosenModel = new ModelDosen();
        $query = $dosenModel->ambilData();

        $data["dosen"] = $query;
        $dataCari["validasiCari"] = "";

        echo view("Dosen/CariAwal", $dataCari);
        echo view("Dosen/DataAwal", $data);
    }

    public function cariAwal()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $dataCari = [
            'keyword' => $this->request->getPost('keyword')
        ];

        $mdlDosen = new ModelDosen();
        $dataCari["validasiCari"] = "";

        if ($validation->run($dataCari, "formCariDosen")) {
            $query = $mdlDosen->cariData($dataCari['keyword']);
        } else {
            $query = $mdlDosen->ambilData();
            $dataCari["validasiCari"] = $validation->getErrors();
        }

        $data["dosen"] = $query;
        echo view("Dosen/CariAwal", $dataCari);
        echo view("Dosen/DataAwal", $data);
    }

    public function indexCrud()
    {
        helper(['form', 'url']);

        $dosen = new ModelDosen();

        $data["dosen"] = $dosen->findAll();
        $data["pesan"] = "";
        $dataCari["validasiCari"] = "";
        $dataSimpan["validasiSimpan"] = "";
        $dataSimpan["pesanSimpan"] = "";

        echo view("Dosen/Simpan", $dataSimpan);
        echo view("Dosen/Cari", $dataCari);
        echo view("Dosen/Data", $data);
    }

    public function cari()
    {
        helper(['form', 'url']);
        $dosen = new ModelDosen();

        $validation = \Config\Services::validation();

        $dataCari = [
            'keyword' => $this->request->getPost('keyword')
        ];

        if ($validation->run($dataCari, "formCariDosen")) {
            $data["dosen"] = $dosen->like('nip', $dataCari['keyword'])
                ->orLike('nama', $dataCari['keyword'])
                ->findAll();
            $dataCari["validasiCari"] = "";
        } else {
            $data["dosen"] = $dosen->findAll();
            $dataCari['validasiCari'] = $validation->getErrors();
        }

        $data["pesan"] = "";
        $dataSimpan["validasiSimpan"] = "";
        $dataSimpan["pesanSimpan"] = "";

        echo view("Dosen/Simpan", $dataSimpan);
        echo view("Dosen/Cari", $dataCari);
        echo view("Dosen/Data", $data);
    }

    public function simpan()
    {
        helper(['form', 'url']);

        $dosen = new ModelDosen();
        $validation = \Config\Services::validation();

        $dataSimpan = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jumlah_anak' => $this->request->getPost('jumlah_anak')
        ];

        $validasiSimpan = "";
        $pesanSimpan = "";

        if ($validation->run($dataSimpan, "formSimpanDosen")) {
            $dosen->insert($dataSimpan);
            $pesanSimpan = "Data berhasil disimpan";
        } else {
            $validasiSimpan = $validation->getErrors();
        }

        $data["dosen"] = $dosen->findAll();
        $data["pesan"] = "";
        $dataCari["validasiCari"] = "";
        $dataSimpan["validasiSimpan"] = $validasiSimpan;
        $dataSimpan["pesanSimpan"] = $pesanSimpan;

        echo view("Dosen/Simpan", $dataSimpan);
        echo view("Dosen/Cari", $dataCari);
        echo view("Dosen/Data", $data);
    }

    public function hapus($nip)
    {
        helper(['form', 'url']);

        $dosen = new ModelDosen();

        //menghitung jumlah record pada tabel dosen yang NIP-nya sama dengan isi $nip
        $jumlahRecord = $dosen->where('nip', $nip)->countAllResults();

        //jika jumlah recordnya 1, berarti data yang ingin dihapus ada di tabel
        if ($jumlahRecord == 1) {
            $hapus = $dosen->delete($nip);
            $pesan = "Data berhasil dihapus";
        } else
            $pesan = "Data yang ingin dihapus tidak ada dalam database";

        $data["dosen"] = $dosen->findAll();
        $data["pesan"] = $pesan;
        $dataCari["validasiCari"] = "";
        $dataSimpan["validasiSimpan"] = "";
        $dataSimpan["pesanSimpan"] = "";

        echo view("Dosen/Simpan", $dataSimpan);
        echo view("Dosen/Cari", $dataCari);
        echo view("Dosen/Data", $data);
    }

    public function edit($nip)
    {
        helper(['form', 'url']);

        $dosen = new ModelDosen();

        //menghitung jumlah record pada tabel dosen yang NIP-nya sama dengan isi $nip
        $jumlahRecord = $dosen->where('nip', $nip)->countAllResults();

        //jika jumlah recordnya 1, berarti data yang ingin diedit ada di tabel
        if ($jumlahRecord == 1) {
            $data = $dosen->find($nip);
            $dataEdit['nipEdit'] = $data['nip'];
            $dataEdit['namaEdit'] = $data['nama'];
            $dataEdit['jumlah_anakEdit'] = $data['jumlah_anak'];

            $dataEdit["pesanEdit"] = "";
            $dataEdit["validasiEdit"] = "";

            echo view("Dosen/Edit", $dataEdit);
        } else {
            $pesan = "Data yang akan diedit tidak ada dalam database";
            $dataSimpan["validasiSimpan"] = "";
            $dataSimpan["pesanSimpan"] = $pesan;

            echo view("Dosen/Simpan", $dataSimpan);
        }

        $data["dosen"] = $dosen->findAll();
        $data["pesan"] = "";
        $dataCari["validasiCari"] = "";

        echo view("Dosen/Cari", $dataCari);
        echo view("Dosen/Data", $data);
    }

    public function update()
    {
        helper(['form', 'url']);

        $dosen = new ModelDosen();
        $validation = \Config\Services::validation();

        $dataUpdate = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jumlah_anak' => $this->request->getPost('jumlah_anak')
        ];

        //menghitung jumlah record pada tabel dosen yang NIP-nya sama dengan isi $nip
        $jumlahRecord = $dosen->where('nip', $dataUpdate['nip'])->countAllResults();

        //jika jumlah recordnya 1, berarti data yang ingin diupdate ada di tabel
        if ($jumlahRecord == 1) {
            if ($validation->run($dataUpdate, "formSimpanDosen")) {
                $dosen->update($dataUpdate['nip'], $dataUpdate);

                $dataSimpan["validasiSimpan"] = "";
                $dataSimpan["pesanSimpan"] = "Data berhasil di-update";
                echo view("Dosen/Simpan", $dataSimpan);
            } else {
                $dataEdit["validasiEdit"] = $validation->getErrors();
                $dataEdit["pesanEdit"] = "";
                echo view("Dosen/Edit", $dataEdit);
            }
        } else {
            $dataEdit["validasiEdit"] = "";
            $dataEdit["pesanEdit"] = "Data yang akan di-update tidak ada dalam database";
            echo view("Dosen/Edit", $dataEdit);
        }

        $data["dosen"] = $dosen->findAll();
        $data["pesan"] = "";
        $dataCari["validasiCari"] = "";

        echo view("Dosen/Cari", $dataCari);
        echo view("Dosen/Data", $data);
    }
}
