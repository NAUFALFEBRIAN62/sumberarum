@extends('layouts.app')

@section('page-title', 'Detail pengaduan')
@section('page-sub', $pengaduan->judul)
@section('logout-route', route('admin.logout'))
@section('user-initial', 'A')
@section('user-name', Auth::guard('admin')->user()->nama_admin)
@section('user-role', 'Admin kelurahan')

@section('sidebar')
<a href="{{ route('admin.dashboard') }}" class="side-link"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
<a href="{{ route('admin.verifikasi.index') }}" class="side-link"><i class="ti ti-user-check"></i> Verifikasi warga</a>
<a href="{{ route('admin.pengaduan.index') }}" class="side-link active"><i class="ti ti-clipboard-list"></i> Kelola pengaduan</a>
@endsection

@section('content')

{{-- ===================== PRINT STYLES ===================== --}}
<style>
@media print {
    body * { visibility: hidden !important; }
    #print-area, #print-area * { visibility: visible !important; }
    #print-area { position: absolute; top: 0; left: 0; width: 100%; padding: 32px; }
    .no-print { display: none !important; }
    .print-header { display: block !important; }
    .print-logo { display: flex !important; }
}
.print-header { display: none; }
.print-logo   { display: none; }

/* Modal overlay */
#foto-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.72);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(6px);
    animation: fadeIn .2s ease;
}
#foto-modal.open { display: flex; }
#foto-modal img {
    max-width: 90vw;
    max-height: 85vh;
    border-radius: 12px;
    box-shadow: 0 24px 80px rgba(0,0,0,.5);
    object-fit: contain;
    animation: zoomIn .25s cubic-bezier(0.165, 0.84, 0.44, 1);
}
#foto-modal .modal-close {
    position: absolute;
    top: 20px;
    right: 24px;
    background: rgba(255,255,255,.15);
    border: none;
    color: #fff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .2s;
}
#foto-modal .modal-close:hover { background: rgba(255,255,255,.28); }
@keyframes fadeIn  { from { opacity:0; } to { opacity:1; } }
@keyframes zoomIn  { from { transform:scale(.88); opacity:0; } to { transform:scale(1); opacity:1; } }

.btn-foto {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 16px;
    background: #E8F0FC;
    color: #1B4F8C;
    border: 1px solid #BFD7FF;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all .25s ease;
    text-decoration: none;
}
.btn-foto:hover {
    background: #1B4F8C;
    color: #fff;
    border-color: #1B4F8C;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(27,79,140,.25);
}
.btn-print {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 16px;
    background: #FFF4E6;
    color: #854F0B;
    border: 1px solid #FAC775;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all .25s ease;
    text-decoration: none;
}
.btn-print:hover {
    background: #854F0B;
    color: #fff;
    border-color: #854F0B;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(133,79,11,.25);
}
</style>

{{-- Tombol aksi atas --}}
<div class="no-print" style="display:flex; align-items:center; gap:10px; margin-bottom:16px; flex-wrap:wrap;">
    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-outline btn-sm">
        <i class="ti ti-arrow-left"></i> Kembali
    </a>
    <button onclick="window.print()" class="btn-print">
        <i class="ti ti-printer"></i> Cetak / Simpan PDF
    </button>
</div>

{{-- ===================== AREA PRINT ===================== --}}
<div id="print-area">

    {{-- Kop surat print --}}
    <div class="print-header" style="border-bottom:2px solid #0B2545; padding-bottom:14px; margin-bottom:22px;">
        <div class="print-logo" style="align-items:center; gap:14px; margin-bottom:10px;">
            <img src="{{ asset('images/logo-kelurahan.jpg') }}" style="width:62px; height:62px; border-radius:8px; object-fit:cover;">
            <div>
                <div style="font-size:16px; font-weight:700; color:#0B2545;">PEMERINTAH KALURAHAN SUMBERARUM</div>
                <div style="font-size:12px; color:#444;">Sistem Pengaduan Warga &mdash; E-Lapor Sumberarum</div>
                <div style="font-size:11px; color:#666;">Dicetak pada: {{ now()->format('d M Y, H:i') }} &nbsp;|&nbsp; Admin: {{ Auth::guard('admin')->user()->nama_admin }}</div>
            </div>
        </div>
        <div style="font-size:14px; font-weight:700; color:#0B2545; text-align:center; letter-spacing:.5px; text-transform:uppercase;">
            Laporan Pengaduan #{{ $pengaduan->id_pengaduan }}
        </div>
    </div>

    <div style="display:grid; grid-template-columns:1fr 320px; gap:18px; align-items:start;">

        {{-- Kolom kiri: detail laporan --}}
        <div class="card">
            <div class="card-head">
                <h2>Detail laporan</h2>
            </div>
            <div class="card-body">
                <div style="display:grid; grid-template-columns:130px 1fr; row-gap:13px; font-size:13.5px;">
                    <div style="color:var(--text-3);">Pelapor</div>
                    <div style="font-weight:600;">{{ $pengaduan->warga->nama ?? '-' }}</div>

                    <div style="color:var(--text-3);">NIK</div>
                    <div>{{ $pengaduan->warga->nik ?? '-' }}</div>

                    <div style="color:var(--text-3);">No. KK</div>
                    <div>{{ $pengaduan->warga->no_kk ?? '-' }}</div>

                    <div style="color:var(--text-3);">Alamat</div>
                    <div>{{ $pengaduan->warga->alamat ?? '-' }}</div>

                    <div style="color:var(--text-3);">Judul</div>
                    <div>{{ $pengaduan->judul }}</div>

                    <div style="color:var(--text-3);">Kategori</div>
                    <div><span class="badge badge-neutral">{{ ucfirst($pengaduan->kategori) }}</span></div>

                    <div style="color:var(--text-3);">Lokasi</div>
                    <div>{{ $pengaduan->lokasi }}</div>

                    <div style="color:var(--text-3);">Tanggal</div>
                    <div>{{ \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->format('d M Y') }}</div>

                    <div style="color:var(--text-3);">Status</div>
                    <div>
                        @php
                            $statusColor = match($pengaduan->status ?? '') {
                                'diverifikasi' => '#1E7B34',
                                'ditolak'      => '#B23A3A',
                                'selesai'      => '#1B4F8C',
                                default        => '#854F0B',
                            };
                            $statusBg = match($pengaduan->status ?? '') {
                                'diverifikasi' => '#E6F4EA',
                                'ditolak'      => '#FCEAEA',
                                'selesai'      => '#E8F0FC',
                                default        => '#FFF4E6',
                            };
                        @endphp
                        <span style="background:{{ $statusBg }}; color:{{ $statusColor }}; padding:3px 10px; border-radius:6px; font-size:12px; font-weight:600;">
                            {{ ucfirst($pengaduan->status ?? 'Menunggu') }}
                        </span>
                    </div>

                    <div style="color:var(--text-3); align-self:start; padding-top:2px;">Isi pengaduan</div>
                    <div style="line-height:1.6;">{{ $pengaduan->isi_pengaduan }}</div>

                    @if($pengaduan->foto_bukti)
                    <div style="color:var(--text-3); align-self:start; padding-top:6px;">Foto bukti</div>
                    <div>
                        {{-- Tombol lihat foto (tidak muncul saat print) --}}
                        <button class="btn-foto no-print" onclick="openFoto('{{ asset('storage/'.$pengaduan->foto_bukti) }}')">
                            <i class="ti ti-photo"></i> Lihat Foto
                        </button>
                        {{-- Foto muncul saat print --}}
                        <img src="{{ asset('storage/'.$pengaduan->foto_bukti) }}"
                             class="print-header"
                             style="max-width:260px; border-radius:9px; border:1px solid #ddd; margin-top:6px;">
                    </div>
                    @else
                    <div style="color:var(--text-3);">Foto bukti</div>
                    <div style="color:#aaa; font-style:italic;">Tidak ada foto</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Kolom kanan: validasi + catatan --}}
        <div style="display:flex; flex-direction:column; gap:14px;">

            {{-- Form validasi --}}
            <div class="card no-print">
                <div class="card-head"><h2>Validasi</h2></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.pengaduan.validasi', $pengaduan->id_pengaduan) }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Assign ke petugas</label>
                            <select name="id_petugas" class="form-select">
                                <option value="">Pilih petugas</option>
                                @foreach($petugas as $pt)
                                <option value="{{ $pt->id_petugas }}" {{ $pengaduan->id_petugas==$pt->id_petugas?'selected':'' }}>
                                    {{ $pt->nama_petugas }} &mdash; {{ $pt->jabatan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="">Pilih status</option>
                                <option value="diverifikasi" {{ ($pengaduan->status ?? '')==='diverifikasi'?'selected':'' }}>Diverifikasi</option>
                                <option value="ditolak"      {{ ($pengaduan->status ?? '')==='ditolak'     ?'selected':'' }}>Ditolak</option>
                                <option value="selesai"      {{ ($pengaduan->status ?? '')==='selesai'     ?'selected':'' }}>Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Catatan untuk pelapor <span style="color:#aaa; font-weight:400;">(opsional)</span></label>
                            <textarea name="catatan_admin" class="form-select" rows="4"
                                style="resize:vertical; padding:10px; font-size:13px; font-family:inherit; line-height:1.6;"
                                placeholder="Tuliskan catatan yang perlu diperhatikan pelapor, misalnya: dokumen yang kurang, lokasi yang lebih spesifik, dll.">{{ $pengaduan->catatan_admin ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%;">
                            <i class="ti ti-circle-check"></i> Simpan validasi
                        </button>
                    </form>
                </div>
            </div>

            {{-- Catatan admin (tercetak di PDF) --}}
            @if($pengaduan->catatan_admin)
            <div class="card" style="border-left:4px solid #2E7BE0;">
                <div class="card-head"><h2><i class="ti ti-notes" style="color:#2E7BE0;"></i> Catatan admin</h2></div>
                <div class="card-body" style="font-size:13.5px; line-height:1.7; color:#3a3a3a;">
                    {{ $pengaduan->catatan_admin }}
                </div>
            </div>
            @endif

            {{-- Kotak "Yang harus diperbaiki pelapor" (tercetak) --}}
            <div class="card" style="border-left:4px solid #FAC775;">
                <div class="card-head">
                    <h2><i class="ti ti-alert-triangle" style="color:#854F0B;"></i> Yang perlu diperbaiki pelapor</h2>
                </div>
                <div class="card-body" style="font-size:13px; color:#5B6478; line-height:1.7;">
                    <ul style="margin:0; padding-left:18px;">
                        @if(!$pengaduan->foto_bukti)
                        <li>Lampirkan <strong>foto bukti</strong> kondisi di lapangan</li>
                        @endif
                        @if(strlen($pengaduan->lokasi ?? '') < 10)
                        <li>Tulis <strong>lokasi lebih spesifik</strong> (nama jalan / RT-RW / patokan)</li>
                        @endif
                        @if(strlen($pengaduan->isi_pengaduan ?? '') < 30)
                        <li>Lengkapi <strong>deskripsi pengaduan</strong> agar mudah ditangani petugas</li>
                        @endif
                        @if(!$pengaduan->foto_bukti && strlen($pengaduan->lokasi ?? '') >= 10 && strlen($pengaduan->isi_pengaduan ?? '') >= 30)
                        <li style="color:#1E7B34; list-style:none; margin-left:-18px;">
                            <i class="ti ti-circle-check"></i> Semua informasi sudah lengkap
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>

</div>{{-- end #print-area --}}

{{-- ===================== FOTO MODAL ===================== --}}
<div id="foto-modal" onclick="closeFoto(event)">
    <button class="modal-close" onclick="closeFotoBtn()">
        <i class="ti ti-x"></i>
    </button>
    <img id="foto-modal-img" src="" alt="Foto bukti">
</div>

<script>
function openFoto(src) {
    document.getElementById('foto-modal-img').src = src;
    document.getElementById('foto-modal').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeFotoBtn() {
    document.getElementById('foto-modal').classList.remove('open');
    document.body.style.overflow = '';
}
function closeFoto(e) {
    if (e.target === document.getElementById('foto-modal')) closeFotoBtn();
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeFotoBtn();
});
</script>

@endsection
