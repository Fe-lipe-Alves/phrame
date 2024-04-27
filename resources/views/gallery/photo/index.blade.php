<div class="gallery-photo inline-block mb-8 relative">
    @include('gallery.photo.header', compact('user'))

    <img src="{{ $photo }}" alt="">

    @include('gallery.photo.footer')
</div>
