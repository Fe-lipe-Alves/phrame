<x-layouts.auth>
    <div class="w-full">
        <div class="w-11/12 lg:w-8/12 mx-auto border p-8 flex flex-col gap-4">

            <div class="text-center">
                <x-base.title-page>{{ __('All Images of '. auth()->user()->name) }}</x-base.title-page>
            </div>

            @foreach($photos as $photo)

            @endforeach

        </div>
    </div>

    <x-slot:scripts>
    </x-slot:scripts>
</x-layouts.auth>
