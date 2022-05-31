<d<main id="main">
<script>
        $(function() {
            $('#proses').click(function() {
                var penghasilan = $('#penghasilan').val();
                var fisik = $('#fisik').val();
                var hunian = $('#hunian').val();
                var jarak = $('#jarak').val();
                var nama_penerima = $('#nama_penerima').val();
                var alamat_penerima = $('#alamat_penerima').val();
                var alfa = new Array(81);
                var z = new Array(81);
                var nama_kategori = $('select[name=nama_kategori] option').filter(':selected').val();

                //untuk menampilkan hasil
                $('#score').val(nilaiHasil());
                $('#hasil').val(gradeHasil());
                $('#p1').val(penghasilan_p1());
                $('#p2').val(penghasilan_p2());
                $('#p3').val(penghasilan_p3());
                $('#f1').val(fisik_p1());
                $('#f2').val(fisik_p2());
                $('#f3').val(fisik_p3());
                $('#h1').val(hunian_p1());
                $('#h2').val(hunian_p2());
                $('#h3').val(hunian_p3());
                $('#j1').val(jarak_p1());
                $('#j2').val(jarak_p2());
                $('#j3').val(jarak_p3());
                $('#penghasilanOutput').val(penghasilan);
                $('#jarakOutput').val(jarak);
                $('#nama_penerimaOutput').val(nama_penerima);
                $('#alamat_penerimaOutput').val(alamat_penerima);
                $('#nama_kategori').val(nama_kategori);
                

                //untuk menampilkan tabel alfa dan z setiap aturan
                var z_result = "";
                for (i = 0; i < z.length; i++) {
                    z_result += "<tr><td>" + (i + 1) + "</td><td>alfa</td><td>" + alfa[i] + "</td><td>z</td><td>" + z[i] + "</td><tr/>";
                }
                $('#z-result').html(z_result);

                //untuk menampilkan keanggotaan
                $('#p1').val(penghasilan_p1());
                $('#p2').val(penghasilan_p2());
                $('#p3').val(penghasilan_p3());

                $('#f1').val(fisik_p1());
                $('#f2').val(fisik_p2());
                $('#f3').val(fisik_p3());

                $('#h1').val(hunian_p1());
                $('#h2').val(hunian_p2());
                $('#h3').val(hunian_p3());

                $('#j1').val(jarak_p1());
                $('#j2').val(jarak_p2());
                $('#j3').val(jarak_p3());

                //untuk tampilan saja
                // var cek = gradeTampilan();
                // $('#cek').html(cek);
                // var kohaku = gradeKohaku();
                // $('#kohaku').html(kohaku);
                // var sowasanke = gradeSowaSanke();
                // $('#sowa').html(sowasanke);
                // $('#sanke').html(sowasanke);
                // var shiro = gradeShiro();
                // $('#shiro').html(shiro);
                // var oganyamabuki = gradeOganYamabuki();
                // $('#ogan').html(oganyamabuki);
                // $('#yamabuki').html(oganyamabuki);

                /**
                 *  mencari nilai minimum dari tiga variable
                 *  @param p
                 *  @param f
                 *  @param h
                 *  @param j
                 *  @return nilai minimum
                 */
                function findMin(p, f, h, j) {
                    if (p <= f && p <= h && p <=j) {
                        return p;
                    } else if (f <= p && f <= h && f <=j) {
                        return f;
                    } else if (h <= p && h <= f && h <=j) {
                        return h;
                    } else {
                        return j;
                    }
                }

                //==================== Penghasilan ====================//

                /**
                 *  mencari nilai keanggotaan himpunan Penghasilan P1
                 *  @return nilai keanggotaan di himpunan Penghasilan P1
                 */
                function penghasilan_p1() {
                    if (penghasilan >= 0 && penghasilan <= 250) {
                        return 1;
                    } else if (penghasilan > 250 && penghasilan <600) {
                        return (600 - penghasilan) / (600 - 250);
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai keanggotaan himpunan Penghasilan P2
                 *  @return nilai keanggotaan di himpunan Penghasilan P2
                 */
                function penghasilan_p2() {
                    if (penghasilan >= 600 && penghasilan <= 700) {
                        return 1;
                    } else if (penghasilan > 250 && penghasilan < 600) {
                        return (penghasilan - 250) / (600 - 250);
                    } else if (penghasilan > 700 && penghasilan <1000) {
                        return (1000 - penghasilan) / (1000 - 700);
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai keanggotaan himpunan Penghasilan P3
                 *  @return nilai keanggotaan di himpunan Penghasilan P3
                 */
                function penghasilan_p3() {
                    if (penghasilan >= 1000) {
                        return 1;
                    } else if (penghasilan > 700 && penghasilan < 1000) {
                        return (penghasilan - 700) / (1000 - 700);
                    } else {
                        return 0;
                    }
                }


                //==================== Fisik ====================//

                /**
                 *  mencari nilai keanggotaan himpunan Fisik Prioritas 1
                 *  @return nilai keanggotaan di himpunan Fisik Prioritas 1
                 */
                function fisik_p1() {
                    if (fisik >= 70) {
                        return 1;
                    } else if (fisik > 50 && fisik < 70) {
                        return (fisik - 50) / (70 - 50);
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai keanggotaan himpunan TDS Sedang
                 *  @return nilai keanggotaan di himpunan TDS Sedang
                 */
                function fisik_p2() {
                    if (fisik >= 40 && fisik <= 50) {
                        return 1;
                    } else if (fisik > 20 && fisik < 40) {
                        return (fisik - 20) / (40 - 20);
                    } else if (fisik > 50 && fisik < 70) {
                        return (70 - fisik) / (70 - 50);
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai keanggotaan himpunan Fisik Prioritas 3
                 *  @return nilai keanggotaan di himpunan Fisik Prioritas 3
                 */
                function fisik_p3() {
                    if (fisik <= 20) {
                        return 1;
                    } else if (fisik > 20 && fisik < 40) {
                        return (40 - fisik) / (40 - 20);
                    } else {
                        return 0;
                    }
                }

                //==================== Hunian ====================//

                /**
                 *  mencari nilai keanggotaan himpunan Hunian Prioritas 1
                 *  @return nilai keanggotaan di himpunan Hunian Prioritas 1
                 */
                function hunian_p1() {
                    if (hunian >= 70) {
                        return 1;
                    } else if (hunian > 50 && hunian < 70) {
                        return (hunian - 50) / (70 - 50);
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai keanggotaan himpunan Hunian Prioritas 2
                 *  @return nilai keanggotaan di himpunan Hunian Prioritas 2
                 */
                function hunian_p2() {
                    if (hunian >= 40 && hunian <= 50) {
                        return 1;
                    } else if (hunian > 20 && hunian < 40) {
                        return (hunian - 20) / (40 - 20);
                    } else if (hunian > 50 && hunian < 70) {
                        return (70 - hunian) / (70 - 50);
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai keanggotaan himpunan Hunian Prioritas 3
                 *  @return nilai keanggotaan di himpunan Hunian Prioritas 3
                 */
                function hunian_p3() {
                    if (hunian <= 20) {
                        return 1;
                    } else if (hunian > 20 && hunian < 40) {
                        return (40 - hunian) / (40 - 20);
                    } else {
                        return 0;
                    }
                }

                //==================== Penghasilan ====================//

                /**
                 *  mencari nilai keanggotaan himpunan Jarak P1
                 *  @return nilai keanggotaan di himpunan Jarak P1
                 */
                function jarak_p1() {
                    if (jarak >= 0 && jarak <= 200) {
                        return 1;
                    } else if (jarak > 200 && jarak < 400) {
                        return (400 - jarak) / (400 - 200);
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai keanggotaan himpunan Jarak P2
                 *  @return nilai keanggotaan di himpunan Jarak P2
                 */
                function jarak_p2() {
                    if (jarak >= 400 && jarak <= 450) {
                        return 1;
                    } else if (jarak > 200 && jarak < 400) {
                        return (jarak - 200) / (400 - 200);
                    } else if (jarak > 450 && jarak <800) {
                        return (800 - jarak) / (800 - 450);
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai keanggotaan himpunan Jarak P3
                 *  @return nilai keanggotaan di himpunan Jarak P3
                 */
                function jarak_p3() {
                    if (jarak >= 800) {
                        return 1;
                    } else if (jarak > 450 && jarak < 800) {
                        return (jarak - 450) / (800 - 450);
                    } else {
                        return 0;
                    }
                }



                //==================== GRADE ====================//

                /**
                 *  mencari harga di himpunan grade optimal (A)
                 *  @param alfa
                 *  @return harga
                 */
                function Prioritas1(alfa) {
                    if (alfa > 0 && alfa < 1) {
                        return (alfa * (750 - 500) + 500);
                    } else if (alfa == 1) {
                        return 751;
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari harga di himpunan grade sedang (B)
                 *  @param alfa
                 *  @return harga
                 */
                function Prioritas2(alfa) {
                    if (alfa > 0 && alfa < 1) {
                        return (alfa * (750 - 250) + 250);
                    } else if (alfa == 1) {
                        return 500;
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari harga di himpunan grade buruk (C)
                 *  @param alfa
                 *  @return harga
                 */
                function Prioritas3(alfa) {
                    if (alfa > 0 && alfa < 1) {
                        return (alfa * (500 - 250) + 250);
                    } else if (alfa == 1) {
                        return 249;
                    } else {
                        return 0;
                    }
                }

                /**
                 *  mencari nilai z untuk semua aturan yang ada
                 */
                function aturan() {
                    alfa[0]= findMin(penghasilan_p1(), fisik_p1(), hunian_p1(), jarak_p1()); z[0]=Prioritas1(alfa[0]);
                    alfa[1]= findMin(penghasilan_p1(), fisik_p1(), hunian_p2(), jarak_p1()); z[1]=Prioritas1(alfa[1]);
                    alfa[2]= findMin(penghasilan_p1(), fisik_p1(), hunian_p3(), jarak_p1()); z[2]=Prioritas1(alfa[2]);
                    alfa[3]= findMin(penghasilan_p1(), fisik_p2(), hunian_p1(), jarak_p1()); z[3]=Prioritas1(alfa[3]);
                    alfa[4]= findMin(penghasilan_p1(), fisik_p2(), hunian_p2(), jarak_p1()); z[4]=Prioritas1(alfa[4]);
                    alfa[5]= findMin(penghasilan_p1(), fisik_p2(), hunian_p3(), jarak_p1()); z[5]=Prioritas1(alfa[5]);
                    alfa[6]= findMin(penghasilan_p1(), fisik_p3(), hunian_p1(), jarak_p1()); z[6]=Prioritas1(alfa[6]);
                    alfa[7]= findMin(penghasilan_p1(), fisik_p3(), hunian_p2(), jarak_p1()); z[7]=Prioritas1(alfa[7]);
                    alfa[8]= findMin(penghasilan_p1(), fisik_p3(), hunian_p3(), jarak_p1()); z[8]=Prioritas1(alfa[8]);
                    alfa[9]= findMin(penghasilan_p1(), fisik_p1(), hunian_p1(), jarak_p2()); z[9]=Prioritas1(alfa[9]);
                    alfa[10]= findMin(penghasilan_p1(), fisik_p1(), hunian_p2(), jarak_p2()); z[10]=Prioritas1(alfa[10]);
                    alfa[11]= findMin(penghasilan_p1(), fisik_p1(), hunian_p3(), jarak_p2()); z[11]=Prioritas1(alfa[11]);
                    alfa[12]= findMin(penghasilan_p1(), fisik_p2(), hunian_p1(), jarak_p2()); z[12]=Prioritas1(alfa[12]);
                    alfa[13]= findMin(penghasilan_p1(), fisik_p2(), hunian_p2(), jarak_p2()); z[13]=Prioritas1(alfa[13]);
                    alfa[14]= findMin(penghasilan_p1(), fisik_p2(), hunian_p3(), jarak_p2()); z[14]=Prioritas1(alfa[14]);
                    alfa[15]= findMin(penghasilan_p1(), fisik_p3(), hunian_p1(), jarak_p2()); z[15]=Prioritas2(alfa[15]);
                    alfa[16]= findMin(penghasilan_p1(), fisik_p3(), hunian_p2(), jarak_p2()); z[16]=Prioritas2(alfa[16]);
                    alfa[17]= findMin(penghasilan_p1(), fisik_p3(), hunian_p3(), jarak_p2()); z[17]=Prioritas2(alfa[17]);
                    alfa[18]= findMin(penghasilan_p1(), fisik_p1(), hunian_p1(), jarak_p3()); z[18]=Prioritas1(alfa[18]);
                    alfa[19]= findMin(penghasilan_p1(), fisik_p1(), hunian_p2(), jarak_p3()); z[19]=Prioritas1(alfa[19]);
                    alfa[20]= findMin(penghasilan_p1(), fisik_p1(), hunian_p3(), jarak_p3()); z[20]=Prioritas2(alfa[20]);
                    alfa[21]= findMin(penghasilan_p1(), fisik_p2(), hunian_p1(), jarak_p3()); z[21]=Prioritas2(alfa[21]);
                    alfa[22]= findMin(penghasilan_p1(), fisik_p2(), hunian_p2(), jarak_p3()); z[22]=Prioritas2(alfa[22]);
                    alfa[23]= findMin(penghasilan_p1(), fisik_p2(), hunian_p3(), jarak_p3()); z[23]=Prioritas2(alfa[23]);
                    alfa[24]= findMin(penghasilan_p1(), fisik_p3(), hunian_p1(), jarak_p3()); z[24]=Prioritas2(alfa[24]);
                    alfa[25]= findMin(penghasilan_p1(), fisik_p3(), hunian_p2(), jarak_p3()); z[25]=Prioritas2(alfa[25]);
                    alfa[26]= findMin(penghasilan_p1(), fisik_p3(), hunian_p3(), jarak_p3()); z[26]=Prioritas2(alfa[26]);
                    alfa[27]= findMin(penghasilan_p2(), fisik_p1(), hunian_p1(), jarak_p1()); z[27]=Prioritas1(alfa[27]);
                    alfa[28]= findMin(penghasilan_p2(), fisik_p1(), hunian_p2(), jarak_p1()); z[28]=Prioritas1(alfa[28]);
                    alfa[29]= findMin(penghasilan_p2(), fisik_p1(), hunian_p3(), jarak_p1()); z[29]=Prioritas1(alfa[29]);
                    alfa[30]= findMin(penghasilan_p2(), fisik_p2(), hunian_p1(), jarak_p1()); z[30]=Prioritas1(alfa[30]);
                    alfa[31]= findMin(penghasilan_p2(), fisik_p2(), hunian_p2(), jarak_p1()); z[31]=Prioritas1(alfa[31]);
                    alfa[32]= findMin(penghasilan_p2(), fisik_p2(), hunian_p3(), jarak_p1()); z[32]=Prioritas1(alfa[32]);
                    alfa[33]= findMin(penghasilan_p2(), fisik_p3(), hunian_p1(), jarak_p1()); z[33]=Prioritas1(alfa[33]);
                    alfa[34]= findMin(penghasilan_p2(), fisik_p3(), hunian_p2(), jarak_p1()); z[34]=Prioritas1(alfa[34]);
                    alfa[35]= findMin(penghasilan_p2(), fisik_p3(), hunian_p3(), jarak_p1()); z[35]=Prioritas2(alfa[35]);
                    alfa[36]= findMin(penghasilan_p2(), fisik_p1(), hunian_p1(), jarak_p2()); z[36]=Prioritas2(alfa[36]);
                    alfa[37]= findMin(penghasilan_p2(), fisik_p1(), hunian_p2(), jarak_p2()); z[37]=Prioritas2(alfa[37]);
                    alfa[38]= findMin(penghasilan_p2(), fisik_p1(), hunian_p3(), jarak_p2()); z[38]=Prioritas2(alfa[38]);
                    alfa[39]= findMin(penghasilan_p2(), fisik_p2(), hunian_p1(), jarak_p2()); z[39]=Prioritas2(alfa[39]);
                    alfa[40]= findMin(penghasilan_p2(), fisik_p2(), hunian_p2(), jarak_p2()); z[40]=Prioritas2(alfa[40]);
                    alfa[41]= findMin(penghasilan_p2(), fisik_p2(), hunian_p3(), jarak_p2()); z[41]=Prioritas2(alfa[41]);
                    alfa[42]= findMin(penghasilan_p2(), fisik_p3(), hunian_p1(), jarak_p2()); z[42]=Prioritas2(alfa[42]);
                    alfa[43]= findMin(penghasilan_p2(), fisik_p3(), hunian_p2(), jarak_p2()); z[43]=Prioritas2(alfa[43]);
                    alfa[44]= findMin(penghasilan_p2(), fisik_p3(), hunian_p3(), jarak_p2()); z[44]=Prioritas2(alfa[44]);
                    alfa[45]= findMin(penghasilan_p2(), fisik_p1(), hunian_p1(), jarak_p3()); z[45]=Prioritas2(alfa[45]);
                    alfa[46]= findMin(penghasilan_p2(), fisik_p1(), hunian_p2(), jarak_p3()); z[46]=Prioritas2(alfa[46]);
                    alfa[47]= findMin(penghasilan_p2(), fisik_p1(), hunian_p3(), jarak_p3()); z[47]=Prioritas2(alfa[47]);
                    alfa[48]= findMin(penghasilan_p2(), fisik_p2(), hunian_p1(), jarak_p3()); z[48]=Prioritas2(alfa[48]);
                    alfa[49]= findMin(penghasilan_p2(), fisik_p2(), hunian_p2(), jarak_p3()); z[49]=Prioritas2(alfa[49]);
                    alfa[50]= findMin(penghasilan_p2(), fisik_p2(), hunian_p3(), jarak_p3()); z[50]=Prioritas2(alfa[50]);
                    alfa[51]= findMin(penghasilan_p2(), fisik_p3(), hunian_p1(), jarak_p3()); z[51]=Prioritas2(alfa[51]);
                    alfa[52]= findMin(penghasilan_p2(), fisik_p3(), hunian_p2(), jarak_p3()); z[52]=Prioritas2(alfa[52]);
                    alfa[53]= findMin(penghasilan_p2(), fisik_p3(), hunian_p3(), jarak_p3()); z[53]=Prioritas2(alfa[53]);
                    alfa[54]= findMin(penghasilan_p3(), fisik_p1(), hunian_p1(), jarak_p1()); z[54]=Prioritas1(alfa[54]);
                    alfa[55]= findMin(penghasilan_p3(), fisik_p1(), hunian_p2(), jarak_p1()); z[55]=Prioritas1(alfa[55]);
                    alfa[56]= findMin(penghasilan_p3(), fisik_p1(), hunian_p3(), jarak_p1()); z[56]=Prioritas2(alfa[56]);
                    alfa[57]= findMin(penghasilan_p3(), fisik_p2(), hunian_p1(), jarak_p1()); z[57]=Prioritas2(alfa[57]);
                    alfa[58]= findMin(penghasilan_p3(), fisik_p2(), hunian_p2(), jarak_p1()); z[58]=Prioritas2(alfa[58]);
                    alfa[59]= findMin(penghasilan_p3(), fisik_p2(), hunian_p3(), jarak_p1()); z[59]=Prioritas2(alfa[59]);
                    alfa[60]= findMin(penghasilan_p3(), fisik_p3(), hunian_p1(), jarak_p1()); z[60]=Prioritas2(alfa[60]);
                    alfa[61]= findMin(penghasilan_p3(), fisik_p3(), hunian_p2(), jarak_p1()); z[61]=Prioritas2(alfa[61]);
                    alfa[62]= findMin(penghasilan_p3(), fisik_p3(), hunian_p3(), jarak_p1()); z[62]=Prioritas2(alfa[62]);
                    alfa[63]= findMin(penghasilan_p3(), fisik_p1(), hunian_p1(), jarak_p2()); z[63]=Prioritas3(alfa[63]);
                    alfa[64]= findMin(penghasilan_p3(), fisik_p1(), hunian_p2(), jarak_p2()); z[64]=Prioritas3(alfa[64]);
                    alfa[65]= findMin(penghasilan_p3(), fisik_p1(), hunian_p3(), jarak_p2()); z[65]=Prioritas3(alfa[65]);
                    alfa[66]= findMin(penghasilan_p3(), fisik_p2(), hunian_p1(), jarak_p2()); z[66]=Prioritas3(alfa[66]);
                    alfa[67]= findMin(penghasilan_p3(), fisik_p2(), hunian_p2(), jarak_p2()); z[67]=Prioritas3(alfa[67]);
                    alfa[68]= findMin(penghasilan_p3(), fisik_p2(), hunian_p3(), jarak_p2()); z[68]=Prioritas3(alfa[68]);
                    alfa[69]= findMin(penghasilan_p3(), fisik_p3(), hunian_p1(), jarak_p2()); z[69]=Prioritas3(alfa[69]);
                    alfa[70]= findMin(penghasilan_p3(), fisik_p3(), hunian_p2(), jarak_p2()); z[70]=Prioritas3(alfa[70]);
                    alfa[71]= findMin(penghasilan_p3(), fisik_p3(), hunian_p3(), jarak_p2()); z[71]=Prioritas3(alfa[71]);
                    alfa[72]= findMin(penghasilan_p3(), fisik_p1(), hunian_p1(), jarak_p3()); z[72]=Prioritas3(alfa[72]);
                    alfa[73]= findMin(penghasilan_p3(), fisik_p1(), hunian_p2(), jarak_p3()); z[73]=Prioritas3(alfa[73]);
                    alfa[74]= findMin(penghasilan_p3(), fisik_p1(), hunian_p3(), jarak_p3()); z[74]=Prioritas3(alfa[74]);
                    alfa[75]= findMin(penghasilan_p3(), fisik_p2(), hunian_p1(), jarak_p3()); z[75]=Prioritas3(alfa[75]);
                    alfa[76]= findMin(penghasilan_p3(), fisik_p2(), hunian_p2(), jarak_p3()); z[76]=Prioritas3(alfa[76]);
                    alfa[77]= findMin(penghasilan_p3(), fisik_p2(), hunian_p3(), jarak_p3()); z[77]=Prioritas3(alfa[77]);
                    alfa[78]= findMin(penghasilan_p3(), fisik_p3(), hunian_p1(), jarak_p3()); z[78]=Prioritas3(alfa[78]);
                    alfa[79]= findMin(penghasilan_p3(), fisik_p3(), hunian_p2(), jarak_p3()); z[79]=Prioritas3(alfa[79]);
                    alfa[80]= findMin(penghasilan_p3(), fisik_p3(), hunian_p3(), jarak_p3()); z[80]=Prioritas3(alfa[80]);
                }

                /**
                 *  mencari nilai total z(defuzzyfikasi)
                 *  @return nilai total z
                 */
                function defuzzyfikasi() {
                    var temp1 = 0;
                    var temp2 = 0;
                    var hasil = 0;

                    for (i = 0; i < 81; i++) {
                        temp1 = temp1 + alfa[i] * z[i];
                        temp2 = temp2 + alfa[i];
                    }

                    hasil = temp1 / temp2;
                    return Math.round(hasil);
                }

                /**
                 *  menghitung semua aturan dan menentukan harga
                 *  @return harga
                 */
                function nilaiHasil() {
                    aturan();
                    return defuzzyfikasi();
                }

                function gradeHasil() {
                    if (nilaiHasil() >= 750) {
                        return "Prioritas 1"
                    } else if (nilaiHasil() >= 250 && nilaiHasil() <= 750) {
                        return "Prioritas 2"
                    } else {
                        return "Prioritas 3"
                    }
                }

                function gradeTampilan() {
                    if (nilaiHasil() >=750) {
                        return "Prioritas 1"
                    } else if (nilaiHasil() >= 250 && nilaiHasil() <= 750) {
                        return "Prioritas 2"
                    } else {
                        return "Prioritas 3"
                    }
                }

            });
        });
    </script>

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container mt-5">

            <div class="d-flex justify-content-between align-items-center">
            <!-- <h2>Pembayaran Zakat</h2> -->
            <ol>
                <li><a href="<?= base_url() ?>user/landingpage">Beranda</a></li>
                <li><span>Pendaftaran Calon Penerima</span></li>
            </ol>
            </div>

        </div>        
        </section><!-- End Breadcrumbs -->
        <div class="col-lg-12 col-12 px-0 card shadow mb-5">

        <div class="container-fluid px-4">
                <h1 class="mt-4">Penentuan Prioritas penerima Bantuan</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Menggunakan Fuzzy Logic Tsukamoto</li>
                </ol>
                <div class="row">
                    <fieldset>
                        <!-- Data Umum -->
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="nama_kategori" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">--Pilih Kategori--</option>
                                <?php foreach ($kategori as $key) { ?>
                                    <option value="<?php echo $key->id_kategori; ?>">
                                        <?php echo $key->nama_kategori; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_penerima">Nama Penerima:</label>
                            <input type="text" pattern="[a-zA-Z0-9 ]{2,100}" title="Masukkan minimal 2, maksimum 100, hanya alphabet, spasi, dash dan underscore" required class="form-control" name="nama_penerima" id="nama_penerima" aria-describedby="nama_penerima" placeholder="" value="<?= set_value('nama_penerima') ?>">
                            <small id="nama_penerima" class="form-text text-muted">Masukkan nama penerima dengan benar (tidak diperbolehkan karakter spesial)</small>
                            <?php echo form_error('nama_penerima'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_penerima">Alamat Penerima:</label>
                            <textarea class="form-control" name="alamat_penerima" id="alamat_penerima" rows="3" maxlength="255" placeholder="Masukkan Alamat Penerima..." required><?= set_value('alamat_penerima') ?></textarea>
                            <small id="alamat_penerima" class="form-text text-muted"> Masukkan alamat penerima maksimum 255 karakter </small>
                            <?php echo form_error('alamat_penerima'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jarak">Jarak Rumah Anda ke Calon Penerima :</label>
                            <input type="number" id="jarak" name="jarak" title="Minimum 1, isi dengan angka" required class="form-control" name="jarak" id="jumlah_tanggungan" aria-describedby="jumlah_tanggungan" placeholder="" value="<?= set_value('jarak') ?>" min="1">
                            <small id="jarak" class="form-text text-muted">Dalam Satuan Meter</small>
                            <?php echo form_error('jumlah_tanggungan'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penghasilan">Penghasilan</label>
                            <input type="number" id="penghasilan" name="penghasilan" title="Minimum 1, isi dengan angka" required class="form-control" name="penghasilan" id="jumlah_tanggungan" aria-describedby="jumlah_tanggungan" placeholder="" value="<?= set_value('penghasilan') ?>" min="1">
                            <small id="penghasilan" class="form-text text-muted">Dalam Rupiah</small>
                            <?php echo form_error('jumlah_tanggungan'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penghasilan">Jumlah Anggota Keluarga</label>
                            <input type="number" title="Minimum 1, isi dengan angka" required class="form-control" name="jumlah_tanggungan" id="jumlah_tanggungan" aria-describedby="jumlah_tanggungan" placeholder="" value="<?= set_value('penghasilan') ?>" min="1">
                            <small id="penghasilan" class="form-text text-muted"></small>
                            <?php echo form_error('jumlah_tanggungan'); ?>
                        </div>

                        <hr>
                        Kondisi Fisik dan Psikologis                        
                        <hr>       
                        <?php $i=0; foreach($var_f as $rowf) :?>                 
                        <div class="form-group">
                        <div class="form-check form-switch">
                        <input class="form-check-input" value="<?= $rowf['poin_f']?>" id="poin_f<?= $rowf['id_f']?>" name="poin_f" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label for="poin_f<?= $rowf['id_f']?>" class="form-check-label" for="flexSwitchCheckDefault"><?= $rowf['pertanyaan_f']?></label>
                        </div>
                        <?php $i++; endforeach;?>

                        <hr>
                        Kondisi Hunian                       
                        <hr>       
                        <?php $i=0; foreach($var_h as $rowh) :?>                 
                        <div class="form-group">
                        <div class="form-check form-switch">
                        <input class="form-check-input" value="<?= $rowh['poin_h']?>" id="poin_h<?= $rowh['id_h']?>" name="poin_h" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label for="poin_h<?= $rowh['id_h']?>" class="form-check-label" for="flexSwitchCheckDefault"><?= $rowh['pertanyaan_h']?></label>
                        </div>
                        <?php $i++; endforeach;?>

                        <!-- End Data Umum -->

                        <!-- form1 untuk mengirim inputan 3 parameter yang di uji coba-->
                        
                            <input type="hidden" name="id_user" value="<?php echo $this->session->userdata("id_user") ?>">
                            <div class="row mt-4">
                                <div class="col-lg-3 mb-4 text-center">
                                    <div class="input-group text-right">
                                        <input id="fisik" name="fisik" type="number" placeholder="Fisik" class="form-control input-md" require>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Point</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4 text-center">
                                    <div class="input-group text-right">
                                        <input id="hunian" name="hunian" type="number" placeholder="Hunian" class="form-control input-md" require>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Point</span>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        <div class="text-center mb-4 mt-4">
                            <button type="submit" id="proses" class="btn btn-primary proses">PROSES</button>
                        </div>
                        
                        <!-- form2 untuk mengirim inputan berupa data keanggotaan fuzzy, skor, dan hasil-->
                        <form action="<?= base_url() . 'user/pendaftaran_penerima/tambah_penerima'; ?>" method="post">
                            <input type="hidden" name="id_user" value="<?php echo $this->session->userdata("id") ?>">
                            <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
                            <input type="hidden" name="penghasilan" id="penghasilanOutput">
                            <input type="hidden" name="fisik" id="fisik">
                            <input type="hidden" name="hunian" id="hunian">
                            <input type="hidden" name="jarak" id="jarakOutput">
                            <input type="hidden" name="nama_penerima" id="nama_penerimaOutput">
                            <input type="hidden" name="alamat_penerima" id="alamat_penerimaOutput">
                            <input type="hidden" name="nama_kategori" id="nama_kategori">
                            <div class="row text-center mt-5">
                                <div class="input-group text-right">
                                    <h3 style="display: inline">Prioritas : </h3>
                                    <input type="text" name="prioritas" id="hasil" class="hasil" style="font-size:180%; border:none; text-align:left;" />
                                </div>
                                <div class="input-group text-right">
                                    <h3 style="display: inline">Skor : </h3>
                                    <input type="text" name="skor" id="score" class="score" style="font-size:180%; border:none; text-align:left;" />
                                </div>
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Prioritas 1</th>
                                        <th scope="col">Prioritas 2</th>
                                        <th scope="col">Prioritas 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">Penghasilan</th>
                                        <td><input type="text" name="p1" id="p1" class="1" style="font-size:100%; border:none; text-align:center;" /></td>
                                        <td><input type="text" name="p2" id="p2" class="2" style="font-size:100%; border:none; text-align:center;" /></td>
                                        <td><input type="text" name="p3" id="p3" class="3" style="font-size:100%; border:none; text-align:center;" /></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Fisik</th>
                                        <td><input type="text" name="f1" id="f1" class="1" style="font-size:100%; border:none; text-align:center;" /></td>
                                        <td><input type="text" name="f2" id="f2" class="2" style="font-size:100%; border:none; text-align:center;" /></td>
                                        <td><input type="text" name="f3" id="f3" class="3" style="font-size:100%; border:none; text-align:center;" /></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Hunian</th>
                                        <td><input type="text" name="h1" id="h1" class="1" style="font-size:100%; border:none; text-align:center;" /></td>
                                        <td><input type="text" name="h2" id="h2" class="2" style="font-size:100%; border:none; text-align:center;" /></td>
                                        <td><input type="text" name="h3" id="h3" class="3" style="font-size:100%; border:none; text-align:center;" /></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Jarak</th>
                                        <td><input type="text" name="j1" id="j1" class="1" style="font-size:100%; border:none; text-align:center;" /></td>
                                        <td><input type="text" name="j2" id="j2" class="2" style="font-size:100%; border:none; text-align:center;" /></td>
                                        <td><input type="text" name="j3" id="j3" class="3" style="font-size:100%; border:none; text-align:center;" /></td>
                                    </tr>
                                    </tbody>
                                    </table>
                                <hr>                             
                                
                            </div>
                            
                                <button type="submit" id="simpan" class="btn btn-primary simpan">SIMPAN</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>

        <script>
            $(document).on("click", "input[name='poin_f']", function(){
                total_f=0;
                $("input[name='poin_f']:checked").each(function(){
                    total_f += parseInt($(this).val())
                })
                $("input[name='fisik']").val(total_f)
            })

            $(document).on("click", "input[name='poin_h']", function(){
                total_h=0;
                $("input[name='poin_h']:checked").each(function(){
                    total_h += parseInt($(this).val())
                })
                $("input[name='hunian']").val(total_h)
            })
        </script>

    </div><!-- End blog sidebar -->

    </div>

    </div>
</section><!-- End Blog Section -->

</main><!-- End #main -->