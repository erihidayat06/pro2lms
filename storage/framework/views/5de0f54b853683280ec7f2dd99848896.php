<?php
    use App\Models\AppearanceSetting;
    use Illuminate\Support\Facades\Schema;
    $setting = null;

    if (Schema::hasTable('appearance_settings')) {
        $setting = AppearanceSetting::first();
    }
    if (!function_exists('darkenColor')) {
        function darkenColor($color, $percent = 10)
        {
            $color = ltrim($color, '#');
            if (strlen($color) == 3) {
                $color = $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];
            }
            $r = hexdec(substr($color, 0, 2));
            $g = hexdec(substr($color, 2, 2));
            $b = hexdec(substr($color, 4, 2));

            $r = max(0, min(255, round(($r * (100 - $percent)) / 100)));
            $g = max(0, min(255, round(($g * (100 - $percent)) / 100)));
            $b = max(0, min(255, round(($b * (100 - $percent)) / 100)));

            return sprintf('#%02x%02x%02x', $r, $g, $b);
        }
    }

    $hoverColor = $setting->menu_hover_color ?? '#e0e0e0';
    $bgGray100Color = darkenColor($hoverColor, 10);

    $fontSizeMap = [
        'extra-small' => '96%',
        'small' => '98%',
        'normal' => '100%',
        'medium' => '102%',
        'large' => '104%',
        'extra-large' => '106%',
    ];

    $fontSize = $fontSizeMap[$setting->font_size ?? 'normal'] ?? '100%';
?>


<style>
    html:not(.dark) body {
        font-family: <?php echo e($setting->font_family ?? 'Arial'); ?> !important;
        font-size: <?php echo e($fontSize); ?> !important;
        background-color: <?php echo e($setting->background_color ?? '#ffffff'); ?> !important;
    }

    html:not(.dark) .konten-mahasiswa {
        font-family: <?php echo e($setting->font_family ?? 'Arial'); ?> !important;
        font-size: <?php echo e($fontSize); ?> !important;
        background-color: <?php echo e($setting->background_color ?? '#ffffff'); ?> !important;
    }

    /* Warna teks khusus berdasarkan background */
    html:not(.dark) .bg-yellow-400,
    html:not(.dark) .bg-yellow-400 * {
        color: #000000 !important;
    }

    html:not(.dark) .bg-emerald-400,
    html:not(.dark) .bg-emerald-400 * {
        color: #ffffff !important;
    }

    /* Global font & color untuk konten-mahasiswa, KECUALI jika berada dalam .bg-yellow-400 atau .bg-emerald-400 */
    html:not(.dark) .konten-mahasiswa :where(h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        a,
        li,
        td,
        th,
        label,
        div,
        strong,
        em,
        .mr-auto,
        input,
        textarea,
        select,
        .fi-logo):not(.bg-yellow-400):not(.bg-emerald-400):not(.bg-yellow-400 *):not(.bg-emerald-400 *):not(.bg-emerald-500 *):not(.fi-link *):not(.w-max *):not(.leading-1.5 *) {

        color: <?php echo e($setting->font_color ?? '#000000'); ?> !important;
    }

    html:not(.dark) .konten-mahasiswa :where(h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        a,
        li,
        td,
        th,
        label,
        div,
        strong,
        em,
        .mr-auto,
        input,
        textarea,
        select,
        .fi-logo) {

        font-size: <?php echo e($fontSize); ?> !important;
    }


    html:not(.dark) .fixed .sidebar-mahasiswa a {
        background-color: <?php echo e($setting->menu_background_color); ?> !important;
    }

    html:not(.dark) .fi-sidebar-nav .fi-sidebar-nav-groups .fi-sidebar-group-button {
        background-color: <?php echo e($setting->submenu_background_color); ?> !important;
        border-radius: 10px;
    }


    #livewire-error {
        display: none !important;
    }



    html:not(.dark) .menu {
        background-color: <?php echo e($setting->menu_background_color ?? '#f1f1f1'); ?> !important;
    }

    html:not(.dark) .sidebar-mahasiswa .fi-sidebar-item .fi-sidebar-item-button:not(.bg-gray-100) {
        background-color: <?php echo e($setting->submenu_background_color ?? '#f9f9f9'); ?> !important;
    }

    html:not(.dark) .sidebar-mahasiswa .fi-sidebar-item .fi-sidebar-item-button:not(.bg-gray-100):hover {
        background-color: <?php echo e($setting->menu_hover_color ?? '#e0e0e0'); ?> !important;
    }

    [class*="bg-green-500/10"] {
        background-color: <?php echo e($bgGray100Color); ?> !important;
    }


    html:not(.dark) .sidebar-mahasiswa #user-management-btn:hover {
        background-color: <?php echo e($setting->menu_hover_color ?? '#e0e0e0'); ?> !important;
    }

    html:not(.dark) .sidebar-mahasiswa .items-center:hover {
        background-color: <?php echo e($setting->menu_hover_color ?? '#e0e0e0'); ?> !important;
    }

    html:not(.dark) .relative .relative .items-center:hover {
        background-color: <?php echo e($setting->menu_hover_color ?? '#e0e0e0'); ?> !important;
    }

    html:not(.dark) .relative button:hover {
        background-color: <?php echo e($setting->menu_hover_color ?? '#e0e0e0'); ?> !important;
    }

    html:not(.dark) .sidebar-mahasiswa .text-primary-600 {
        color: <?php echo e($setting->menu_active_color ?? '#c0c0c0'); ?> !important;
    }
</style>

<script>
    setInterval(() => {
        fetch('/csrf-token') // route kecil yang mengembalikan token terbaru
            .then(res => res.text())
            .then(token => {
                document.querySelector('meta[name="csrf-token"]').setAttribute('content', token);
                window.Livewire && window.Livewire.findComponents().forEach(c => {
                    c.__instance.canonical = token;
                });
            });
    }, 5 * 60 * 1000); // setiap 5 menit
</script>

<script>
    setInterval(() => {
        fetch('/keep-alive')
            .then(response => {
                if (response.ok) {
                    console.log(`[Keep-Alive] ${new Date().toLocaleTimeString()} - Session still active.`);
                } else {
                    console.warn(
                        `[Keep-Alive] ${new Date().toLocaleTimeString()} - Unexpected response status: ${response.status}`
                    );
                }
            })
            .catch(error => {
                console.error(`[Keep-Alive] ${new Date().toLocaleTimeString()} - Fetch error:`, error);
            });
    }, 5 * 60 * 1000); // setiap 5 menit
</script>
<?php /**PATH C:\website\pro2lms\resources\views/components/dynamic-mahasiswa-style.blade.php ENDPATH**/ ?>