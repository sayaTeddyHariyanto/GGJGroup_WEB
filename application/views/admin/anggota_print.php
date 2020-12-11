<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Mahasiswa</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
            font-family: 'Roboto', serif;
            font-weight: 100;
        }

        .judul{
            text-align: center;
            padding-bottom:20px;
        }

        .container {
            padding: 0px auto 5px;
        }

        table {
            width: 90%;
            margin: 10px auto;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 9px;
            border: solid 2px black;
            color: #000;
        }

        th {
            text-align: center;
        }

    </style>
</head><body>

<div style="text-align: center; border-bottom: solid 1px black; padding-bottom: 10px;">
    <h1>GGJ Group Zakah</h1>
    Alamat GGJ GROUP <br>
    Nomor Telepon (0331)442211 <br>
</div>
<div class="judul">
    <h2>Laporan Data Keanggotaan</h2>
</div><br>

<div style="
    width:100%;
    margin: auto;
    text-align:left;
    ">Tanggal : <?=date('Y-m-d H:i:s')?>
</div>

<div class="container">
    <table width="100%">
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Nomor HP</th>
            <th>Alamat</th>
            <th>Status</th>
        </tr>
        
        <?php 
        $no = 0;
        foreach ($anggota as $rowAgt) { ?>

            <tr style="text-align:center;">
                <td><?=$no+1?></td>
                <td style="text-align:left;"><?=$rowAgt->nama_anggota?></td>
                <td style="text-align:left;"><?=$rowAgt->no_hp_anggota?></td>
                <td style="text-align:left;"><?=$rowAgt->alamat_anggota?></td>
                <td><?=$rowAgt->status_anggota == '1' ? "AKTIF" : "NONAKTIF" ?></td>
            </tr>

        <?php $no++; }?>
        
    </table>
</div>

</body></html>