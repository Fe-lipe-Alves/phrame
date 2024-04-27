<div class="gallery-photo-description text-sm w-full absolute hidden gap-2 top-0 p-2 bg-gradient-to-b from-gray-900/50">
    @if($photo->author)
        <div>
            <img class="w-10 h-10 rounded-full border"
                 src="https://images.unsplash.com/profile-1699665121743-ced1edf9daaaimage?bg=fff&crop=faces&dpr=1&h=150&w=150&auto=format&fit=crop&q=60&ixlib=rb-4.0.3"
                 alt="{{ $photo->author->name }}"
            >
        </div>
    @endif

    <div class="flex-1 flex flex-col overflow-hidden text-white whitespace-nowrap text-ellipsis overflow-hidden">
        @if($photo->author)
            <x-base.link-base
                to="{{ route('profile.show', ['user' => $photo->author]) }}"
                class="text-white no-underline hover:underline hover:text-white font-semibold"
            >
                {{ $photo->author->name }}
            </x-base.link-base>
        @endif

        <x-base.link-base
            to=""
            class="text-white no-underline hover:underline hover:text-white"
        >
            {{ $photo->title }}
        </x-base.link-base>
    </div>
</div>
