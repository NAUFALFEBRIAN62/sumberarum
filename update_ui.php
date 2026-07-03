<?php
$files = [
    'resources/views/auth/warga/register.blade.php',
    'resources/views/auth/warga/login.blade.php',
    'resources/views/auth/admin/login.blade.php',
    'resources/views/auth/petugas/login.blade.php'
];

$js = <<<JS
    <script>
        document.addEventListener("mousemove", function(e) {
            const x = (e.clientX / window.innerWidth - 0.5) * 30;
            const y = (e.clientY / window.innerHeight - 0.5) * 30;
            const bgs = document.querySelectorAll('body.auth-bg, .side-art, body.bg-light');
            bgs.forEach(bg => {
                bg.style.backgroundPosition = `calc(50% + \${x}px) calc(50% + \${y}px)`;
            });
        });
    </script>
</body>
JS;

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    // Replace warga logo icon with real image
    $content = str_replace(
        '<div class="brand-mark"><i class="ti ti-building-bank"></i></div>', 
        '<img src="{{ asset(\'images/logo-kelurahan.jpg\') }}" alt="Logo Sumberarum" class="brand-mark" style="object-fit: cover; background: none; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">', 
        $content
    );
    
    // Add brand logo to admin/petugas
    $admin_logo = <<<HTML
        <div class="brand" style="justify-content: center; margin-bottom: 24px; display: flex;">
            <img src="{{ asset('images/logo-kelurahan.jpg') }}" alt="Logo" class="brand-mark" style="object-fit: cover; background: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
            <div class="brand-text" style="color: var(--navy-900);">E-Lapor Sumberarum<span style="color: #5B6478;">Kalurahan Sumberarum</span></div>
        </div>
        <div class="icon-top">
HTML;
    if ((strpos($file, 'admin/login') !== false || strpos($file, 'petugas/login') !== false) && strpos($content, 'class="brand"') === false) {
        $content = str_replace('<div class="icon-top">', $admin_logo, $content);
    }
    
    // Add JS parallax
    if (strpos($content, 'mousemove') === false) {
        $content = str_replace('</body>', $js, $content);
    }
    
    file_put_contents($file, $content);
}
echo "UI Updated";
