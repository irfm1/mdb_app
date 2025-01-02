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
    <body style="background-image: url('/images/back_fut.jpg'); filter: blur(20%); background-size: cover; background-position: center;">
        <x-banner />
        <header>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="position: relative; top: -10px;">
                <!-- Header Menu with Flexbox Layout -->
                <div class="bg-white shadow-md rounded-lg flex items-center justify-between p-4 border border-gray-200">
                    <!-- Left Section: Logo -->
                    <div class="flex items-center">
                        <a href="/" class="text-green-800 text-2xl font-bold">
                            <img src="/path/to/logo.png" alt="Logo" class="h-8 w-auto mr-2"> <!-- Adjust logo size as needed -->
                        </a>
                        <span class="text-gray-500 mx-2">|</span> <!-- Separator -->
                        <a href="/" class="text-green-800 font-semibold hover:text-green-600">Bem-vindo</a>
                    </div>

                    <!-- Center Section: Important Links -->
                    <div class="hidden md:flex space-x-4">
                        <a href="/promocoes" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700">Promoções</a>
                        <a href="/cursos" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700">Cursos</a>
                        <a href="/noticias" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700">Notícias</a>
                    </div>

                    <!-- Right Section: Sandwich Menu -->
                    <button class="text-green-800 hover:text-green-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </header>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>

    <script>
        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', (e) => {
            // Impede que o navegador exiba o prompt padrão
            e.preventDefault();
            // Armazena o evento para uso posterior
            deferredPrompt = e;
            // Habilita o botão de instalação
            document.getElementById('installButton').disabled = false;
        });

        function installPWA() {
            // Exibe o prompt de instalação
            deferredPrompt.prompt();
            // Aguarda o usuário responder
            deferredPrompt.userChoice
                .then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('Usuário aceitou a instalação');
                    } else {
                        console.log('Usuário recusou a instalação');
                    }
                    // Limpa o evento armazenado
                    deferredPrompt = null;
                    // desabilita o botão de instalação
                    document.getElementById('installButton').disabled = true;
                });
        }
    </script>
</html>
