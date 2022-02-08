<?php
$data = [
    'name' => 'username',
    'id' => 'username',
    'placholder' => 'Masukkan nama anda'
];

if ($validasi != "") {
    foreach ($validasi as $pesan);
    echo $pesan;
}

echo form_open(base_url() . '/BelajarLibrary/kirimForm');
echo "Username: " . form_input($data);
echo "<br>";
echo "Pendidikan Terakhir: ";
echo form_dropdown('pendidikan', $opsi);
echo "<br>";
echo form_submit("kirim", "Kirim Data");
echo form_close();
