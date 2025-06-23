<?php
// Langkah 1: Panggil autoloader dari Composer
require __DIR__ . '/vendor/autoload.php';

// Langkah 2: Gunakan namespace dari Dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

// --- FUNGSI BARU UNTUK MENGUBAH ANGKA MENJADI ROMAWI ---
function toRoman($number) {
    $map = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'];
    return $map[$number] ?? $number;
}

// Langkah 3: Cek apakah formulir telah di-submit (method adalah POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- LOGIKA BARU UNTUK NOMOR SURAT BERURUTAN ---
    $file_counter = 'nomor_surat.txt';

    // Baca nomor terakhir dari file, jika file tidak ada, mulai dari 0
    $nomor_sekarang = file_exists($file_counter) ? (int)file_get_contents($file_counter) : 0;

    // Tambah nomor dengan 1 untuk surat baru ini
    $nomor_baru = $nomor_sekarang + 1;

    // Simpan kembali nomor baru ke dalam file untuk digunakan selanjutnya
    file_put_contents($file_counter, $nomor_baru);
    // --- AKHIR LOGIKA NOMOR SURAT ---


    // Ambil data dari formulir
    $nama = htmlspecialchars($_POST['nama'] ?? 'Data Kosong');
    $npm = htmlspecialchars($_POST['npm'] ?? 'Data Kosong');
    $prodi = htmlspecialchars($_POST['prodi'] ?? 'Data Kosong');
    $tahun_akademik = htmlspecialchars($_POST['tahun_akademik'] ?? 'Data Kosong');
    $tujuan_surat = htmlspecialchars($_POST['tujuan_surat'] ?? 'Data Kosong');
    $tempat_tujuan = htmlspecialchars($_POST['tempat_tujuan'] ?? 'Data Kosong');
    
    // Buat komponen tanggal dan nomor surat
    $tanggal_surat = date('d F Y'); // Format tanggal: 23 June 2025
    $bulan_romawi = toRoman(date('n')); // 'n' untuk bulan tanpa angka 0 di depan (1-12)
    $tahun = date('Y');

    // Gabungkan menjadi format nomor surat lengkap
    // sprintf('%03d', $nomor_baru) akan membuat format 3 digit dengan angka 0 di depan, cth: 001, 002, 015
    $nomor_surat_lengkap = sprintf('%03d/D/PP-UNIGA/%s/%s', $nomor_baru, $bulan_romawi, $tahun);

    // Siapkan data untuk dikirim ke template PDF
    $data_pdf = [
        'nama' => $nama,
        'npm' => $npm,
        'prodi' => $prodi,
        'tahun_akademik' => $tahun_akademik,
        'tujuan_surat' => $tujuan_surat,
        'tempat_tujuan' => $tempat_tujuan,
        'tanggal_surat' => $tanggal_surat,
        'nomor_surat' => $nomor_surat_lengkap
    ];


    // Langkah 4: Siapkan HTML untuk PDF
    ob_start();
    // Kita 'include' template terpisah agar lebih rapi, dan kirim data ke dalamnya
    include 'template_pdf.php';
    $html = ob_get_clean();

    // Langkah 5: Buat objek Dompdf
    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Langkah 6: Kirim PDF ke browser
    $dompdf->stream("Surat-Pengantar-" . $nama . ".pdf", ["Attachment" => false]);
    
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pengajuan Surat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; margin: 40px; background-color: #f4f4f9; color: #333; }
        .container { max-width: 700px; margin: auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #444; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type="text"], select { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { display: block; width: 100%; padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Pengajuan Surat Pengantar</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" id="npm" name="npm" required>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <select id="prodi" name="prodi" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="Magister Administrasi Publik">Magister Administrasi Publik</option>
                    <option value="Manajemen Pendidikan Islam">Manajemen Pendidikan Islam</option>
                    <option value="Manajemen">Manajemen</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun_akademik">Tahun Akademik</label>
                <input type="text" id="tahun_akademik" name="tahun_akademik" placeholder="Contoh: 2024/2025" required>
            </div>
            <div class="form-group">
                <label for="tujuan_surat">Tujuan Surat (Kepada Yth:)</label>
                <input type="text" id="tujuan_surat" name="tujuan_surat" placeholder="Contoh: Manajer HRD PT. ABC" required>
            </div>
            <div class="form-group">
                <label for="tempat_tujuan">Tempat Tujuan (di)</label>
                <input type="text" id="tempat_tujuan" name="tempat_tujuan" placeholder="Contoh: Jakarta" required>
            </div>
            <button type="submit">Generate Surat</button>
        </form>
    </div>
</body>
</html>