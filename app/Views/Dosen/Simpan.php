<?php
if ($pesanSimpan != "") {
    echo "<script>window.alert('" . $pesanSimpan . "')</script>";
}


$nip = [
    'name'      => 'nip',
    'id'        => 'nip',
    'value'     => set_value('nip')
];

$nama = [
    'name'      => 'nama',
    'id'        => 'nama',
    'value'     => set_value('nama')
];

$jumlah_anak = [
    'name'      => 'jumlah_anak',
    'id'        => 'jumlah_anak',
    'value'     => set_value('jumlah_anak')
];

if ($validasiSimpan != "") {
    foreach ($validasiSimpan as $pesan) {
        echo $pesan . "<br />";
    }
}

echo form_open(base_url() . '/Dosen/simpan');
?>
<table>
    <tr>
        <td>NIP</td>
        <td>:</td>
        <td><?php echo form_input($nip); ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo form_input($nama); ?></td>
    </tr>
    <tr>
        <td>Jumlah Anak</td>
        <td>:</td>
        <td><?php echo form_input($jumlah_anak); ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo form_submit('simpan', 'Simpan'); ?></td>
    </tr>
</table>
<?php
echo form_close();
