<div class="w-full flex justify-center mb-8">
    <div class="flex">
        <div class="flex">
            <x-button.link-button
                to="{{ route('profile.photos', ['user' => $user->username]) }}"
                color="{{ $view === 'photos' ? 'black' : 'gray' }}"
                size="sm"
                class="!px-8 rounded-none"
            >
                <span class="text-lg material-symbols-outlined">photo</span>
                Fotos 608
            </x-button.link-button>

            <x-button.link-button
                to="{{ route('profile.albums', ['user' => $user->username]) }}"
                color="{{ $view === 'albums' ? 'black' : 'gray' }}"
                size="sm"
                class="!px-8 rounded-none"
            >
                <span class="text-lg material-symbols-outlined">filter</span>
                Albuns 13
            </x-button.link-button>

            <x-button.link-button
                to="{{ route('profile.likes', ['user' => $user->username]) }}"
                color="{{ $view === 'likes' ? 'black' : 'gray' }}"
                size="sm"
                class="!px-8 rounded-none"
            >
                <span class="text-lg material-symbols-outlined">favorite</span>
                Curtidas 10052
            </x-button.link-button>
        </div>
    </div>
</div>
