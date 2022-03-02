<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />



        <form method="POST" action="{{ route('user.otpverify') }}">
            @csrf

            <div>
                <x-jet-label for="otp" value="{{ __('Enter OTP') }}" />
                <x-jet-input id="otp" class="block mt-1 w-full" type="number" name="otp"  required autofocus />
                @if($errors->has('otp'))
                <div class="error">{{ $errors->first('otp') }}</div>
                @endif
            </div>



            <div class="flex items-center justify-end mt-4">


                <x-jet-button class="ml-4">
                    {{ __('Verify') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
