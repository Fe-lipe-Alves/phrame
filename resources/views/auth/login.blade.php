<x-layouts.guest>
    <main class="w-full lg:w-5/12 bg-white p-8 lg:p-12 lg:rounded-2xl">
        <div class="my-8 text-center">
            <x-base.title-page>{{ __('Access your account') }}</x-base.title-page>
        </div>

        @error('email')
        <div
            class="bg-red-100 border border-red-200 p-1 mb-3 rounded flex items-center justify-center text-red-500"
        >
            <small>{{ $message }}</small>
        </div>
        @enderror

        @if(session('status'))
            <div
                class="bg-green-100 text-green-500 border-green-200 border p-1 mb-3 rounded flex items-center justify-center"
            >
                <small>{{ session('status') }}</small>
            </div>
        @endif

        <form class="flex flex-col gap-6" action="{{ route('login') }}" method="post">
            @csrf

            <div class="flex flex-col gap-1">
                <x-base.label-base for="email">{{ __('Email') }}</x-base.label-base>
                <x-base.input-base name="email" type="email" id="email"/>
            </div>

            <div class="flex flex-col gap-1">
                <div class="flex justify-between items-baseline">
                    <x-base.label-base for="password">{{ __('Password') }}</x-base.label-base>
                    <x-base.link-base :to="route('password.request')" class="mr-1">
                        {{ __('Forgot your password?') }}
                    </x-base.link-base>
                </div>
                <x-base.input-base name="password" type="password" id="password"/>
            </div>

            <div>
                <x-base.button-base>{{ __('Login') }}</x-base.button-base>
            </div>
        </form>

        <div class="p-2 text-center my-8">
            {{ __("Don't have an account?") }}
            <x-base.link-base :to="route('register')" class="">{{ __('Register') }}</x-base.link-base>
        </div>

        <x-auth.social-auth/>
    </main>
</x-layouts.guest>
