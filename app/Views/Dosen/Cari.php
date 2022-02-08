<?php
    $keyword = [
        'name'      => 'keyword',
        'id'        => 'keyword',
        'value'     => set_value('keyword')
    ];

    if ($validasiCari != "") {
        foreach ($validasiCari as $pesan) {
            echo $pesan . "<br />";
        }
    }

    echo form_open(base_url() . '/public/Dosen/cari');
?>

    <table>
        <tr>
            <td>Kata kunci</td>
            <td>:</td>
            <td>
            <?php
                echo form_input($keyword);
                echo form_submit('Cari', 'cari');
            ?>
            </td>
        </tr>
    </table>
<?php
    echo form_close();
