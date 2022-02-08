<?php
if ($pesan != "") {
    echo "<script>window.alert('" . $pesan . "')</script>";
}
?>

<table border="1" width="600px">
    <tr>
        <td width="15%">NIP</td>
        <td width="50%">Nama</td>
        <td width="15%" align="center">Jml Anak</td>
        <td width="10%"></td>
        <td width="10%"></td>
    </tr>
    <?php
    //gunakan ini jika query-nya memakai $db->query()
    //foreach ($dosen->getResult() as $row){
    //$row->nip;
    //$row->nama;
    //$row->jumlah_anak;
    //}

    //gunakan ini jika menggunakan Query Builder CI
    foreach ($dosen as $row) {
    ?>
        <tr>
            <td><?= $row['nip'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td align="center"><?= $row['jumlah_anak'] ?></td>
            <td align="center"><?= anchor(base_url() . "/Dosen/edit/" . $row['nip'], "edit") ?></td>
            <td align="center"><?= anchor(base_url() . "/Dosen/hapus/" . $row['nip'], "hapus") ?></td>

        </tr>
    <?php
    }
    ?>
</table>