<x-layouts.guest>
    <main class="w-full lg:w-5/12 bg-white p-8 lg:p-12 lg:rounded-2xl">
        <div class="my-8 text-center">
            <x-base.title-page>{{ __('Forgot your password?') }}</x-base.title-page>
        </div>

        @if(session('status'))
        <div
            class="bg-green-100 text-green-500 border-green-200 border p-1 mb-3 rounded flex items-center justify-center"
        >
            <small>{{ session('status') }}</small>
        </div>
        @endif

        <form class="flex flex-col gap-6" action="{{ route('password.email') }}" method="post">
            @csrf

            <div class="flex flex-col gap-1">
                <x-base.label-base for="email">{{ __('Email') }}</x-base.label-base>
                <x-base.input-base name="email" type="email" id="email"/>
            </div>

            <div>
                <x-base.button-base>{{ __('Send link') }}</x-base.button-base>
            </div>
        </form>

        <div class="p-2 text-center my-8">
            {{ __('Remembered your password    ?') }}
            <x-base.link-base :to="route('login')" class="">{{ __('Go to login') }}</x-base.link-base>
        </div>
    </main>
</x-layouts.guest>
