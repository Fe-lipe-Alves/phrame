<header class="w-full p-2 flex gap-16 justify-center items-baseline">
    <form class="w-3/12 hidden lg:block">
        <x-base.input-base class="!rounded-full w-full" placeholder="Pesquise por qualquer coisa"/>
    </form>

    <div>
        <h1 class="font-open-sans text-lg font-semibold">
            Phr<span class="text-zinc-500">ame</span>
        </h1>
    </div>

    <nav class="hidden lg:block">
        <ul class="flex gap-8">
            <li>
                <x-base.link-base to="">{{ __('Explore') }}</x-base.link-base>
            </li>
            <li>
                <x-base.link-base to="">{{ __('Collections') }}</x-base.link-base>
            </li>
            <li>
                <x-base.link-base to="">{{ __('Locations') }}</x-base.link-base>
            </li>
        </ul>
    </nav>

    <div class="w-auto lg:w-3/12 justify-end items-baseline gap-4 flex">
        <x-base.link-base to="">{{ auth()->user()->name }}</x-base.link-base>
        <x-button.link-button :to="route('picture.send')" size="md">{{ __('Send picture') }}</x-button.link-button>
    </div>
</header>


