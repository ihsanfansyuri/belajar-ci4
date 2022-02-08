<?php
$data = [
    'nama' => 'username',
    'id' => 'username',
    'placholder' => 'Masukkan nama anda',
    'style' => 'width=50%'
];

echo "Username: ";
echo form_input($data);
echo "<br>";
echo "Pendidikan: ";
echo form_dropdown('pendidikan', $opsi, 'sma');
echo "<br>";
