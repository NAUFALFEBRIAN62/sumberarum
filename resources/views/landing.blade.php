<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Lapor Sumberarum &mdash; Layanan Pengaduan Kalurahan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>
    <div class="nav">
        <div class="brand">
            <img src="{{ asset('images/logo-kelurahan.jpg') }}" alt="Logo Sumberarum" style="width: 38px; height: 38px; border-radius: 9px; object-fit: cover; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
            <div class="brand-text">E-Lapor Sumberarum<span>Kalurahan Sumberarum</span></div>
        </div>
        <div class="nav-links">
            <a href="{{ route('admin.login') }}" class="nav-btn">Admin</a>
            <a href="{{ route('petugas.login') }}" class="nav-btn">Petugas</a>
            <a href="{{ route('warga.login') }}" class="nav-btn solid">Masuk Warga</a>
        </div>
    </div>

    <div class="hero">
        <div class="eyebrow"><i class="ti ti-shield-check"></i> Layanan resmi Kalurahan Sumberarum</div>
        <h1>Sampaikan keluhan warga, kami tindaklanjuti dengan cepat</h1>
        <p>Laporkan jalan rusak, lampu mati, hingga keluhan administrasi langsung dari rumah. Transparan dan bisa dipantau statusnya kapan saja.</p>
        <div class="hero-actions">
            <a href="{{ route('warga.register') }}" class="btn-primary">Buat laporan <i class="ti ti-arrow-right"></i></a>
            <a href="{{ route('warga.login') }}" class="btn-secondary">Lacak status laporan</a>
        </div>
        <div class="stats">
            <div class="stat"><div class="num">1.284</div><div class="label">Warga terdaftar</div></div>
            <div class="stat"><div class="num">312</div><div class="label">Laporan selesai</div></div>
            <div class="stat"><div class="num">2 hari</div><div class="label">Rata-rata respon</div></div>
        </div>
    </div>

    <div class="section">
        <div class="section-head">
            <h2>Kategori pengaduan yang sering dilaporkan</h2>
            <p>Pilih kategori yang sesuai saat membuat laporan</p>
        </div>
        <div class="cat-grid">
            <div class="cat-card">
                <div class="img-wrap"><img src="{{ asset('images/cat_jalan.png') }}" alt="Infrastruktur Jalan" class="cat-img"></div>
                <div class="cat-body">
                    <h3>Infrastruktur Jalan</h3>
                    <p>Laporan mengenai jalan berlubang, aspal mengelupas, atau kerusakan akses jalan lainnya.</p>
                </div>
            </div>
            <div class="cat-card">
                <div class="img-wrap"><img src="{{ asset('images/cat_lampu.png') }}" alt="Fasilitas Penerangan" class="cat-img"></div>
                <div class="cat-body">
                    <h3>Fasilitas Penerangan</h3>
                    <p>Pengaduan lampu penerangan jalan umum (PJU) yang padam atau mengalami gangguan teknis.</p>
                </div>
            </div>
            <div class="cat-card">
                <div class="img-wrap"><img src="{{ asset('images/cat_sampah.png') }}" alt="Kebersihan Lingkungan" class="cat-img"></div>
                <div class="cat-body">
                    <h3>Kebersihan Lingkungan</h3>
                    <p>Informasi penumpukan sampah liar atau keterlambatan jadwal pengangkutan sampah warga.</p>
                </div>
            </div>
            <div class="cat-card">
                <div class="img-wrap"><img src="{{ asset('images/cat_air.png') }}" alt="Drainase & Saluran" class="cat-img"></div>
                <div class="cat-body">
                    <h3>Drainase & Saluran</h3>
                    <p>Laporan saluran air tersumbat, gorong-gorong rusak yang berpotensi menyebabkan genangan air.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="howto" id="cara-lapor">
        <div class="section-head">
            <h2>Cara melapor</h2>
            <p>Panduan lengkap mengirim pengaduan, dari registrasi sampai laporan selesai ditangani</p>
        </div>
        <div class="howto-list">
            <div class="howto-item">
                <div class="howto-num">1</div>
                <div class="howto-body">
                    <h3><i class="ti ti-user-plus"></i> Daftar akun warga</h3>
                    <p>Klik tombol "Masuk / Daftar" lalu pilih "Daftar di sini". Isi data sesuai KTP dan Kartu Keluarga: NIK, Nomor KK, nama, alamat, RT/RW, email, nomor HP, dan buat password.</p>
                    <span class="howto-note"><i class="ti ti-alert-triangle"></i> Gunakan data asli, NIK dan No KK akan dicek oleh admin</span>
                </div>
            </div>
            <div class="howto-item">
                <div class="howto-num">2</div>
                <div class="howto-body">
                    <h3><i class="ti ti-clock-hour-4"></i> Tunggu verifikasi admin</h3>
                    <p>Setelah daftar, admin kelurahan akan memeriksa kecocokan data kependudukan kamu. Proses ini biasanya selesai dalam 1&ndash;2 hari kerja.</p>
                    <span class="howto-note ok"><i class="ti ti-bell"></i> Kamu bisa cek status dengan mencoba login secara berkala</span>
                </div>
            </div>
            <div class="howto-item">
                <div class="howto-num">3</div>
                <div class="howto-body">
                    <h3><i class="ti ti-login-2"></i> Login ke dashboard warga</h3>
                    <p>Jika akun sudah terverifikasi, masuk menggunakan email dan password yang kamu daftarkan. Kamu akan diarahkan ke dashboard warga.</p>
                </div>
            </div>
            <div class="howto-item">
                <div class="howto-num">4</div>
                <div class="howto-body">
                    <h3><i class="ti ti-edit"></i> Isi formulir pengaduan</h3>
                    <p>Klik "Buat pengaduan", lalu lengkapi judul, kategori (jalan rusak, lampu mati, sampah, dll), lokasi kejadian, dan jelaskan keluhan secara detail. Lampirkan foto bukti jika ada.</p>
                </div>
            </div>
            <div class="howto-item">
                <div class="howto-num">5</div>
                <div class="howto-body">
                    <h3><i class="ti ti-clipboard-check"></i> Admin memvalidasi laporan</h3>
                    <p>Admin kelurahan meninjau laporanmu, lalu menugaskannya ke petugas lapangan yang sesuai untuk ditindaklanjuti.</p>
                </div>
            </div>
            <div class="howto-item">
                <div class="howto-num">6</div>
                <div class="howto-body">
                    <h3><i class="ti ti-tool"></i> Petugas menindaklanjuti</h3>
                    <p>Petugas yang ditugaskan akan menangani laporan di lapangan dan memberi tanggapan tertulis pada setiap perkembangan.</p>
                </div>
            </div>
            <div class="howto-item">
                <div class="howto-num">7</div>
                <div class="howto-body">
                    <h3><i class="ti ti-circle-check"></i> Pantau status & hasil</h3>
                    <p>Buka kembali dashboard warga kapan saja untuk melihat status terbaru: Menunggu, Diverifikasi, Diproses, Selesai, atau Ditolak &mdash; lengkap dengan tanggapan dari petugas.</p>
                </div>
            </div>
        </div>
        <div class="howto-cta">
            <p><strong>Siap membuat laporan?</strong>Daftar sekarang, prosesnya hanya butuh beberapa menit</p>
            <a href="{{ route('warga.register') }}" class="btn-primary">Daftar sekarang <i class="ti ti-arrow-right"></i></a>
        </div>
    </div>



    <div class="foot">&copy; 2026 Pemerintah Kalurahan Sumberarum &mdash; Layanan Pengaduan Digital</div>
</body>
</html>
