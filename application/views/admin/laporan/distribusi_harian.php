<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print <?= $jenis ?></title>
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

        .judul {
            text-align: center;
            padding-bottom: 20px;
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
</head>

<body>

    <div style="text-align: center; border-bottom: solid 1px black; padding-bottom: 10px;">
        <h1>GGJ GROUP ZAKAH</h1>
        Alamat GGJ GROUP ZAKAH <br>
        Nomor Telepon (0331)442211 <br>
    </div>
    <div class="judul">
        <h2>Laporan Data <?= $jenis ?></h2>
    </div><br>

    <div style="
  width:100%;
  margin: auto;
  text-align:left;
  ">Tanggal : <?= date('Y-m-d H:i:s') ?>
    </div>

    <div class="container">
        <table width="100%">
            <tr>
                <th>No</th>
                <th>Tanggal Distribusi</th>
                <th>Total Distribusi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($distribusi as $s) { ?>

                <tr style="text-align:center;">
                    <td><?= $no++ ?></td>
                    <td style="text-align:center;"><?= $s->tanggal_distribusi ?></td>
                    <td style="text-align:right;">Rp. <?= number_format($s->Total_distribusi, 0, ",", ".") ?></td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>