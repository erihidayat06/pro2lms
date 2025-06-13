<?php
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

    $hoverColor = $setting->menu_hover_color ?? '#e0e0e0';
    $bgGray100Color = darkenColor($hoverColor, 10); // gelapkan 5%
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


    html:not(.dark) .fi-body h1,
    html:not(.dark) .fi-body h2,
    html:not(.dark) .fi-body h3,
    html:not(.dark) .fi-body h4,
    html:not(.dark) .fi-body h5,
    html:not(.dark) .fi-body h6,
    html:not(.dark) .fi-body p,
    html:not(.dark) .fi-body span,
    html:not(.dark) .fi-body a,
    html:not(.dark) .fi-body li,
    html:not(.dark) .fi-body td,
    html:not(.dark) .fi-body th,
    html:not(.dark) .fi-body label,
    html:not(.dark) .fi-body div,
    html:not(.dark) .fi-body strong,
    html:not(.dark) .fi-body em,
    html:not(.dark) .fi-body input,
    html:not(.dark) .fi-body textarea,
    html:not(.dark) .fi-body select,
    html:not(.dark) .fi-body button,
    html:not(.dark) .fi-logo {
        font-size: <?php echo e($fontSize); ?> !important;
    }

    html:not(.dark) .fi-body *:not(.fi-btn):not(.fi-btn *):not(.fi-btn-label):not(.fi-btn-label *):not(.text-primary-600):not(svg *),
    html:not(.dark) .fi-body :not(.text-primary-600):not(.fi-btn):not(.fi-btn *):not(.fi-btn-label):not(.fi-btn-label *):not(svg *),
    html:not(.dark) .fi-logo {
        color: <?php echo e($setting->font_color ?? '#000000'); ?> !important;
    }






    #livewire-error {
        display: none !important;
    }


    html:not(.dark) .menu {
        background-color: <?php echo e($setting->menu_background_color ?? '#f1f1f1'); ?> !important;
    }

    html:not(.dark) .fi-sidebar-nav .fi-sidebar-item .fi-sidebar-item-button:not(.bg-gray-100) {
        background-color: <?php echo e($setting->submenu_background_color ?? '#f9f9f9'); ?> !important;
    }

    html:not(.dark) .fi-sidebar-nav .fi-sidebar-item .fi-sidebar-item-button:not(.bg-gray-100):hover {
        background-color: <?php echo e($setting->menu_hover_color ?? '#e0e0e0'); ?> !important;
    }

    html:not(.dark) .fi-sidebar-nav .fi-sidebar-group-items .fi-sidebar-item .fi-sidebar-item-button {
        background-color: <?php echo e($setting->menu_background_color); ?> !important;
    }

    html:not(.dark) .fi-sidebar-nav .fi-sidebar-nav-groups .fi-sidebar-group-button {
        background-color: <?php echo e($setting->submenu_background_color); ?> !important;
        border-radius: 10px;
    }

    html:not(.dark) .fi-sidebar-nav .fi-sidebar-item .fi-sidebar-item-button.bg-gray-100 {
        background-color: <?php echo e($bgGray100Color); ?> !important;
    }

    html:not(.dark) .fi-sidebar-nav .fi-sidebar-item-button:hover {
        background-color: <?php echo e($setting->menu_hover_color ?? '#e0e0e0'); ?> !important;
    }

    html:not(.dark) .text-primary-600 {
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
<?php /**PATH D:\MY PROJEK\HERD\CLIENT\pro2lms\resources\views/components/dynamic-admin-style.blade.php ENDPATH**/ ?>