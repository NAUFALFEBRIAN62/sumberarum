<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Warga &mdash; E-Lapor Sumberarum</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="bg-light">
    <div class="top-strip">
        <div class="brand">
            <img src="{{ asset('images/logo-kelurahan.jpg') }}" alt="Logo Sumberarum" class="brand-mark" style="object-fit: cover; background: none; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
            <div class="brand-text">E-Lapor Sumberarum<span>Kalurahan Sumberarum</span></div>
        </div>
    </div>
    <div class="wrap">
        <div class="form-card register-card">
            <h1>Registrasi akun warga</h1>
            <p class="sub">Lengkapi data sesuai dokumen kependudukan resmi</p>

            @if($errors->any())
                <div class="alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('warga.register') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">NIK <span class="req">*</span></label>
                        <input type="text" name="nik" class="form-control" maxlength="16" placeholder="16 digit NIK" value="{{ old('nik') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nomor KK <span class="req">*</span></label>
                        <input type="text" name="no_kk" class="form-control" maxlength="16" placeholder="16 digit No KK" value="{{ old('no_kk') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama lengkap <span class="req">*</span></label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama sesuai KTP" value="{{ old('nama') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat <span class="req">*</span></label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat lengkap" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">RT <span class="req">*</span></label>
                        <input type="text" name="rt" class="form-control" maxlength="5" placeholder="Contoh: 001" value="{{ old('rt') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">RW <span class="req">*</span></label>
                        <input type="text" name="rw" class="form-control" maxlength="5" placeholder="Contoh: 002" value="{{ old('rw') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email <span class="req">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="email@contoh.com" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">No. HP <span class="req">*</span></label>
                    <input type="text" name="no_hp" class="form-control" maxlength="15" placeholder="Contoh: 08123456789" value="{{ old('no_hp') }}" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Password <span class="req">*</span></label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konfirmasi password <span class="req">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>
                </div>
                <button type="submit" class="btn-primary">Daftar sekarang</button>
            </form>
            <div class="alt-link">Sudah punya akun? <a href="{{ route('warga.login') }}">Masuk di sini</a></div>
        </div>
    </div>
    <script>
        document.addEventListener("mousemove", function(e) {
            const x = (e.clientX / window.innerWidth - 0.5) * 30;
            const y = (e.clientY / window.innerHeight - 0.5) * 30;
            const bgs = document.querySelectorAll('body.auth-bg, .side-art, body.bg-light');
            bgs.forEach(bg => {
                bg.style.backgroundPosition = `calc(50% + ${x}px) calc(50% + ${y}px)`;
            });
        });
    </script>
</body>
</html>
