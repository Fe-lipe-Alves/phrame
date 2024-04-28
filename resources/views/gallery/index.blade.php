<div class="w-11/12 lg:w-10/12 mx-auto columns-2 lg:columns-3 gap-4 lg:gap-8">
    @foreach($photos as $photo)
        @include('gallery.photo.index', compact('user', 'photo'))
    @endforeach

    @pushonce('scripts')
{{--        @include('gallery.details.index')--}}
    @endpushonce
</div>
