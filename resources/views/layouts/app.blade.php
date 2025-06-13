<!DOCTYPE html>
<html data-theme="halloween" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <title>{{ $title ?? config('APP_NAME') }} | {{ env('APP_NAME') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- PWA  -->
    <meta content="#6777ef" name="theme-color" />
    <link href="{{ asset('logo.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('/manifest.json') }}" rel="manifest">

    @livewireStyles

    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="font-sans antialiased konten-mahasiswa">
    {{-- @include('components.dynamic-mahasiswa-style')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <main>
            @livewire('notifications')
            @livewire('database-notifications')
            {{ $slot }}
        </main>
    </div> --}}


    @filamentScripts
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        Livewire.onError((error, component) => {
            console.error('Livewire error:', error);
            return false;
        });
    </script>
    @stack('scripts')
    {{-- <script src="{{ asset('/sw.js') }}"></script> --}}
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
