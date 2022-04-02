<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-md text-gray-600">
            {{ __('Thanks for signing up! When registering to place an order, could you please verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-md text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="text-md text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>

                <button type="submit" class="text-md text-gray-600 hover:text-gray-900">
                     <a href="{{ route('home') }}" class="text-md text-white-700 dark:text-white-500">Back to Home page</a>  
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
