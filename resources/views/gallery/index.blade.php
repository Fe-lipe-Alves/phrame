<div class="w-11/12 lg:w-10/12 mx-auto columns-2 lg:columns-3 gap-4 lg:gap-8">
    @php
        $photos = [
            'https://plus.unsplash.com/premium_photo-1711393509265-4848ff8f3476?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4MHx8fGVufDB8fHx8fA%3D%3D',
            'https://images.unsplash.com/photo-1713749457805-d7a17ad1a89b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4MXx8fGVufDB8fHx8fA%3D%3D',
            'https://images.unsplash.com/photo-1713971346394-6030222f7ca2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw3OHx8fGVufDB8fHx8fA%3D%3D',
            'https://images.unsplash.com/photo-1713877561507-881bf3b1c310?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4NXx8fGVufDB8fHx8fA%3D%3D',
            'https://images.unsplash.com/photo-1713847243126-ff9ec9b40db9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxMTN8fHxlbnwwfHx8fHw%3D',
            'https://plus.unsplash.com/premium_photo-1711438464037-ffc4f358fc23?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxMjh8fHxlbnwwfHx8fHw%3D',
            'https://images.unsplash.com/photo-1713541493823-2238651de0a1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxMzV8fHxlbnwwfHx8fHw%3D',
            'https://images.unsplash.com/photo-1713694847163-f9fce967c146?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNDV8fHxlbnwwfHx8fHw%3D',
        ];
    @endphp
    @for($i=0;$i<=100;$i++)
        @include('gallery.photo.index', ['photo' => Arr::random($photos), 'user' => $user])
    @endfor
</div>
