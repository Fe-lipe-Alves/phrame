<div class="w-10/12 mx-auto flex flex-col gap-4">
    @foreach($providers as $provider)
    <div class="flex gap-2 items-center justify-center border border-gray-300 rounded-full p-2">
        <img class="w-6" src="{{ $provider['image'] }}" alt="{{ $provider['name'] }}" />
        {{ __("Continue with ". $provider['name']) }}
    </div>
    @endforeach
</div>
