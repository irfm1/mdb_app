<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Conteúdo Principal -->
    <div class="min-h-screen bg-gray-100">
        <main class="pb-16">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 space-y-5">
                <!-- Card 1: Resumo -->
                <div class="bg-white shadow-md rounded-lg m-3 p-6 border border-gray-200">
                    <div class="text-xl text-green-800 font-bold">
                        Bem-vindo, {{ Auth::user()->name }}!
                    </div>
                    <div class="mt-4 text-gray-600">
                        Aqui está uma visão geral das suas atividades recentes.
                    </div>
                </div>

                <!-- Card 2: Promoções -->
                <div class="bg-white shadow-md rounded-lg m-3 p-6 border border-gray-200">
                    <h2 class="text-lg font-bold text-green-800">Promoções Atuais</h2>
                    <ul class="mt-4 text-gray-600">
                        <li>- Bônus exclusivo em apostas</li>
                        <li>- Promoções relâmpago</li>
                        <li>- Benefícios para assinantes</li>
                    </ul>
                </div>

                <!-- Card 3: Atividades Recentes -->
                <div class="bg-white shadow-md rounded-lg m-3 p-6 border border-gray-200">
                    <h2 class="text-lg font-bold text-green-800">Atividades Recentes</h2>
                    <p class="mt-4 text-gray-600">Você ainda não tem atividades recentes. Comece agora!</p>
                </div>
            </div>
        </main>

        <!-- Navegação Inferior -->
        <div class="fixed bottom-0 w-full bg-white shadow-lg border-t border-gray-200">
            <div class="flex justify-around py-2">
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-500 hover:text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21H6a2 2 0 01-2-2V7a2 2 0 012-2h3m0 0a2 2 0 012 2v14M9 7h5a2 2 0 012 2v5m-2-5a2 2 0 00-2 2v6m2-6h2" />
                    </svg>
                    <span class="text-xs">Início</span>
                </a>
                <a href="{{ route('promocoes') }}" class="flex flex-col items-center text-gray-500 hover:text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l-2 2m2-2l2 2m-2-2l-2-2m4 0l2 2m2-2l2 2m-2-2l2 2m4 4l-2 2m2-2l-2-2" />
                    </svg>
                    <span class="text-xs">Promoções</span>
                </a>
                <a href="{{ route('pacotes') }}" class="flex flex-col items-center text-gray-500 hover:text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18m-6 5H3" />
                    </svg>
                    <span class="text-xs">Pacotes</span>
                </a>
                <a href="{{ route('perfil') }}" class="flex flex-col items-center text-gray-500 hover:text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A3 3 0 007.636 21h8.728a3 3 0 002.515-1.196l3.07-3.556a4 4 0 00-1.44-6.21A3 3 0 0018.546 7h-.038m0 0A2 2 0 0016 5.5c0-1.105.895-2 2-2s2 .895 2 2v.5M16 7h.546a2 2 0 00-2 2h-8a2 2 0 00-2-2H8" />
                    </svg>
                    <span class="text-xs">Perfil</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
