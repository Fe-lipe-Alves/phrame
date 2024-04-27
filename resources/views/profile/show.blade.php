<x-layouts.auth>
    <div class="w-full">
        @include('profile.header')

        @include('profile.picker-view', compact('user', 'view'))

        @include('gallery.index', compact('user'))
    </div>

    <x-slot:scripts>
    </x-slot:scripts>
</x-layouts.auth>
