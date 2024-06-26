<x-layouts.guest>
    <main class="w-full lg:w-5/12 bg-white p-8 lg:p-12 lg:rounded-2xl">
        <div class="my-8 text-center">
            <x-base.title-page>{{ __('Create your account now') }}</x-base.title-page>
        </div>

        <form class="flex flex-col gap-6" action="{{ route('register') }}" method="post">
            @csrf

            <x-form.input-with-label
                name="name"
                id="name"
                :label="__('Name')"
                value="{{ old('name') }}"
            />

            <x-form.input-with-label
                name="email"
                id="email"
                :label="__('Email')"
                type="email"
                value="{{ old('email') }}"
            />

            <div class="flex flex-col gap-1">
                <div class="flex justify-between items-baseline">
                    <x-base.label-base for="username">{{ __('Username') }}</x-base.label-base>
                    <small class="mr-1 text-granite-gray">
                        {{ __('Only letters, numbers and underscore') }}
                    </small>
                </div>
                <x-base.input-base name="username" id="username" value="{{ old('name') }}"/>
                @error('username')
                <x-form.input-feedback type="danger" :message="$message"/>
                @enderror
            </div>

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
