<div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <!-- Indicador de Progresso -->
    <div class="flex justify-between items-center mb-6">
        @foreach (range(1, 4) as $step)
            <div class="flex items-center">
                <div class="w-8 h-8 flex justify-center items-center rounded-full {{ $currentStep >= $step ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-700' }}">
                    {{ $step }}
                </div>
                @if ($step < 4)
                    <div class="w-10 h-1 {{ $currentStep > $step ? 'bg-green-500' : 'bg-gray-300' }}"></div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Conteúdo Dinâmico das Etapas -->
    @if ($currentStep == 1)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-700">1. Informações Básicas</h3>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input wire:model="name" type="text" id="name" class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input wire:model="email" type="email" id="email" class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input wire:model="password" type="password" id="password" class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
                    <input wire:model="password_confirmation" type="password" id="password_confirmation" class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                    @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- Termos e Política -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div>
                    <x-label for="terms" class="text-sm text-gray-700">
                        <div class="flex items-start">
                            <x-checkbox wire:model="terms" id="terms" required class="mt-1" />
                            <div class="ml-2 text-gray-600 text-xs">
                                {!! __('Eu aceito aos :terms_of_service e :privacy_policy ', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-green-500 hover:text-green-700">'.__('Termos de serviço').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-green-500 hover:text-green-700">'.__('Politicas de Privacidade').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
            <div class="flex justify-end">
                <button wire:click="nextStep" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Próximo
                </button>
            </div>
        </div>
    @endif

    @if ($currentStep == 2)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-700">2. Confirmação de Email</h3>
            <p class="text-gray-600">Enviamos um e-mail de confirmação para <span class="font-bold">{{ $email }}</span>.</p>
            @if (!$emailVerified)
                <button wire:click="verifyEmail" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                    Confirmar E-mail
                </button>
            @else
                <p class="text-green-500 font-bold">E-mail verificado!</p>
                <button wire:click="nextStep" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Próximo
                </button>
            @endif
        </div>
    @endif

    @if ($currentStep == 3)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-700">3. Dados Complementares para {{Auth::user()->name}}</h3>
            <div>
                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                <input wire:model="cpf" type="text" id="cpf" class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                @error('cpf') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                <input wire:model="data_nascimento" type="date" id="data_nascimento" class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                @error('data_nascimento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                    <input wire:model="telefone" type="text" id="telefone" class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="genero" class="block text-sm font-medium text-gray-700">Gênero</label>
                    <select wire:model="genero" id="genero" class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                        <option value="">Selecione</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
            </div>
            <button wire:click="nextStep" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                Próximo
            </button>
        </div>
    @endif

    @if ($currentStep == 4)
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-700">4. Escolha do Plano</h3>
            <button wire:click="$set('plan', 'free')" class="block w-full bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                Free
            </button>
            <button wire:click="$set('plan', 'A')" class="block w-full bg-green-300 text-green-700 px-4 py-2 rounded-md hover:bg-green-400">
                Plano A
            </button>
            <button wire:click="$set('plan', 'B')" class="block w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                Plano B
            </button>
            <button wire:click="submit" class="bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800 focus:outline-none w-full mt-4">
                Finalizar
            </button>
        </div>
    @endif
</div>
