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
    @include('components.dynamic-mahasiswa-style')

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 oke">
        <main>
            @livewire('notifications')
            @livewire('database-notifications')
            {{ $slot }}
        </main>
    </div>

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

    <script>
        if ("serviceWorker" in navigator) {
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
            let response = event.data && event.data.text();
            let data = JSON.parse(response);
            let {
                title,
                body,
                image
            } = data.notification;

            event.waitUntil(
                self.registration.showNotification(title, {
                    body,
                    icon: image,
                    image,
                    data: {
                        url: data.data.url
                    }
                })
            );
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
            fetch('/csrf-token')
                .then(res => res.text())
                .then(token => {
                    document.querySelector('meta[name="csrf-token"]').setAttribute('content', token);
                    window.Livewire && window.Livewire.findComponents().forEach(c => {
                        c.__instance.canonical = token;
                    });
                });
        }, 5 * 60 * 1000);
    </script>

    <!-- FIX AGAR CLASS BODY TIDAK HILANG -->
    <script>
        const ensureBodyClass = () => {
            const classList = document.body.classList;
            if (!classList.contains('konten-mahasiswa')) {
                classList.add('konten-mahasiswa');
                console.log('✅ class konten-mahasiswa ditambahkan kembali ke <body>');
            }
        };

        ensureBodyClass();

        const observer = new MutationObserver(() => {
            ensureBodyClass();
        });

        observer.observe(document.body, {
            attributes: true,
            attributeFilter: ['class']
        });
    </script>
</body>

</html>
