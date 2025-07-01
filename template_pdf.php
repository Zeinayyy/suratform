<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pengantar</title>
    <style>
        body { font-family: serif; font-size: 12pt; }
        .container { padding: 0 50px; }
        .kop-surat { text-align: center; line-height: 1.2; border-bottom: 3px solid black; padding-bottom: 10px; }
        .kop-surat h3, .kop-surat h4 { margin: 0; }
        .kop-surat p { font-size: 10pt; margin: 0; }
        .content { margin-top: 30px; }
        .yth { margin-top: 30px; }
        .table-data { border-collapse: collapse; width: 100%; margin: 20px 0; }
        .table-data td { padding: 5px; vertical-align: top; }
        .signature-section { margin-top: 40px; }
        .signature-block { width: 300px; float: right; text-align: left; }
        .signature-block .jabatan, .signature-block .nama-pejabat { line-height: 1.5; }
        .signature-block .barcode-area { padding: 15px 0; }
        .signature-block .nama-pejabat { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="kop-surat">
            <h3>UNIVERSITAS GARUT</h3>
            <h4>PROGRAM PASCASARJANA</h4>
            <p>Prodi Administrasi Negara TERAKREDITASI "B" SK BAN-PT NO. 4401/SK/BAN-PT/Ak-PPJ/M/XI/2019 Tanggal 05 November 2019</p>
            <p>Prodi Manajemen Pendidikan Islam TERAKREDITASI "B" SK BAN-PT No.2039/SK/BAN-PT/Akred/M/VII/2018 Tanggal 31 Juli 2018</p>
            <p>Prodi Manajemen Ijin Operasional No.241/KPT/I/2019 Tanggal 25 Maret 2019</p>
            <p>Alamat: Jl. Raya Samarang No. 52A Telp. (0262) 238 626-544217 Fax. (0262) 544217 Tarogong Garut - 44151</p>
        </div>
        <div class="content">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 60%;">
                        Nomor : <?php echo $data_pdf['nomor_surat']; ?> <br>
                        Lampiran : - <br>
                        Perihal : Permohonan Izin
                    </td>
                    <td style="width: 40%; text-align: left;">
                        Garut, <?php echo $data_pdf['tanggal_surat']; ?>
                    </td>
                </tr>
            </table>
            <div class="yth">
                Kepada Yth:<br>
                <strong><?php echo $data_pdf['tujuan_surat']; ?></strong><br>
                di<br>
                <strong><?php echo $data_pdf['tempat_tujuan']; ?></strong>
            </div>
            <p>Assalamualaikum Wr. Wb.</p>
            <p>Salam sejahtera semoga kita semua dalam keadaan sehat wal'afiat.</p>
            <p>Sehubungan dengan penyusunan Usulan Penelitian Mahasiswa Program Studi <?php echo $data_pdf['prodi']; ?> Program Pascasarjana Universitas Garut tahun akademik (<?php echo $data_pdf['tahun_akademik']; ?>). Bersama ini dengan hormat, kami memohon perkenan Bapak/Ibu menerima mahasiswa kami untuk melakukan observasi melalui wawancara/pengumpulan data. Mahasiswa atasnama:</p>
            
            <table class="table-data">
                <tr>
                    <td style="width: 20%;">Nama</td>
                    <td style="width: 5%;">:</td>
                    <td><?php echo $data_pdf['nama']; ?></td>
                </tr>
                <tr>
                    <td>NPM</td>
                    <td>:</td>
                    <td><?php echo $data_pdf['npm']; ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td><?php echo $data_pdf['prodi']; ?></td>
                </tr>
                <tr>
                    <td>Judul Penelitian</td>
                    <td>:</td>
                    <td><?php echo $data_pdf['judul_penelitian']; ?></td>
                </tr>
            </table>
            
            <p>Demikian permohonan ini kami sampaikan, atas perhatian dan perkenannya kami ucapkan terima kasih.</p>
            <p>Wassalamualaikum Wr. Wb.</p>

            <div class="signature-section">
                <div class="signature-block">
                    <div class="jabatan">Direktur Pascasarjana Universitas Garut,</div>
                    <div class="barcode-area">
                        <img src="<?php echo $data_pdf['gambar_barcode']; ?>" alt="barcode" width="120">
                    </div>
                    <div class="nama-pejabat">Dr. Gugun Geusan Akbar, M.Si.</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>