<table border="1" width="600px">
    <tr>
        <td width="20%">NIP</td>
        <td width="60%">Nama</td>
        <td width="20%" align="center">Jml Anak</td>
    </tr>
<?php
    //gunakan ini jika query-nya memakai $db->query()
    foreach ($dosen->getResult() as $row){
?>
    <tr>
        <td><?= $row->nip; ?></td>
        <td><?= $row->nama; ?></td>
        <td align="center"><?= $row->jumlah_anak; ?></td>
    </tr>
<?php
    }
?>
</table>