<div class="w-full">
    <div class="w-10/12 lg:w-8/12 mx-auto p-8 flex flex-wrap lg:flex-nowrap gap-4">
        <div class="w-full lg:w-4/12 flex justify-center">
            <img class="!w-44 !h-44 rounded-full border"
                 src="https://images.unsplash.com/profile-1699665121743-ced1edf9daaaimage?bg=fff&crop=faces&dpr=1&h=150&w=150&auto=format&fit=crop&q=60&ixlib=rb-4.0.3"
                 alt="">
        </div>

        <div class="w-full lg:w-8/12 py-8 gap-5 flex flex-col">
            <div class="flex items-center flex-wrap gap-8">
                <h1 class="text-3xl lg:text-5xl font-bold">{{ auth()->user()->name }}</h1>

                <div class="flex items-center gap-4 self-end">
                    <form action="" method="post" class="w-fit">
                        @csrf
                        <x-base.button-base>
                            <span class="text-xl material-symbols-outlined">person_add</span>
                            Seguir
                        </x-base.button-base>
                    </form>

                    <div class="w-fit">
                        <x-base.button-base color="gray" class="hover:bg-gray-100" title="{{ __('Options') }}">
                            <span class="material-symbols-outlined">more_vert</span>
                        </x-base.button-base>
                    </div>
                </div>
            </div>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aut, repellat?
                Ad dolores fuga harum nobis qui quos, repudiandae saepe?
            </p>

            <div class="!text-taupe-gray !font-medium flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <span class="text-lg material-symbols-outlined">location_on</span>
                    Presidente Prudente, Brasil
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-lg material-symbols-outlined">link</span>
                    <x-base.link-base to="" class="!text-taupe-gray !font-medium">www.felipeafotografia.com.br
                    </x-base.link-base>
                </div>
            </div>

            <div class="text-sm flex gap-4">

                <x-base.link-base to="">15452 seguidores</x-base.link-base>
                <x-base.link-base to="">15452 seguindo</x-base.link-base>
            </div>

            <ul class="flex flex-wrap gap-2">
                @php($tags = ['Natureza', 'Amanhecer no campo', 'Paisagens', 'Por do sol', 'Florestas', 'Pássaros ao entardecer'])
                @foreach($tags as $tag)
                    <li>
                        <x-button.link-button
                            to=""
                            color="gray"
                            size="sm"
                            class="!bg-gray-50 !border-gray-200"
                        >
                            {{ $tag }}
                        </x-button.link-button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
