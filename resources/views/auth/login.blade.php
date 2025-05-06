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

            .remember-me {
                display: flex;
                align-items: center;
                margin-top: 1rem;
            }

            .remember-me span {
                margin-left: 8px;
                color: #1e40af;
            }

            .forgot-password {
                color: #2563eb;
                text-decoration: underline;
            }

            .forgot-password:hover {
                color: #1d4ed8;
            }
        </style>

        <div class="form-bg">
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="remember-me">
                    <x-checkbox id="remember_me" name="remember" />
                    <span>{{ __('Remember me') }}</span>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="btn-primary ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
