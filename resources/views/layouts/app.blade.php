<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @laravelPWA
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @laravelPWA
    </body>
    <script>
        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', (e) => {
            // Impede que o navegador exiba o prompt padrão
            e.preventDefault();
            // Armazena o evento para uso posterior
            deferredPrompt = e;
            // Exibe o botão de instalação
            document.getElementById('installButton').style.display = 'block';
        });

        function installPWA() {
            // Exibe o prompt de instalação
            deferredPrompt.prompt();
            // Aguarda o usuário interagir com o prompt
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('Usuário aceitou a instalação');
                } else {
                    console.log('Usuário recusou a instalação');
                }
                // Limpa o evento armazenado
                deferredPrompt = null;
                // Esconde o botão de instalação
                document.getElementById('installButton').style.display = 'none';
            });
        }

    </script>
</html>
