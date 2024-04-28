<div class="w-full flex flex-col gap-4">
    <div class="w-full flex justify-between">
        <div class="flex-1 flex gap-4">
            <div>
                <x-base.link-base
                    to=""
                    class="font-semibold"
                >
                    <img class="w-10 h-10 rounded-full border"
                         src="https://images.unsplash.com/profile-1699665121743-ced1edf9daaaimage?bg=fff&crop=faces&dpr=1&h=150&w=150&auto=format&fit=crop&q=60&ixlib=rb-4.0.3"
                         alt="Felipe Alves"
                    >
                </x-base.link-base>
            </div>
            <div class="mt-0 flex-1">
                <div class="flex gap-2 items-baseline">
                    <x-base.link-base
                        to=""
                        class="font-semibold"
                    >
                        Felipe Alves
                    </x-base.link-base>
                    <small>{{ now()->toDayDateTimeString() }}</small>
                </div>
                <div>
                    <h1 class="text-lg font-semibold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, nihil.</h1>
                </div>
            </div>
        </div>

        <div class="flex items-start">
            <x-base.button-base color="gray" size="sm" title="{{ __('Close') }}">
                <span class="material-symbols-outlined">close</span>
            </x-base.button-base>
        </div>
    </div>
</div>
