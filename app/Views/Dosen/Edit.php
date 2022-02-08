<?php
if ($pesanEdit != "") {
    echo "<script>window.alert('" . $pesanEdit . "')</script>";
} else {
    $nip = [
        'name'      => 'nip',
        'id'        => 'nip',
        'readonly'  => true,
        'value'     => $nipEdit
    ];

    $nama = [
        'name'      => 'nama',
        'id'        => 'nama',
        'value'     => $namaEdit
    ];

    $jumlah_anak = [
        'name'      => 'jumlah_anak',
        'id'        => 'jumlah_anak',
        'value'     => $jumlah_anakEdit
    ];

    if ($validasiEdit != "") {
        foreach ($validasiEdit as $pesan) {
            echo $pesan . "<br />";
        }
    }

    echo form_open(base_url() . '/Dosen/update');
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
            <td><?php echo form_submit('update', 'Update'); ?></td>
        </tr>
    </table>
<?php
    echo form_close();
}
