<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-modules.form.input-label for="email" :value="__('Email')" />
            <x-modules.form.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-modules.form.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-modules.form.input-label for="password" :value="__('Password')" />
            <x-modules.form.text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-modules.form.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-modules.form.input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-modules.form.text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-modules.form.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-modules.button.primary-button>
                {{ __('Reset Password') }}
            </x-modules.button.primary-button>
        </div>
    </form>
</x-guest-layout>
