<!DOCTYPE html>
<html lang="en"><head>
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
</head><body>

    <div style="text-align: center; border-bottom: solid 1px black; padding-bottom: 10px;">
        <?php $profil = $this->db->get_where('profil', ['id_profil' => 1])->row();?>
        <h1><?=$profil->nama_profil?></h1>
        Alamat : <?=$profil->alamat_profil?><br>
        Nomor Telepon : <?=$profil->no_telp_profil?> <br>
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
                <th>Tanggal</th>
                <th>Pembayaran</th>
                <th>Distribusi</th>
                <th>Saldo</th>
            </tr>

            <?php
            $no = 1;
            foreach ($pembayaran as $s) { 
                $bulanPembayaran = substr($s->tanggal_zakat, 0, 7);
                $total_zakat = $this->db->query("SELECT SUM(nominal_zakat) AS total FROM pembayaran_zakat WHERE tanggal_zakat LIKE '%$bulanPembayaran%'")->row()->total;
                $total_distribusi = $this->db->query("SELECT SUM(nominal_distribusi) AS total FROM distribusi_zakat WHERE tanggal_distribusi LIKE '%$bulanPembayaran%'")->row()->total;
                $saldo = $total_zakat - $total_distribusi;?>

                <tr style="text-align:center;">
                    <td><?= $no++ ?></td>
                    <td style="text-align:center;"><?= substr($s->tanggal_zakat, 0, 7) ?></td>
                    <td style="text-align:right;">Rp. <?= number_format($total_zakat, 0, ',', '.') ?></td>
                    <td style="text-align:right;">Rp. <?= number_format($total_distribusi, 0, ',', '.') ?></td>
                    <td style="text-align:right;">Rp. <?= number_format($saldo, 0, ',', '.') ?></td>
                </tr>

            <?php } ?>

        </table>
    </div>

</body></html>