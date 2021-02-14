<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Pembayaran</title>
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
    Besuki, Sidomekar, Semboro, Kabupaten Jember, Jawa Timur 68157 <br>
    Nomor Telepon (0331)442211 <br>
</div>
<div class="judul">
    <h2>Nota Pembayaran</h2>
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
            <th>Tanggal Pembayaran</th>
            <th>Nama Anggota</th>
            <th>Nomor HP</th>
            <th>Metode Pembayaran</th>
            <th>Nomor Rekening</th>
            <th>Atas Nama</th>
            <th>Bulan</th>
            <th>Nominal Zakat</th>
        </tr>
        
        <?php 
        $no = 0;
        foreach ($pembayaran as $rowAgt) { ?>

            <tr style="text-align:center;">
                <td><?=$no+1?></td>
                <td style="text-align:left;"><?=$rowAgt->tanggal_zakat?></td>
                <td style="text-align:left;"><?=$rowAgt->nama_anggota?></td>
                <td style="text-align:left;"><?=$rowAgt->no_hp_anggota?></td>
                <td style="text-align:left;"><?=$rowAgt->nama_metode?></td>
                <td style="text-align:left;"><?=$rowAgt->nomer_metode?></td>
                <td style="text-align:left;"><?=$rowAgt->atas_nama?></td>
                <td style="text-align:left;"><?=$rowAgt->bulan_zakat?></td>
                <td style="text-align:left;">Rp. <?= number_format($rowAgt->nominal_zakat, 0, ',', '.') ?></td>
                
            </tr>

        <?php $no++; }?>
        
    </table>
</div>

</body></html>