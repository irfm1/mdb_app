<div class="min-h-screen bg-gray-100 flex flex-col">
    <!-- Conteúdo Principal -->
    <main class="flex-grow pb-16">
        @if ($tab === 'home')
            <!-- Home Tab -->
            <div class="p-4">
                <h1 class="text-2xl font-bold text-green-800">Bem-vindo!</h1>
                <p class="text-gray-600 mt-2">
                    Aqui está sua visão geral do Mundo da Bola.
                </p>
            </div>
        @elseif ($tab === 'promocoes')
            <!-- Promoções Tab -->
            <div class="p-4">
                <h1 class="text-2xl font-bold text-green-800">Promoções Ativas</h1>
                <ul class="text-gray-600 mt-2 space-y-2">
                    <li>- Promoção 1: Bônus de 100%</li>
                    <li>- Promoção 2: CashBack especial</li>
                </ul>
            </div>
        @elseif ($tab === 'pacotes')
            <!-- Pacotes Tab -->
            <div class="p-4">
                <h1 class="text-2xl font-bold text-green-800">Seus Pacotes</h1>
                <p class="text-gray-600 mt-2">
                    Gerencie os pacotes contratados aqui.
                </p>
            </div>
        @elseif ($tab === 'perfil')
            <!-- Perfil Tab -->
            <div class="p-4">
                <h1 class="text-2xl font-bold text-green-800">Meu Perfil</h1>
                <p class="text-gray-600 mt-2">
                    Gerencie suas informações pessoais.
                </p>
            </div>
        @endif
    </main>

    <!-- Navegação Inferior -->
    <div class="fixed bottom-0 w-full bg-white shadow-lg border-t border-gray-200">
        <div class="flex justify-around py-2">
            <button wire:click="switchTab('home')" class="flex flex-col items-center text-gray-500 hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21H6a2 2 0 01-2-2V7a2 2 0 012-2h3m0 0a2 2 0 012 2v14M9 7h5a2 2 0 012 2v5m-2-5a2 2 0 00-2 2v6m2-6h2" />
                </svg>
                <span class="text-xs">Início</span>
            </button>
            <button wire:click="switchTab('promocoes')" class="flex flex-col items-center text-gray-500 hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l-2 2m2-2l2 2m-2-2l-2-2m4 0l2 2m2-2l2 2m-2-2l2 2m4 4l-2 2m2-2l-2-2" />
                </svg>
                <span class="text-xs">Promoções</span>
            </button>
            <button wire:click="switchTab('pacotes')" class="flex flex-col items-center text-gray-500 hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18m-6 5H3" />
                </svg>
                <span class="text-xs">Pacotes</span>
            </button>
            <button wire:click="switchTab('perfil')" class="flex flex-col items-center text-gray-500 hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A3 3 0 007.636 21h8.728a3 3 0 002.515-1.196l3.07-3.556a4 4 0 00-1.44-6.21A3 3 0 0018.546 7h-.038m0 0A2 2 0 0016 5.5c0-1.105.895-2 2-2s2 .895 2 2v.5M16 7h.546a2 2 0 00-2 2h-8a2 2 0 00-2-2H8" />
                </svg>
                <span class="text-xs">Perfil</span>
            </button>
        </div>
    </div>
</div>
