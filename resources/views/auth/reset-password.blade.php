<x-layouts.guest>
    <main class="w-full lg:w-5/12 bg-white p-8 lg:p-12 lg:rounded-2xl">
        <div class="my-8 text-center">
            <x-base.title-page>{{ __('Enter your new password') }}</x-base.title-page>
        </div>

        @if($errors->any())
{{--            {{ dd($errors) }}--}}
        @endif

        @if(session('status'))
            <div
                class="bg-green-100 text-green-500 border-green-200 border p-1 mb-3 rounded flex items-center justify-center"
            >
                <small>{{ session('status') }}</small>
            </div>
        @endif

        <form class="flex flex-col gap-6" action="{{ route('password.update') }}" method="post">
            @csrf

            <x-base.input-base name="token" type="hidden" value="{{ request('token') }}"/>

            <x-form.input-with-label
                name="email"
                id="email"
                :label="__('Email')"
                type="email"
                value="{{ old('email', request('email')) }}"
            />

            <div class="flex flex-col gap-1">
                <div class="flex justify-between items-baseline">
                    <x-base.label-base for="password">{{ __('Password') }}</x-base.label-base>
                    <small class="mr-1 text-granite-gray">{{ __('Minimum 8 characters') }}</small>
                </div>
                <x-base.input-base name="password" id="password" type="password"/>
                @error('password')
                <x-form.input-feedback type="danger" :message="$message"/>
                @enderror
            </div>

            <x-form.input-with-label
                name="password_confirmation"
                id="password_confirmation"
                :label="__('Password Confirmation')"
                type="password"
            />

            <div>
                <x-base.button-base>{{ __('Register') }}</x-base.button-base>
            </div>
        </form>

        <div class="p-2 text-center my-8">
            {{ __('Already have an account?') }}
            <x-base.link-base :to="route('login')" class="">{{ __('Log in') }}</x-base.link-base>
        </div>

        <x-auth.social-auth/>
    </main>
</x-layouts.guest>
