<x-guest-layout>
    <x-banner />
    <div class="min-h-screen">

        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 space-y-5">
                <!-- Card 1 -->
                <div class="bg-white shadow-md rounded-lg m-3 p-6 border border-gray-200">
                    <div class="text-2xl text-green-800 font-bold">
                        Bem-vindo ao Mundo da Bola!
                    </div>
                    <div class="mt-4 text-gray-600">
                        O Mundo da Bola oferece as melhores dicas de apostas em futebol e uma visão completa do desempenho dos times ao longo da temporada. Junte-se a nós e fique na frente no jogo!
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-md rounded-lg m-3 p-6 border border-gray-200">
                    <h2 class="text-xl font-bold text-green-800">Recursos</h2>
                    <ul class="mt-4 text-gray-600">
                        <li>- Dicas de apostas de especialistas</li>
                        <li>- Análise detalhada dos times</li>
                        <li>- Atualizações semanais</li>
                        <li>- Insights exclusivos</li>
                    </ul>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-md rounded-lg m-3 p-6 border border-gray-200 row-auto">
                    <h2 class="text-xl font-bold text-green-800">Assine Agora</h2>
                    <p class="mt-4 text-gray-600">
                        Tenha acesso a todo o nosso conteúdo premium e fique na frente com as melhores dicas de apostas em futebol.
                    </p>
                    <a href="..." class="mt-6 inline-block bg-green-600 text-white font-bold py-2 px-4 rounded">
                        Assine
                    </a>

                    {{--Buttom for install---}}

                    <button id="installButton" onclick="installPWA()" class="mt-6 inline-block bg-green-600 text-white font-bold py-2 px-4 rounded" disabled>
                        Instalar App
                    </button>
                </div>
            </div>
        </main>
    </div>
</x-guest-layout>
