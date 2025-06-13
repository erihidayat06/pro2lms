<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="<?php echo e(csrf_token()); ?>" name="csrf-token">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans text-gray-900 antialiased">

    <?php echo e($slot); ?>

    <script>
        Livewire.onError((error, component) => {
            console.error('Livewire error:', error);
            return false;
        });
    </script>
</body>

</html>
<?php /**PATH C:\website\pro2lms\resources\views/layouts/auth.blade.php ENDPATH**/ ?>