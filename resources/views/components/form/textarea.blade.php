<textarea
    {{ $attributes->merge(['class' => 'py-2 px-4 rounded border border-gray-300']) }}
    {{ $attributes }}
>{{ $slot }}</textarea>
