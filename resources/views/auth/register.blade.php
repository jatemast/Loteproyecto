<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <style>
            body {
                background: linear-gradient(135deg, #0ea5e9, #1e40af);
                background-attachment: fixed;
                color: #fff;
            }

            .form-bg {
                background: linear-gradient(to bottom right, #ffffff, #f9fafb);
                border-radius: 1.5rem;
                padding: 2rem;
                box-shadow: 0 15px 35px rgba(0, 191, 255, 0.3);
                color: #1e293b;
            }

            label {
                font-weight: 600;
                color: #1e40af;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                border-radius: 0.5rem;
                padding: 0.75rem 1rem;
                border: 1px solid #cbd5e1;
                width: 100%;
                transition: box-shadow 0.2s;
            }

            input:focus {
                outline: none;
                box-shadow: 0 0 0 2px #3b82f6;
            }

            .btn-primary {
                background: linear-gradient(135deg, #2563eb, #3b82f6);
                color: white;
                font-weight: 600;
                padding: 0.75rem 1.5rem;
                border-radius: 9999px;
                box-shadow: 0 8px 15px rgba(59, 130, 246, 0.3);
                backdrop-filter: blur(4px);
                transition: all 0.3s ease;
                border: none;
            }

            .btn-primary:hover {
                background: linear-gradient(135deg, #1d4ed8, #2563eb);
                transform: translateY(-2px);
            }

            .terms a {
                color: #2563eb;
                text-decoration: underline;
            }

            .terms a:hover {
                color: #1d4ed8;
            }
        </style>

        <div class="form-bg">
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="mt-1" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4 terms text-sm text-gray-700">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-blue-100 hover:text-white underline" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
