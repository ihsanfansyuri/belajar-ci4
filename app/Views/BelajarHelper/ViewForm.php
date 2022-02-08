<?php
$data = [
    'nama' => 'username',
    'id' => 'username',
    'placholder' => 'Masukkan nama anda',
    'style' => 'width=50%'
];

$opsi = [
    'sd' => 'Sekolah Dasar',
    'smp' => 'Sekolah Menengah Pertama',
    'sma' => 'Sekolah Menengah Atas',
    's1' => 'Strata 1'
];

echo "Username: ";
echo form_input($data);
echo "<br>";
echo "Pendidikan: ";
echo form_dropdown('pendidikan', $opsi, 'sma');
