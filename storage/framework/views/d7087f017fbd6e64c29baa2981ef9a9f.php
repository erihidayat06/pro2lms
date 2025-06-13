<!DOCTYPE html>
<html data-theme="halloween" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="<?php echo e(csrf_token()); ?>" name="csrf-token">
    <title><?php echo e($title ?? config('APP_NAME')); ?> | <?php echo e(env('APP_NAME')); ?></title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- PWA  -->
    <meta content="#6777ef" name="theme-color" />
    <link href="<?php echo e(asset('logo.png')); ?>" rel="apple-touch-icon">
    <link href="<?php echo e(asset('/manifest.json')); ?>" rel="manifest">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <?php echo \Filament\Support\Facades\FilamentAsset::renderStyles() ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>


</head>

<body class="font-sans antialiased konten-mahasiswa">
    <?php echo $__env->make('components.dynamic-mahasiswa-style', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <main>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('notifications');

$__html = app('livewire')->mount($__name, $__params, 'lw-60381912-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('database-notifications');

$__html = app('livewire')->mount($__name, $__params, 'lw-60381912-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php echo e($slot); ?>

        </main>
    </div>


    <?php echo \Filament\Support\Facades\FilamentAsset::renderScripts() ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        Livewire.onError((error, component) => {
            console.error('Livewire error:', error);
            return false;
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
    <script>
        self.addEventListener("push", (event) => {
            console.log(event);
            let response = event.data && event.data.text();
            let title = JSON.parse(response).notification.title;
            let body = JSON.parse(response).notification.body;
            let icon = JSON.parse(response).notification.image;
            let image = JSON.parse(response).notification.image;

            event.waitUntil(
                self.registration.showNotification(title, {
                    body,
                    icon,
                    image,
                    data: {
                        url: JSON.parse(response).data.url
                    }
                })
            )
        });

        self.addEventListener('notificationclick', function(event) {
            event.notification.close();
            event.waitUntil(
                clients.openWindow(event.notification.data.url)
            );
        });
    </script>


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
</body>

</html>

</body>

</html>
<?php /**PATH D:\MY PROJEK\HERD\CLIENT\pro2lms\resources\views/layouts/app.blade.php ENDPATH**/ ?>