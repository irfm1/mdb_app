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
