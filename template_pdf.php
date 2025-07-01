<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pengantar</title>
    <style>
        body { font-family: serif; font-size: 12pt; }
        .container { padding: 0 50px; }
        /* ===== MODIFIKASI CSS KOP SURAT ===== */
        .kop-surat { text-align: center; line-height: 1.2; border-bottom: 3px solid black; padding-bottom: 10px; }
        .logo-container { margin-bottom: 10px; } /* Memberi sedikit jarak antara logo dan teks */
        .logo-container img { width: 90px; height: auto; } /* Ukuran logo */
        .kop-surat h3, .kop-surat h4, .kop-surat p { margin: 0; }
        .kop-surat p { font-size: 8pt; }
        /* ===== AKHIR MODIFIKASI CSS ===== */
        .content { margin-top: 30px; }
        .content p { text-align: justify; }
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
            <div class="logo-container">
                <img src="<?php echo $data_pdf['gambar_logo']; ?>" alt="Logo Universitas">
            </div>
            <h3>UNIVERSITAS GARUT</h3>
            <h4>PROGRAM PASCASARJANA</h4>
            <p>Program Doktor Administrasi Publik “TERAKREDITASI”  No. 5781/SK/BAN-PT/Ak.P/D/IX/2024 Tanggal 03 September 2024</p>
            <p>Prodi Administrasi Publik TERAKREDITASI "B" SK BAN-PT NO. 3893/SK/BAN-PT/Ak-PNB/M/IV/2024 Tanggal 24 April 2024</p>
            <p>Prodi Manajemen Pendidikan Islam TERAKREDITASI "Baik Sekali" SK LAMDIK No.1175/SK/LAMDIK/Ak/M/XII/2023 Tanggal 13 Desember 2023</p>
            <p>Prodi Manajemen TERAKREDITASI "Baik" SK BAN-PT No.5623/SK/BAN-PT/Ak/M/VIII/2022 Tanggal 23 Agustus 2022</p>
            <p>Alamat: Jl. Raya Samarang No. 52A Telp. (0262) 238 626-544217 Fax. (0262) 544217 Tarogong Garut - 44151</p>
        </div>
        <div class="content">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 60%; vertical-align: top;">
                        Nomor : <?php echo $data_pdf['nomor_surat']; ?> <br>
                        Lampiran : - <br>
                        Perihal : Permohonan Izin
                    </td>
                    <td style="width: 40%; text-align: left; vertical-align: top;">
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
                        <img src="<?php echo $data_pdf['gambar_barcode']; ?>" alt="barcode" width="80">
                    </div>
                    <div class="nama-pejabat">Dr. Gugun Geusan Akbar, M.Si.</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>