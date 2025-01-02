<x-guest-layout>
    <x-authentication-card class="bg-transparent shadow-none">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Nome -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" class="text-sm text-gray-700" />
                <x-input id="name"
                         class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                         type="text"
                         name="name"
                         :value="old('name')"
                         required
                         autofocus
                         autocomplete="name" />
            </div>

            <!-- Email -->
            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-sm text-gray-700" />
                <x-input id="email"
                         class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                         type="email"
                         name="email"
                         :value="old('email')"
                         required
                         autocomplete="username" />
            </div>

            <!-- Senha -->
            <div>
                <x-label for="password" value="{{ __('Password') }}" class="text-sm text-gray-700" />
                <x-input id="password"
                         class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                         type="password"
                         name="password"
                         required
                         autocomplete="new-password" />
            </div>

            <!-- Confirmação de Senha -->
            <div>
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm text-gray-700" />
                <x-input id="password_confirmation"
                         class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                         type="password"
                         name="password_confirmation"
                         required
                         autocomplete="new-password" />
            </div>

            <!-- Termos e Política -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div>
                    <x-label for="terms" class="text-sm text-gray-700">
                        <div class="flex items-start">
                            <x-checkbox name="terms" id="terms" required class="mt-1" />
                            <div class="ml-2 text-gray-600 text-xs">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-green-500 hover:text-green-700">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-green-500 hover:text-green-700">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Ações -->
            <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                <a class="text-sm text-gray-600 hover:text-green-700 underline" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-button class="w-full sm:w-auto bg-green-500 hover:bg-green-700 text-white">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
